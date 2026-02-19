/**
 * Profile Posts - Interactions
 */
(function() {
    'use strict';

    var pendingRequests = {};
    var activePopup = null;
    var activeCleanup = null;
    var emojiMap = {};

    function init() {
        initReactionButtons();
        initReactionPicker();
        initRepliesToggle();
        initComposer();
        initImageUpload();
        initLightbox();
    }

    function notify(message, type) {
        type = type || 'error';
        if (window.Notyf) {
            var n = window.notyf || new Notyf({ duration: 3000, position: { x: 'right', y: 'top' } });
            if (!window.notyf) window.notyf = n;
            if (type === 'success') {
                n.success(message);
            } else {
                n.error(message);
            }
        } else {
            console.warn('[ProfilePosts]', type, message);
        }
    }

    document.addEventListener('DOMContentLoaded', init);
    document.addEventListener('htmx:afterSettle', init);
    document.addEventListener('htmx:afterSwap', init);

    function initReactionButtons() {
        document.querySelectorAll('[data-reaction-id]').forEach(function(btn) {
            if (btn._wallInit) return;
            btn._wallInit = true;

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                var emojiId = this.getAttribute('data-reaction-id');
                var postId = this.getAttribute('data-post');
                var targetType = this.getAttribute('data-target-type') || 'post';
                var isActive = this.classList.contains('wall-reactions__pill--active');
                var action = isActive ? 'remove' : 'add';
                
                // Add click animation
                this.classList.add('wall-reactions__pill--clicked');
                var self = this;
                setTimeout(function() {
                    self.classList.remove('wall-reactions__pill--clicked');
                }, 150);
                
                sendReaction(postId, emojiId, action, this, targetType);
            });
        });
    }

    function initReactionPicker() {
        document.querySelectorAll('[data-picker-toggle]').forEach(function(btn) {
            if (btn._wallInit) return;
            btn._wallInit = true;

            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                var postId = this.getAttribute('data-picker-toggle');
                var targetType = this.getAttribute('data-picker-type') || 'post';
                
                if (activePopup && activePopup.dataset.postId === postId && activePopup.dataset.targetType === targetType) {
                    closePopup();
                    return;
                }
                
                closePopup();
                openReactionPicker(this, postId, targetType);
            });
        });

        if (!window._wallDocClickInit) {
            window._wallDocClickInit = true;
            document.addEventListener('click', function(e) {
                if (activePopup && !e.target.closest('.wall-reaction-popup') && !e.target.closest('[data-picker-toggle]')) {
                    closePopup();
                }
            });
            
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && activePopup) {
                    closePopup();
                }
            });
        }
    }

    function openReactionPicker(toggleBtn, postId, targetType) {
        targetType = targetType || 'post';
        var targetEl = document.getElementById((targetType === 'comment' ? 'comment-' : 'post-') + postId);
        var userReactionIds = [];
        if (targetEl) {
            targetEl.querySelectorAll('.wall-reactions__pill--active').forEach(function(pill) {
                var id = pill.getAttribute('data-reaction-id');
                if (id) userReactionIds.push(id);
            });
        }

        var emojis = getEmojiMap(postId, targetType);
        
        var popup = document.createElement('div');
        popup.className = 'wall-reaction-popup';
        popup.dataset.postId = postId;
        popup.dataset.targetType = targetType;
        
        Object.keys(emojis).forEach(function(emojiId, index) {
            var emoji = emojis[emojiId];
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'wall-reaction-popup__item';
            btn.style.setProperty('--item-index', index);
            if (userReactionIds.indexOf(emojiId) !== -1) {
                btn.classList.add('wall-reaction-popup__item--selected');
            }
            btn.textContent = emoji;
            btn.setAttribute('data-emoji-id', emojiId);
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                var isSelected = this.classList.contains('wall-reaction-popup__item--selected');
                var action = isSelected ? 'remove' : 'add';
                
                // Add pop animation
                this.classList.add('wall-reaction-popup__item--pop');
                
                sendReaction(postId, emojiId, action, null, targetType);
                closePopup();
            });
            popup.appendChild(btn);
        });

        document.body.appendChild(popup);
        activePopup = popup;
        
        toggleBtn.classList.add('wall-reaction-picker__toggle--active');

        positionPopup(toggleBtn, popup);
    }

    function positionPopup(referenceEl, floatingEl) {
        var FloatingUIDOM = window.FloatingUIDOM;
        
        floatingEl.style.left = '0';
        floatingEl.style.top = '0';
        
        if (FloatingUIDOM && typeof FloatingUIDOM.computePosition === 'function') {
            function updatePosition() {
                var middleware = [];
                
                if (FloatingUIDOM.offset) middleware.push(FloatingUIDOM.offset(8));
                if (FloatingUIDOM.flip) middleware.push(FloatingUIDOM.flip());
                if (FloatingUIDOM.shift) middleware.push(FloatingUIDOM.shift({ padding: 8 }));
                
                FloatingUIDOM.computePosition(referenceEl, floatingEl, {
                    placement: 'top-start',
                    strategy: 'fixed',
                    middleware: middleware
                }).then(function(data) {
                    Object.assign(floatingEl.style, {
                        left: Math.round(data.x) + 'px',
                        top: Math.round(data.y) + 'px'
                    });
                });
            }
            
            updatePosition();
            
            if (typeof FloatingUIDOM.autoUpdate === 'function') {
                activeCleanup = FloatingUIDOM.autoUpdate(referenceEl, floatingEl, updatePosition);
            } else {
                activeCleanup = null;
            }
        } else {
            var rect = referenceEl.getBoundingClientRect();
            var popupHeight = floatingEl.offsetHeight || 48;
            
            floatingEl.style.left = rect.left + 'px';
            floatingEl.style.top = (rect.top - popupHeight - 8) + 'px';
            
            activeCleanup = null;
        }
    }

    function closePopup() {
        if (activeCleanup && typeof activeCleanup === 'function') {
            activeCleanup();
        }
        activeCleanup = null;
        
        if (activePopup) {
            activePopup.classList.add('wall-reaction-popup--closing');
            setTimeout(function() {
                if (activePopup) {
                    activePopup.remove();
                    activePopup = null;
                }
            }, 150);
        }
        
        document.querySelectorAll('.wall-reaction-picker__toggle--active').forEach(function(btn) {
            btn.classList.remove('wall-reaction-picker__toggle--active');
        });
    }

    function getEmojiMap(postId, targetType) {
        targetType = targetType || 'post';
        var selector = targetType === 'comment' 
            ? '[data-picker-toggle="' + postId + '"][data-picker-type="comment"]'
            : '[data-picker-toggle="' + postId + '"]';
        var container = document.querySelector(selector);
        
        // Fallback to any picker on the page
        if (!container) {
            container = document.querySelector('[data-picker-toggle]');
        }
        if (!container) return { heart: '❤️', fire: '🔥', thumbs_up: '👍', laugh: '😂', wow: '😮', party: '🎉' };
        
        var wrapper = container.closest('.wall-reaction-picker');
        if (!wrapper) return { heart: '❤️', fire: '🔥', thumbs_up: '👍', laugh: '😂', wow: '😮', party: '🎉' };
        
        var hidden = wrapper.querySelector('[data-emoji-map]');
        if (hidden && hidden.value) {
            try {
                return JSON.parse(hidden.value);
            } catch (e) {
                // ignore
            }
        }
        
        return { heart: '❤️', fire: '🔥', thumbs_up: '👍', laugh: '😂', wow: '😮', party: '🎉' };
    }

    function sendReaction(postId, emojiId, action, btnElement, targetType) {
        targetType = targetType || 'post';
        var requestKey = targetType + '_' + postId + '_' + emojiId;
        if (pendingRequests[requestKey]) return;
        pendingRequests[requestKey] = true;

        // Optimistic UI update
        if (btnElement) {
            if (action === 'add') {
                btnElement.classList.add('wall-reactions__pill--active');
                var countEl = btnElement.querySelector('[data-count]');
                if (countEl) countEl.textContent = parseInt(countEl.textContent || 0) + 1;
            } else {
                btnElement.classList.remove('wall-reactions__pill--active');
                var countEl = btnElement.querySelector('[data-count]');
                if (countEl) {
                    var newCount = parseInt(countEl.textContent || 1) - 1;
                    if (newCount <= 0) {
                        // Fade out pill immediately for 1->0
                        btnElement.style.opacity = '0';
                        btnElement.style.transform = 'scale(0.8)';
                    } else {
                        countEl.textContent = newCount;
                    }
                }
            }
        }

        var csrfMeta = document.querySelector('meta[name="csrf-token"]');
        var csrfInput = document.querySelector('input[name="_token"]');
        var token = csrfMeta ? csrfMeta.content : (csrfInput ? csrfInput.value : '');

        var urlPath = targetType === 'comment' 
            ? 'profile-posts/comment/' + postId + '/react'
            : 'profile-posts/' + postId + '/react';
        var url = window.u ? u(urlPath) : '/' + urlPath;
        
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                emojiId: emojiId,
                action: action,
                _token: token
            })
        })
        .then(function(response) {
            return response.json().then(function(data) {
                return { ok: response.ok, data: data };
            });
        })
        .then(function(result) {
            delete pendingRequests[requestKey];
            
            if (!result.ok) {
                // Revert optimistic update
                if (btnElement) {
                    btnElement.style.opacity = '';
                    btnElement.style.transform = '';
                    if (action === 'add') {
                        btnElement.classList.remove('wall-reactions__pill--active');
                        var countEl = btnElement.querySelector('[data-count]');
                        if (countEl) countEl.textContent = parseInt(countEl.textContent || 1) - 1;
                    } else {
                        btnElement.classList.add('wall-reactions__pill--active');
                        var countEl = btnElement.querySelector('[data-count]');
                        if (countEl) countEl.textContent = parseInt(countEl.textContent || 0) + 1;
                    }
                }
                
                var errMsg = result.data && (result.data.error || result.data.message);
                notify(errMsg || 'Error');
                return;
            }
            
            // Update UI with server data
            if (result.data && result.data.reactions !== undefined) {
                var map = result.data.emojiMap || getEmojiMap(postId, targetType);
                updateReactionsUI(postId, result.data.reactions, result.data.userReactions || [], map, targetType);
            }
        })
        .catch(function(error) {
            delete pendingRequests[requestKey];
            
            // Revert optimistic update
            if (btnElement) {
                btnElement.style.opacity = '';
                btnElement.style.transform = '';
                if (action === 'add') {
                    btnElement.classList.remove('wall-reactions__pill--active');
                } else {
                    btnElement.classList.add('wall-reactions__pill--active');
                }
            }
            
            notify('Network error');
            console.error('Reaction error:', error);
        });
    }

    function updateReactionsUI(postId, reactions, userReactionIds, emojiMap, targetType) {
        targetType = targetType || 'post';
        var targetEl = document.getElementById((targetType === 'comment' ? 'comment-' : 'post-') + postId);
        if (!targetEl) {
            console.warn('Target not found:', targetType, postId);
            return;
        }
        
        var reactionsRow = targetEl.querySelector('.wall-reactions-row' + (targetType === 'comment' ? '.wall-reactions-row--compact' : ':not(.wall-reactions-row--compact)'));
        var container = targetEl.querySelector('[data-reactions="' + targetType + '-' + postId + '"]');
        
        var hasReactions = reactions && Object.keys(reactions).length > 0 && 
            Object.keys(reactions).some(function(k) { return reactions[k] > 0; });
        
        if (!hasReactions) {
            if (container) {
                container.innerHTML = '';
            }
            return;
        }
        
        var isNewContainer = false;
        if (!container && reactionsRow) {
            isNewContainer = true;
            container = document.createElement('div');
            container.className = 'wall-reactions' + (targetType === 'comment' ? ' wall-reactions--compact' : '');
            container.setAttribute('data-reactions', targetType + '-' + postId);
            
            // Insert at the beginning of row (before picker)
            reactionsRow.insertBefore(container, reactionsRow.firstChild);
        }
        
        if (!container) {
            console.warn('Could not create reactions container');
            return;
        }
        
        // Get existing pills for smooth update
        var existingPills = {};
        container.querySelectorAll('[data-reaction-id]').forEach(function(pill) {
            existingPills[pill.getAttribute('data-reaction-id')] = pill;
        });

        var sortedIds = Object.keys(reactions).sort(function(a, b) {
            return reactions[b] - reactions[a];
        });
        
        // Track which pills to keep
        var keptIds = {};
        
        sortedIds.forEach(function(emojiId, index) {
            var count = reactions[emojiId];
            if (count <= 0) return;
            
            keptIds[emojiId] = true;
            var emoji = emojiMap[emojiId] || '❓';
            var isActive = userReactionIds.indexOf(emojiId) !== -1;
            
            var existingPill = existingPills[emojiId];
            
            if (existingPill) {
                // Update existing pill
                var countEl = existingPill.querySelector('[data-count]');
                if (countEl) countEl.textContent = count;
                
                if (isActive) {
                    existingPill.classList.add('wall-reactions__pill--active');
                } else {
                    existingPill.classList.remove('wall-reactions__pill--active');
                }
            } else {
                // Create new pill
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'wall-reactions__pill' + (isNewContainer ? '' : ' wall-reactions__pill--new');
                if (isActive) {
                    btn.classList.add('wall-reactions__pill--active');
                }
                btn.setAttribute('data-reaction-id', emojiId);
                btn.setAttribute('data-post', postId);
                btn.setAttribute('data-target-type', targetType);
                btn.innerHTML = '<span class="wall-reactions__emoji">' + emoji + '</span><span class="wall-reactions__count" data-count>' + count + '</span>';
                
                container.appendChild(btn);
                
                if (!isNewContainer) {
                    setTimeout(function() {
                        btn.classList.remove('wall-reactions__pill--new');
                    }, 200);
                }
                
                btn._wallInit = true;
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    this.classList.add('wall-reactions__pill--clicked');
                    var self = this;
                    setTimeout(function() {
                        self.classList.remove('wall-reactions__pill--clicked');
                    }, 150);
                    
                    var currentlyActive = this.classList.contains('wall-reactions__pill--active');
                    var tt = this.getAttribute('data-target-type') || 'post';
                    sendReaction(postId, emojiId, currentlyActive ? 'remove' : 'add', this, tt);
                });
            }
        });
        
        // Remove pills that no longer have reactions
        Object.keys(existingPills).forEach(function(emojiId) {
            if (!keptIds[emojiId]) {
                var pill = existingPills[emojiId];
                pill.style.opacity = '0';
                pill.style.transform = 'scale(0.8)';
                setTimeout(function() {
                    if (pill.parentNode) pill.remove();
                }, 150);
            }
        });
    }

    function initRepliesToggle() {
        document.querySelectorAll('[data-toggle-replies]').forEach(function(btn) {
            if (btn._wallInit) return;
            btn._wallInit = true;

            btn.addEventListener('click', function() {
                var postId = this.getAttribute('data-toggle-replies');
                var replies = document.getElementById('replies-' + postId);
                
                if (!replies) return;

                var isVisible = replies.getAttribute('data-replies-visible') === '1';
                replies.setAttribute('data-replies-visible', isVisible ? '0' : '1');
            });
        });
    }

    function initComposer() {
        document.querySelectorAll('[data-wall-textarea]').forEach(function(textarea) {
            if (textarea._wallInit) return;
            textarea._wallInit = true;

            var form = textarea.closest('form');
            var submitBtn = form ? form.querySelector('[data-wall-submit]') : null;

            function update() {
                textarea.style.height = 'auto';
                textarea.style.height = Math.min(textarea.scrollHeight, 160) + 'px';

                var hasContent = textarea.value.trim().length > 0;
                var hasImage = form && form.querySelector('[data-image-input]') && form.querySelector('[data-image-input]').files.length > 0;
                
                if (submitBtn) {
                    submitBtn.disabled = !hasContent && !hasImage;
                }
            }

            textarea.addEventListener('input', update);

            textarea.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    e.preventDefault();
                    if (submitBtn && !submitBtn.disabled) {
                        submitBtn.click();
                    }
                }
            });

            if (form) {
                form.addEventListener('htmx:afterRequest', function(e) {
                    if (e.detail.successful) {
                        textarea.value = '';
                        textarea.style.height = '';
                        if (submitBtn) submitBtn.disabled = true;
                        
                        var preview = form.querySelector('[data-image-preview]');
                        var imageInput = form.querySelector('[data-image-input]');
                        if (preview) preview.style.display = 'none';
                        if (imageInput) imageInput.value = '';
                    }
                });
            }
        });
    }

    function initImageUpload() {
        document.querySelectorAll('[data-image-input]').forEach(function(input) {
            if (input._wallInit) return;
            input._wallInit = true;

            var form = input.closest('form');
            var preview = form ? form.querySelector('[data-image-preview]') : null;
            var previewImg = preview ? preview.querySelector('img') : null;
            var removeBtn = form ? form.querySelector('[data-remove-image]') : null;
            var submitBtn = form ? form.querySelector('[data-wall-submit]') : null;
            var textarea = form ? form.querySelector('[data-wall-textarea]') : null;

            input.addEventListener('change', function() {
                var file = this.files[0];
                if (!file) return;

                if (!file.type.match(/^image\/(jpeg|png|gif|webp)$/)) {
                    notify('Invalid image format');
                    this.value = '';
                    return;
                }

                var maxSize = 5 * 1024 * 1024;
                if (file.size > maxSize) {
                    notify('Image too large (max 5MB)');
                    this.value = '';
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    if (previewImg) previewImg.src = e.target.result;
                    if (preview) preview.style.display = 'block';
                    if (submitBtn) submitBtn.disabled = false;
                };
                reader.readAsDataURL(file);
            });

            if (removeBtn) {
                removeBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    input.value = '';
                    if (preview) preview.style.display = 'none';
                    if (previewImg) previewImg.src = '';
                    
                    if (submitBtn && textarea) {
                        submitBtn.disabled = !textarea.value.trim();
                    }
                });
            }
        });
    }

    function initLightbox() {
        document.querySelectorAll('.wall-post__image:not([data-lb-init])').forEach(function(container) {
            container.setAttribute('data-lb-init', 'true');
            
            var img = container.querySelector('img');
            if (!img) return;

            img.style.cursor = 'zoom-in';
            container.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (typeof Lightbox !== 'undefined' && Lightbox.openFromContainer) {
                    container.classList.add('md-content');
                    Lightbox.openFromContainer(container, img);
                } else {
                    openSimpleLightbox(img.src);
                }
            });
        });
    }

    function openSimpleLightbox(src) {
        var overlay = document.getElementById('wall-lightbox');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.id = 'wall-lightbox';
            overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.9);z-index:9999;display:flex;align-items:center;justify-content:center;cursor:zoom-out;';
            overlay.innerHTML = '<img style="max-width:90%;max-height:90%;object-fit:contain;border-radius:8px;" />';
            document.body.appendChild(overlay);

            overlay.addEventListener('click', function() {
                this.style.display = 'none';
                document.body.style.overflow = '';
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && overlay.style.display !== 'none') {
                    overlay.style.display = 'none';
                    document.body.style.overflow = '';
                }
            });
        }

        overlay.querySelector('img').src = src;
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

})();
