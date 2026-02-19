const BannerSlider = {
    config: {
        progressCircleRadius: 18,
        progressCircumference: 113.1,
        defaultInterval: 5000,
        defaultHeight: 300,
        animationDuration: {
            fast: 300,
            normal: 400,
            slow: 500
        },
        easing: {
            out: 'cubic-bezier(0.4, 0, 0.6, 1)',
            in: 'cubic-bezier(0.2, 0, 0.2, 1)'
        }
    },

    // Initialize banner sliders
    init() {
        const uninitializedBanners = document.querySelectorAll('.banners-slider:not([data-banner-initialized])');
        uninitializedBanners.forEach(this.initSlider.bind(this));
    },

    // Reinitialize all banners (for HTMX compatibility)
    reinitAll() {
        this.cleanup();
        const allBanners = document.querySelectorAll('.banners-slider');
        allBanners.forEach(banner => {
            banner.removeAttribute('data-banner-initialized');
        });
        this.init();
    },

    // Initialize single slider
    initSlider(swiper) {
        swiper.setAttribute('data-banner-initialized', 'true');

        const slides = swiper.querySelectorAll('.banner-slide').length;
        if (slides <= 1) {
            swiper.classList.add('single-banner');
            return;
        }

        swiper.classList.remove('single-banner');

        const shouldAutoplay = swiper.dataset.autoplay === 'true';
        const interval = parseInt(swiper.dataset.interval) || this.config.defaultInterval;

        if (typeof Swiper === 'undefined') {
            console.warn('Swiper is not available. Make sure swiper.js is loaded.');
            return;
        }

        this.setupSliderHeight(swiper);
        this.setupInitialTextState(swiper);
        
        if (shouldAutoplay) {
            this.addProgressTimer(swiper, interval);
        }

        this.createSwiperInstance(swiper, slides, shouldAutoplay, interval);
    },

    setupSliderHeight(swiper) {
        const heightMode = swiper.dataset.heightMode || 'manual';
        const heightValue = swiper.dataset.height || this.config.defaultHeight;
        
        if (heightMode === 'auto') {
            swiper.style.height = 'auto';
            swiper.style.minHeight = '200px';
            swiper.style.maxHeight = 'none';
        } else {
            const height = heightValue + 'px';
            swiper.style.height = height;
            swiper.style.minHeight = height;
            swiper.style.maxHeight = height;
        }
    },

    setupInitialTextState(swiper) {
        const allSlides = swiper.querySelectorAll('.banner-slide');
        allSlides.forEach((slide, index) => {
            if (index !== 0) {
                this.hideTextContent(slide);
            }
        });
    },

    hideTextContent(slide) {
        const title = slide.querySelector('.banner-title');
        const description = slide.querySelector('.banner-description');
        
        [title, description].forEach(element => {
            if (element) {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px) scale(0.95)';
                element.style.filter = 'blur(3px)';
            }
        });
    },

    // Show text content of a slide
    showTextContent(slide, withTransition = true) {
        const title = slide.querySelector('.banner-title');
        const description = slide.querySelector('.banner-description');
        
        if (title) {
            title.style.opacity = '1';
            title.style.transform = 'translateY(0) scale(1)';
            title.style.filter = 'blur(0)';
            if (withTransition) {
                title.style.transition = `all ${this.config.animationDuration.normal}ms ${this.config.easing.in}`;
            }
        }
        
        if (description) {
            description.style.opacity = '1';
            description.style.transform = 'translateY(0) scale(1)';
            description.style.filter = 'blur(0)';
            if (withTransition) {
                description.style.transition = `all ${this.config.animationDuration.normal}ms ${this.config.easing.in} 0.1s`;
            }
        }
    },

    // Create Swiper instance
    createSwiperInstance(swiper, slides, shouldAutoplay, interval) {
        const heightMode = swiper.dataset.heightMode || 'manual';
        const heightValue = swiper.dataset.height || this.config.defaultHeight;

        new Swiper(swiper, {
            slidesPerView: 1.001,
            spaceBetween: 0,
            loop: slides > 2,
            height: heightMode === 'auto' ? null : parseInt(heightValue),
            autoHeight: heightMode === 'auto',
            autoplay: shouldAutoplay ? {
                delay: interval,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            } : false,
            pagination: {
                el: swiper.querySelector('.banners-indicators'),
                clickable: true,
                bulletClass: 'banner-indicator',
                bulletActiveClass: 'active'
            },
            navigation: {
                nextEl: swiper.querySelector('.banner-next'),
                prevEl: swiper.querySelector('.banner-prev'),
            },
            speed: 400,
            updateOnWindowResize: true,
            observer: true,
            observeParents: true,
            initialSlide: 0,
            lazy: {
                loadPrevNext: true
            },
            a11y: {
                prevSlideMessage: translate('banners.prev_slide'),
                nextSlideMessage: translate('banners.next_slide'),
                firstSlideMessage: translate('banners.first_slide'),
                lastSlideMessage: translate('banners.last_slide'),
                paginationBulletMessage: translate('banners.go_to_slide')
            },
            on: {
                init: () => this.onSliderInit(swiper),
                slideChangeTransitionStart: (swiperInstance) => this.onSlideChangeStart(swiperInstance),
                slideChangeTransitionEnd: (swiperInstance) => this.onSlideChangeEnd(swiperInstance, swiper, interval, shouldAutoplay),
                autoplayTimeLeft: (s, time) => this.updateTimerDisplay(swiper, time),
                slideNextTransitionEnd: (swiperInstance) => {
                    if (shouldAutoplay) {
                        this.handleManualNavigation(swiperInstance, swiper, interval);
                    }
                },
                slidePrevTransitionEnd: (swiperInstance) => {
                    if (shouldAutoplay) {
                        this.handleManualNavigation(swiperInstance, swiper, interval);
                    }
                }
            }
        });
    },

    // Slider initialization callback
    onSliderInit(swiper) {
        const firstSlide = swiper.querySelector('.banner-slide');
        if (firstSlide) {
            this.showTextContent(firstSlide, true);
        }
    },

    // Slide change start callback
    onSlideChangeStart(swiperInstance) {
        swiperInstance.slides.forEach(slide => {
            if (!slide.classList.contains('swiper-slide-active')) {
                const title = slide.querySelector('.banner-title');
                const description = slide.querySelector('.banner-description');
                
                [title, description].forEach((element, index) => {
                    if (element) {
                        element.style.opacity = '0';
                        element.style.transform = 'translateY(30px) scale(0.95)';
                        element.style.filter = 'blur(3px)';
                        element.style.transition = `all ${this.config.animationDuration.fast}ms ${this.config.easing.out} ${index * 50}ms`;
                    }
                });
            }
        });
    },

    // Slide change end callback
    onSlideChangeEnd(swiperInstance, swiper, interval, shouldAutoplay) {
        const activeSlide = swiperInstance.slides[swiperInstance.activeIndex];
        if (activeSlide) {
            setTimeout(() => {
                this.showTextContent(activeSlide, true);
            }, 50);
        }

        if (shouldAutoplay) {
            if (swiperInstance.autoplay && swiperInstance.autoplay.running) {
                swiperInstance.autoplay.stop();
            }
            
            this.restartProgressTimer(swiper, interval);
            
            setTimeout(() => {
                if (swiperInstance.autoplay) {
                    swiperInstance.autoplay.start();
                }
            }, 100);
        }
    },

    // Handle manual navigation
    handleManualNavigation(swiperInstance, swiper, interval) {
        if (swiperInstance.autoplay && swiperInstance.autoplay.running) {
            swiperInstance.autoplay.stop();
        }
        
        this.restartProgressTimer(swiper, interval);
        
        setTimeout(() => {
            if (swiperInstance.autoplay) {
                swiperInstance.autoplay.start();
            }
        }, 100);
    },

    // Add circular progress timer
    addProgressTimer(swiperElement, interval) {
        const existingTimer = swiperElement.querySelector('.banner-progress-timer');
        if (existingTimer) {
            existingTimer.remove();
        }

        const timer = document.createElement('div');
        timer.className = 'banner-progress-timer';
        timer.innerHTML = `
            <div class="progress-circle">
                <svg width="40" height="40" viewBox="0 0 40 40">
                    <circle cx="20" cy="20" r="${this.config.progressCircleRadius}" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2"/>
                    <circle cx="20" cy="20" r="${this.config.progressCircleRadius}" fill="none" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" class="progress-path"
                            stroke-dasharray="${this.config.progressCircumference}" stroke-dashoffset="${this.config.progressCircumference}"/>
                </svg>
                <div class="progress-text">
                    <span class="progress-count"></span>
                </div>
            </div>
        `;

        swiperElement.appendChild(timer);

        setTimeout(() => {
            const progressPath = timer.querySelector('.progress-path');
            if (progressPath) {
                progressPath.style.transition = `stroke-dashoffset ${interval}ms linear`;
                progressPath.style.strokeDashoffset = '0';
            }
            this.setInitialTimerCount(timer, interval);
            this.startCountdownInterval(timer, interval);
        }, 100);
    },

    // Restart progress timer
    restartProgressTimer(swiperElement, interval) {
        const timer = swiperElement.querySelector('.banner-progress-timer');
        if (!timer) return;

        const progressPath = timer.querySelector('.progress-path');
        if (!progressPath) return;

        if (timer._countdownInterval) {
            clearInterval(timer._countdownInterval);
        }

        progressPath.style.transition = 'none';
        progressPath.style.strokeDashoffset = this.config.progressCircumference;

        setTimeout(() => {
            progressPath.style.transition = `stroke-dashoffset ${interval}ms linear`;
            progressPath.style.strokeDashoffset = '0';
            this.setInitialTimerCount(timer, interval);
            this.startCountdownInterval(timer, interval);
        }, 100);
    },

    // Set initial timer count
    setInitialTimerCount(timer, interval) {
        const countElement = timer.querySelector('.progress-count');
        if (countElement) {
            const remaining = Math.floor(interval / 1000);
            countElement.textContent = Math.max(0, remaining);
        }
    },

    // Start countdown interval as backup
    startCountdownInterval(timer, interval) {
        // Останавливаем предыдущий интервал если есть
        if (timer._countdownInterval) {
            clearInterval(timer._countdownInterval);
        }

        const countElement = timer.querySelector('.progress-count');
        if (!countElement) return;

        const startTime = Date.now();
        const endTime = startTime + interval;
        
        timer._countdownInterval = setInterval(() => {
            const now = Date.now();
            const remaining = Math.max(0, endTime - now);
            
            if (remaining <= 0) {
                countElement.textContent = '0';
                clearInterval(timer._countdownInterval);
                timer._countdownInterval = null;
                return;
            }
            
            const seconds = Math.ceil(remaining / 1000);
            countElement.textContent = seconds;
        }, 100); // Обновляем каждые 100мс для плавности
    },

    // Update timer display during autoplay
    updateTimerDisplay(swiper, time) {
        const timer = swiper.querySelector('.banner-progress-timer');
        if (!timer) return;
        
        const countElement = timer.querySelector('.progress-count');
        if (!countElement) return;
        
        if (timer._countdownInterval) {
            return;
        }
        
        let remaining;
        if (time <= 100) {
            remaining = 0;
        } else if (time >= 1000) {
            remaining = Math.ceil(time / 1000);
        } else {
            remaining = 1;
        }
        
        countElement.textContent = Math.max(0, remaining);
    },

    // Cleanup banners on unload
    cleanup() {
        const bannerSwipers = document.querySelectorAll('.banners-slider[data-banner-initialized]');
        bannerSwipers.forEach((swiper) => {
            const timer = swiper.querySelector('.banner-progress-timer');
            if (timer && timer._countdownInterval) {
                clearInterval(timer._countdownInterval);
                timer._countdownInterval = null;
            }
            
            swiper.removeAttribute('data-banner-initialized');
            if (swiper.swiper) {
                swiper.swiper.destroy(true, true);
            }
        });
    }
};

// Banner settings management
const BannerSettings = {
    init() {
        const bannersList = document.getElementById('banners-list');
        const btnAddBanner = document.getElementById('btn-add-banner');
        const template = document.getElementById('banner-item-template');
        const heightModeSelect = document.getElementById('height_mode');

        if (!bannersList || !btnAddBanner || !template) return;

        if (bannersList.hasAttribute('data-listeners-initialized')) {
            return;
        }

        bannersList.setAttribute('data-listeners-initialized', 'true');
        btnAddBanner.setAttribute('data-listeners-initialized', 'true');

        this.setupHeightModeToggle(heightModeSelect);
        this.setupEventListeners(bannersList, btnAddBanner, template);
    },

    setupHeightModeToggle(heightModeSelect) {
        if (heightModeSelect) {
            heightModeSelect.addEventListener('change', function() {
                const heightSettings = document.querySelector('.height-settings');
                if (heightSettings) {
                    heightSettings.style.display = this.value === 'auto' ? 'none' : '';
                }
            });
        }
    },

    setupEventListeners(bannersList, btnAddBanner, template) {
        btnAddBanner.addEventListener('click', () => this.addBannerItem(bannersList, template));
        
        bannersList.addEventListener('click', (e) => this.handleBannerListClick(e));
        bannersList.addEventListener('change', (e) => this.handleBannerListChange(e));
        bannersList.addEventListener('input', (e) => this.handleBannerListInput(e));
    },

    addBannerItem(bannersList, template) {
        const itemCount = bannersList.querySelectorAll('.banner-item').length;
        const nextIndex = itemCount;

        const templateContent = template.innerHTML
            .replace(/{index}/g, nextIndex)
            .replace(/{number}/g, nextIndex + 1);

        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = templateContent;
        const bannerItem = tempDiv.firstElementChild;

        bannersList.appendChild(bannerItem);
        this.updateBannerIndices(bannersList);
    },

    handleBannerListClick(e) {
        const removeBtn = e.target.closest('.btn-remove-banner');
        if (removeBtn) {
            const bannerItem = removeBtn.closest('.banner-item');
            if (bannerItem) {
                bannerItem.remove();
                this.updateBannerIndices(document.getElementById('banners-list'));
            }
            return;
        }

        const removePreview = e.target.closest('.btn-remove-preview');
        if (removePreview) {
            const preview = removePreview.closest('.image-preview');
            const uploadContainer = removePreview.closest('.banner-image-upload');
            const input = uploadContainer.querySelector('input[type="text"]');

            if (preview) preview.remove();
            if (input) input.value = '';
        }
    },

    handleBannerListChange(e) {
        if (e.target.classList.contains('banner-file-input')) {
            this.handleImageUpload(e.target);
        }
    },

    handleBannerListInput(e) {
        if (e.target.type === 'text' && e.target.name && e.target.name.includes('[image_url]')) {
            const uploadContainer = e.target.closest('.banner-image-upload');
            const value = e.target.value.trim();

            if (value && (value.startsWith('http') || value.startsWith('assets/'))) {
                const fullUrl = value.startsWith('http') ? value : (typeof url === 'function' ? url(value) : value);
                this.showImagePreview(uploadContainer, fullUrl);
            } else {
                const existingPreview = uploadContainer.querySelector('.image-preview');
                if (existingPreview) {
                    existingPreview.remove();
                }
            }
        }
    },

    updateBannerIndices(bannersList) {
        const items = bannersList.querySelectorAll('.banner-item');
        items.forEach((item, index) => {
            item.dataset.index = index;
            const title = item.querySelector('.banner-title');
            if (title) {
                title.textContent = title.textContent.replace(/#\d+/, `#${index + 1}`);
            }

            const inputs = item.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/banners\[\d+\]/, `banners[${index}]`));
                }

                const id = input.getAttribute('id');
                if (id) {
                    input.setAttribute('id', id.replace(/-\d+/, `-${index}`));
                }
            });

            const labels = item.querySelectorAll('label[for]');
            labels.forEach(label => {
                const forAttr = label.getAttribute('for');
                if (forAttr) {
                    label.setAttribute('for', forAttr.replace(/-\d+/, `-${index}`));
                }
            });
        });
    },

    handleImageUpload(fileInput) {
        const file = fileInput.files[0];
        if (!file) return;

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        if (!allowedTypes.includes(file.type)) {
            this.showUploadError(fileInput, translate('banners.settings.invalid_file'));
            return;
        }

        const maxSize = 5 * 1024 * 1024; // 5MB
        if (file.size > maxSize) {
            this.showUploadError(fileInput, translate('banners.settings.file_too_large'));
            return;
        }

        const uploadContainer = fileInput.closest('.banner-image-upload');
        const progressContainer = uploadContainer.querySelector('.upload-progress');
        const progressFill = uploadContainer.querySelector('.progress-fill');
        const textInput = uploadContainer.querySelector('input[type="text"]');

        progressContainer.style.display = 'block';
        progressFill.style.width = '0%';

        const formData = new FormData();
        formData.append('image', file);

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const headers = { 'X-Requested-With': 'XMLHttpRequest' };
        if (csrfToken) {
            headers['X-CSRF-TOKEN'] = csrfToken;
        }

        fetch(u('api/banners/upload'), {
            method: 'POST',
            body: formData,
            headers: headers
        })
        .then(response => response.json().then(data => ({ status: response.status, data })))
        .then(({ status, data }) => {
            progressFill.style.width = '100%';

            if (data.success) {
                textInput.value = data.url;
                this.showImagePreview(uploadContainer, data.url);
                setTimeout(() => progressContainer.style.display = 'none', 500);
            } else {
                this.showUploadError(fileInput, data.message || translate('banners.settings.upload_error'));
            }
        })
        .catch(error => {
            console.error('Upload error:', error);
            this.showUploadError(fileInput, translate('banners.settings.upload_error'));
        })
        .finally(() => {
            fileInput.value = '';
        });
    },

    showUploadError(fileInput, message) {
        const uploadContainer = fileInput.closest('.banner-image-upload');
        const progressContainer = uploadContainer.querySelector('.upload-progress');
        progressContainer.style.display = 'none';

        if (typeof notyf !== 'undefined') {
            notyf.error(message);
        } else {
            alert(message);
        }
    },

    showImagePreview(uploadContainer, imageUrl) {
        const existingPreview = uploadContainer.querySelector('.image-preview');
        if (existingPreview) {
            existingPreview.remove();
        }

        const preview = document.createElement('div');
        preview.className = 'image-preview';
        preview.innerHTML = `
            <img src="${imageUrl}" alt="Preview">
            <button type="button" class="btn-remove-preview">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 3.5L3.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.5 3.5L12.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        `;

        const uploadActions = uploadContainer.querySelector('.image-upload-actions');
        if (uploadActions && uploadActions.nextSibling) {
            uploadContainer.insertBefore(preview, uploadActions.nextSibling);
        } else {
            uploadContainer.appendChild(preview);
        }
    }
};

// Event listeners
document.addEventListener('DOMContentLoaded', () => {
    BannerSlider.init();
    BannerSettings.init();
});

document.addEventListener('htmx:afterSwap', () => {
    setTimeout(() => {
        BannerSlider.init();
        BannerSettings.init();
    }, 50);
});

document.addEventListener('widgetSettingsLoaded', () => {
    BannerSettings.init();
});

document.addEventListener('widgetInitialized', (e) => {
    if (e.detail && e.detail.widgetName === 'banners') {
        BannerSlider.init();
    }
});

document.addEventListener('widgetRefreshed', (e) => {
    if (e.detail && e.detail.widgetName === 'banners') {
        const uninitializedBanners = document.querySelectorAll('.banners-slider:not([data-banner-initialized])');
        if (uninitializedBanners.length > 0) {
            BannerSlider.init();
        }
    }
});

document.addEventListener('banners-unload', () => {
    BannerSlider.cleanup();
});
