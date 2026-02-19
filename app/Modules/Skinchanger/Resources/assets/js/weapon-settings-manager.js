// Skinchanger Weapon Settings Manager - Handles weapon settings, float picker, stickers, charms
window.SkinchangerWeaponSettingsManager = (function () {
    'use strict';

    let currentSkinSettings = null;
    let stickerController = null;
    let charmController = null;
    let currentSidebarContext = null;
    let infiniteScrollObservers = new Map();

    let debouncedStickerSearch;
    let debouncedCharmSearch;

    /**
     * Initialize the manager
     */
    function init() {
        debouncedStickerSearch = window.SkinchangerUtils.debounce((ctx, val) => {
            const { weaponIndex, skinId, slotIndex, serverId, team } = ctx;
            loadStickersSidebar(weaponIndex, skinId, slotIndex, serverId, team, val, 1);
        }, 300);

        debouncedCharmSearch = window.SkinchangerUtils.debounce((ctx, val) => {
            const { weaponIndex, skinId, serverId, team } = ctx;
            loadCharmsSidebar(weaponIndex, skinId, serverId, team, val, 1);
        }, 300);
    }

    /**
     * Handle weapon settings button click
     * @param {HTMLElement} button - Settings button
     * @param {Event} event - Click event
     */
    function handleWeaponSettings(button, event) {
        event.preventDefault();
        event.stopPropagation();

        const weaponId = button.dataset.weaponId;
        const weaponName = button.dataset.weaponName;
        const skinId = button.dataset.skinId;
        const skinName = button.dataset.skinName;
        const rarityColor = button.dataset.rarityColor;
        const skinImage = button.dataset.skinImage;
        const currentWear = button.dataset.currentWear;
        const currentStatTrak = button.dataset.currentStattrak === 'true';
        const currentFloat = button.dataset.currentFloat;
        const currentPattern = button.dataset.currentPattern;
        const currentNametag = button.dataset.currentNametag;

        currentSkinSettings = {
            weaponId,
            weaponName,
            skinId,
            skinName,
            rarityColor,
            skinImage,
            currentWear,
            currentStatTrak,
            currentFloat,
            currentPattern,
            currentNametag
        };

        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.updateModalTitle('skin-settings-modal', `${skinName} - ${weaponName}`);
            window.SkinchangerModalManager.restoreModalSkeleton('skin-settings-modal');
            window.SkinchangerModalManager.openModal('skin-settings-modal');
        }

        loadSkinSettings(weaponId, weaponName, skinId, skinName, rarityColor, skinImage, {
            currentWear,
            currentStatTrak,
            currentFloat,
            currentPattern,
            currentNametag
        });
    }

    /**
     * Load skin settings modal content
     * @param {string} weaponId - Weapon ID
     * @param {string} weaponName - Weapon name
     * @param {string} skinId - Skin ID
     * @param {string} skinName - Skin name
     * @param {string} rarityColor - Rarity color
     * @param {string} skinImage - Skin image
     * @param {Object} currentSettings - Current settings
     */
    async function loadSkinSettings(weaponId, weaponName, skinId, skinName, rarityColor, skinImage, currentSettings = {}) {
        const modal = document.getElementById('skin-settings-modal');
        const modalBody = modal.querySelector('.modal__content');

        try {
            const settingsHtml = await loadSkinSettingsFromServer({
                weaponId,
                weaponName,
                skinId,
                skinName,
                rarityColor,
                skinImage,
                serverId: window.SkinchangerManager?.getServerId() || '',
                currentTeam: window.SkinchangerManager?.getCurrentTeam() || 'ct',
                ...currentSettings
            });

            modalBody.innerHTML = settingsHtml;
            initializeFloatPickers();

        } catch (error) {
            console.error('Error loading skin settings:', error);
            modalBody.innerHTML = '<div class="error-message">Failed to load settings. Please try again.</div>';
        }
    }

    /**
     * Load skin settings from server
     * @param {Object} data - Settings data
     * @returns {Promise<string>} HTML content
     */
    async function loadSkinSettingsFromServer(data) {
        try {
            const params = new URLSearchParams({
                weapon_id: data.weaponId,
                skin_id: data.skinId,
                server_id: data.serverId,
                team: data.currentTeam
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                u(`skins/weapon-settings?${params.toString()}`)
            );

            return await response.text();
        } catch (error) {
            console.error('Error loading skin settings from server:', error);
            return '<div class="error-message">Failed to load settings. Please try again.</div>';
        }
    }

    /**
     * Handle weapon setting update
     * @param {HTMLElement} element - Input element
     * @param {Event} event - Input event
     */
    function handleUpdateWeaponSetting(element, event) {
        const weaponIndex = element.dataset.weaponIndex;
        const skinId = element.dataset.skinId;
        const settingName = element.dataset.settingName;
        const serverId = element.dataset.serverId;
        const team = element.dataset.team;
        const settingValue = element.type === 'checkbox' ? element.checked : element.value;

        console.log('Updating weapon setting:', { weaponIndex, skinId, settingName, settingValue, team, serverId });

        updateWeaponSetting(weaponIndex, skinId, settingName, settingValue, serverId, team);
    }

    /**
     * Update weapon setting on server
     * @param {string} weaponIndex - Weapon index
     * @param {string} skinId - Skin ID
     * @param {string} settingName - Setting name
     * @param {string|boolean} settingValue - Setting value
     * @param {string} serverId - Server ID
     * @param {string} team - Team
     */
    async function updateWeaponSetting(weaponIndex, skinId, settingName, settingValue, serverId, team) {
        if (!window.SkinchangerManager || !window.SkinchangerUtils) {
            console.error('Required managers not available');
            return;
        }

        const routes = window.SkinchangerManager.getRoutes();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId || window.SkinchangerManager.getServerId(),
            team: team === 'ct' ? 0 : 1,
            weapon_index: weaponIndex,
            skin_id: skinId,
            setting_name: settingName,
            setting_value: settingValue
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.updateWeaponSetting || '/skins/update-weapon-setting',
                {
                    method: 'POST',
                    body: formData
                }
            );

            const data = await response.json();

            if (data.success) {
                console.log(`Successfully updated ${settingName} to ${settingValue}`);
                if (settingName === 'nametag') {
                    window.SkinchangerManager.refreshContent();
                }
            } else {
                console.error(`Failed to update ${settingName}:`, data.error);
                window.SkinchangerUtils.showNotification(data.error || `Failed to update ${settingName}`, 'error');
            }
        } catch (error) {
            console.error(`Error updating ${settingName}:`, error);
            window.SkinchangerUtils.showNotification(`Failed to update ${settingName}`, 'error');
        }
    }

    /**
     * Handle float thumb interaction
     * @param {HTMLElement} element - Float thumb element
     * @param {Event} event - Mouse event
     */
    function handleFloatThumb(element, event) {
        event.preventDefault();
        event.stopPropagation();

        const thumb = element;
        const track = thumb.closest('.float-track');
        const picker = thumb.closest('.float-visual-picker');

        if (!track || !picker) return;

        initializeFloatDragging(thumb, track, picker);
    }

    /**
     * Initialize float pickers
     */
    function initializeFloatPickers() {
        document.querySelectorAll('.float-visual-picker').forEach(picker => {
            const thumb = picker.querySelector('.float-thumb');
            const track = picker.querySelector('.float-track');
            const floatInput = picker.closest('.setting-section').querySelector('input[type="number"]');

            if (thumb && track && floatInput) {
                const currentFloat = parseFloat(floatInput.value) || 0;
                const percentage = currentFloat * 100;
                thumb.style.left = percentage + '%';

                updateQualityDisplay(floatInput.value, picker);

                floatInput.addEventListener('input', (e) => {
                    const value = parseFloat(e.target.value) || 0;
                    const clampedValue = Math.max(0, Math.min(1, value));
                    const percentage = clampedValue * 100;

                    thumb.style.left = percentage + '%';
                    updateQualityDisplay(clampedValue.toString(), picker);
                });

                initializeFloatDragging(thumb, track, picker);
            }
        });
    }

    /**
     * Initialize float dragging functionality
     * @param {HTMLElement} thumb - Float thumb element
     * @param {HTMLElement} track - Float track element
     * @param {HTMLElement} picker - Float picker container
     */
    function initializeFloatDragging(thumb, track, picker) {
        let isDragging = false;

        const updateThumbPosition = (clientX) => {
            const trackRect = track.getBoundingClientRect();
            const x = clientX - trackRect.left;
            const percentage = Math.max(0, Math.min(100, (x / trackRect.width) * 100));
            const floatValue = (percentage / 100).toFixed(3);

            thumb.style.left = percentage + '%';

            const floatInput = picker.closest('.setting-section').querySelector('input[type="number"]');
            if (floatInput) {
                floatInput.value = floatValue;
            }

            updateQualityDisplay(floatValue, picker);
        };

        const onMouseMove = (e) => {
            if (!isDragging) return;
            e.preventDefault();
            updateThumbPosition(e.clientX);
        };

        const onMouseUp = (e) => {
            if (!isDragging) return;
            isDragging = false;
            thumb.classList.remove('dragging');
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
            document.removeEventListener('selectstart', preventSelect);
        };

        const onMouseDown = (e) => {
            e.preventDefault();
            isDragging = true;
            thumb.classList.add('dragging');
            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
            document.addEventListener('selectstart', preventSelect);
        };

        const preventSelect = (e) => {
            e.preventDefault();
            return false;
        };

        const onTrackClick = (e) => {
            if (e.target === thumb || e.target.closest('.float-thumb')) return;
            e.preventDefault();
            updateThumbPosition(e.clientX);
        };

        thumb.removeEventListener('mousedown', onMouseDown);
        track.removeEventListener('click', onTrackClick);

        thumb.addEventListener('mousedown', onMouseDown);
        track.addEventListener('click', onTrackClick);
    }

    /**
     * Update quality display based on float value
     * @param {string} floatValue - Float value
     * @param {HTMLElement} picker - Float picker element
     */
    function updateQualityDisplay(floatValue, picker) {
        const float = parseFloat(floatValue);
        let quality = '';
        let qualityIndex = 0;
        let color = '';

        if (float <= 0.07) {
            quality = 'Factory New';
            qualityIndex = 0;
            color = '#4CAF50';
        } else if (float <= 0.15) {
            quality = 'Minimal Wear';
            qualityIndex = 1;
            color = '#8BC34A';
        } else if (float <= 0.38) {
            quality = 'Field-Tested';
            qualityIndex = 2;
            color = '#FF9800';
        } else if (float <= 0.45) {
            quality = 'Well-Worn';
            qualityIndex = 3;
            color = '#FF5722';
        } else {
            quality = 'Battle-Scarred';
            qualityIndex = 4;
            color = '#F44336';
        }

        const currentQuality = picker.closest('.setting-section').querySelector('.current-quality');
        if (currentQuality) {
            currentQuality.textContent = quality;
            currentQuality.style.setProperty('--quality-color', color);
        }

        const qualityInput = document.querySelector('input[name="temp_quality"]');
        if (qualityInput) {
            qualityInput.value = qualityIndex;
        }

        const statsPanel = document.querySelector('.weapon-stats');
        if (statsPanel) {
            const floatStat = statsPanel.querySelector('.stat-item .stat-value');
            const qualityStat = statsPanel.querySelectorAll('.stat-item .stat-value')[1];

            if (floatStat) floatStat.textContent = floatValue;
            if (qualityStat) qualityStat.textContent = quality;
        }
    }

    /**
     * Handle apply skin settings
     * @param {HTMLElement} element - Apply button
     * @param {Event} event - Click event
     */
    async function handleApplySkinSettings(element, event) {
        event.preventDefault();

        const weaponIndex = element.dataset.weaponIndex;
        const skinId = element.dataset.skinId;
        const serverId = element.dataset.serverId;
        const team = element.dataset.team;

        // Collect all settings
        const formData = new FormData();
        formData.append('weapon_index', weaponIndex);
        formData.append('skin_id', skinId);
        formData.append('server_id', serverId);
        formData.append('team', team);

        // Get float value
        const floatInput = document.querySelector('input[name="float"]');
        if (floatInput) {
            formData.append('float', floatInput.value);
        }

        // Get nametag
        const nametagInput = document.querySelector('input[name="nametag"]');
        if (nametagInput) {
            formData.append('nametag', nametagInput.value);
        }

        // Get pattern
        const patternInput = document.querySelector('input[name="pattern"]');
        if (patternInput) {
            formData.append('pattern', patternInput.value);
        }

        // Get StatTrak
        const statTrakInput = document.querySelector('input[name="stattrack"]');
        if (statTrakInput) {
            formData.append('stattrack', statTrakInput.checked);
        }

        // Get quality from hidden input
        const qualityInput = document.querySelector('input[name="temp_quality"]');
        if (qualityInput) {
            formData.append('quality', qualityInput.value);
        }

        // Get stickers
        for (let i = 0; i < 4; i++) {
            const stickerInput = document.querySelector(`input[name="temp_sticker_slot_${i}"]`);
            if (stickerInput) {
                formData.append(`sticker_slot_${i}`, stickerInput.value);
            }
        }

        // Get charm
        const charmInput = document.querySelector('input[name="temp_charm"]');
        if (charmInput) {
            formData.append('charm', charmInput.value);
        }

        try {
            // Show loading state
            element.disabled = true;
            element.setAttribute('aria-busy', 'true');

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                u('skins/apply-skin-settings'),
                {
                    method: 'POST',
                    body: formData
                }
            );

            const result = await response.json();

            if (result.success) {
                // Close modal and refresh content
                if (window.SkinchangerModalManager) {
                    window.SkinchangerModalManager.closeActiveModals();
                }
                window.SkinchangerManager.refreshContent();

                window.SkinchangerUtils.showNotification(result.message || 'Settings applied', 'success');
            } else {
                throw new Error(result.message || 'Failed to apply settings');
            }

        } catch (error) {
            console.error('Failed to apply skin settings:', error);
            window.SkinchangerUtils.showNotification(error.message || 'Failed to apply settings', 'error');
        } finally {
            // Restore button state
            element.disabled = false;
            element.removeAttribute('aria-busy');
        }
    }

    /**
     * Refresh skin settings
     */
    function refreshSkinSettings() {
        if (currentSkinSettings) {
            const { weaponId, weaponName, skinId, skinName, rarityColor, skinImage } = currentSkinSettings;
            loadSkinSettings(weaponId, weaponName, skinId, skinName, rarityColor, skinImage, currentSkinSettings);
        }
    }

    // Sticker and charm handlers (placeholders)
    function handleStickerSlot(element, event) {
        event.preventDefault();
        event.stopPropagation();
        window.SkinchangerUtils.showNotification('Sticker selection coming soon!', 'info');
    }

    function handleCharmSlot(element, event) {
        event.preventDefault();
        event.stopPropagation();
        window.SkinchangerUtils.showNotification('Charm selection coming soon!', 'info');
    }

    function handleRemoveSticker(element, event) {
        event.preventDefault();
        event.stopPropagation();

        const stickerMini = element.closest('.sticker-mini');
        if (stickerMini) {
            stickerMini.classList.remove('has-sticker');
            stickerMini.classList.add('empty-sticker');
            stickerMini.innerHTML = '<span class="add-icon">+</span>';
        }

        window.SkinchangerUtils.showNotification('Sticker removed', 'success');
    }

    function handleRemoveCharm(element, event) {
        event.preventDefault();
        event.stopPropagation();

        const charmMini = element.closest('.charm-mini');
        if (charmMini) {
            charmMini.classList.remove('has-charm');
            charmMini.classList.add('empty-charm');
            charmMini.innerHTML = '<span class="add-icon">+</span>';
        }

        window.SkinchangerUtils.showNotification('Charm removed', 'success');
    }

    // Sidebar handlers
    function handleOpenStickerSidebar(element, event) {
        event.preventDefault();
        event.stopPropagation();

        const weaponIndex = element.dataset.weaponIndex;
        const skinId = element.dataset.skinId;
        const slotIndex = element.dataset.slot;
        const serverId = element.dataset.serverId;
        const team = element.dataset.team;

        loadStickersSidebar(weaponIndex, skinId, slotIndex, serverId, team);
    }

    function handleOpenCharmSidebar(element, event) {
        event.preventDefault();
        event.stopPropagation();

        const weaponIndex = element.dataset.weaponIndex;
        const skinId = element.dataset.skinId;
        const serverId = element.dataset.serverId;
        const team = element.dataset.team;

        loadCharmsSidebar(weaponIndex, skinId, serverId, team);
    }

    async function loadStickersSidebar(weaponIndex, skinId, slotIndex, serverId, team, search = '', page = 1) {
        const sidebar = document.getElementById('right-sidebar');
        const content = sidebar.querySelector('#right-sidebar-content');

        cleanupInfiniteScroll();
        stickerController?.abort();
        stickerController = new AbortController();
        const { signal } = stickerController;

        const isInitialLoad = !currentSidebarContext || currentSidebarContext.type !== 'stickers';

        currentSidebarContext = {
            type: 'stickers',
            weaponIndex,
            skinId,
            slotIndex,
            serverId,
            team,
            search,
            page,
            isLoading: false
        };

        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.openModal('right-sidebar');
        }

        if (isInitialLoad) {
            content.innerHTML = `
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;width: 100%;padding: 20px;">
                    ${Array(20).fill().map(() => `
                        <div class="skeleton" style="width: 100%; height: 200px;width: 200px;border-radius: var(--border05);"></div>
                    `).join('')}
                </div>
            `;
        }

        try {
            const params = new URLSearchParams({
                weapon_index: weaponIndex,
                skin_id: skinId,
                slot_index: slotIndex,
                server_id: serverId,
                team: team,
                search: search,
                page: page
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                u(`skins/stickers-sidebar?${params.toString()}`),
                { signal }
            );

            if (!response.ok) throw new Error(`HTTP ${response.status}`);

            const html = await response.text();
            content.innerHTML = html;

            setTimeout(() => {
                const sidebarContent = document.querySelector('.stickers-sidebar__content');
                if (sidebarContent) sidebarContent.scrollTop = 0;
                initializeSidebarInfiniteScroll();
            }, 100);

        } catch (error) {
            if (error.name === 'AbortError') return;
            console.error('Failed to load stickers sidebar:', error);
            content.innerHTML = '<div class="error-message">Error loading stickers</div>';
        }
    }

    async function loadCharmsSidebar(weaponIndex, skinId, serverId, team, search = '', page = 1) {
        const sidebar = document.getElementById('right-sidebar');
        const content = sidebar.querySelector('#right-sidebar-content');

        cleanupInfiniteScroll();
        charmController?.abort();
        charmController = new AbortController();
        const { signal } = charmController;

        const isInitialLoad = !currentSidebarContext || currentSidebarContext.type !== 'charms';

        currentSidebarContext = {
            type: 'charms',
            weaponIndex,
            skinId,
            serverId,
            team,
            search,
            page,
            isLoading: false
        };

        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.openModal('right-sidebar');
        }

        if (isInitialLoad) {
            content.innerHTML = `
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;width: 100%;padding: 20px;">
                    ${Array(20).fill().map(() => `
                        <div class="skeleton" style="width: 100%; height: 200px;width: 200px;border-radius: var(--border05);"></div>
                    `).join('')}
                </div>
            `;
        }

        try {
            const params = new URLSearchParams({
                weapon_index: weaponIndex,
                skin_id: skinId,
                server_id: serverId,
                team: team,
                search: search,
                page: page
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                u(`skins/charms-sidebar?${params.toString()}`),
                { signal }
            );

            if (!response.ok) throw new Error(`HTTP ${response.status}`);

            const html = await response.text();
            content.innerHTML = html;

            setTimeout(() => {
                const sidebarContent = document.querySelector('.charms-sidebar__content');
                if (sidebarContent) sidebarContent.scrollTop = 0;
                initializeSidebarInfiniteScroll();
            }, 100);

        } catch (error) {
            if (error.name === 'AbortError') return;
            console.error('Failed to load charms sidebar:', error);
            content.innerHTML = '<div class="error-message">Error loading charms</div>';
        }
    }

    function handleSelectSticker(element, event) {
        event.preventDefault();

        const stickerId = element.dataset.stickerId;
        const stickerName = element.dataset.stickerName;
        const stickerImage = element.dataset.stickerImage;
        const slotIndex = element.dataset.slotIndex;

        updateTempStickerData(slotIndex, stickerId, stickerName, stickerImage);
        updateStickerSlotUI(slotIndex, stickerName, stickerImage);
        closeSidebar();
    }

    function handleSelectCharm(element, event) {
        event.preventDefault();

        const charmId = element.dataset.charmId;
        const charmName = element.dataset.charmName;
        const charmImage = element.dataset.charmImage;

        updateTempCharmData(charmId, charmName, charmImage);
        updateCharmSlotUI(charmName, charmImage);
        closeSidebar();
    }

    function handleRemoveStickerSelection(element, event) {
        event.preventDefault();
        const slotIndex = element.dataset.slotIndex;
        updateTempStickerData(slotIndex, '0', '', '');
        updateStickerSlotUI(slotIndex, '', '');
        closeSidebar();
    }

    function handleRemoveCharmSelection(element, event) {
        event.preventDefault();
        updateTempCharmData('0', '', '');
        updateCharmSlotUI('', '');
        closeSidebar();
    }

    function handleRemoveStickerTemp(element, event) {
        event.preventDefault();
        event.stopPropagation();
        const slotIndex = element.dataset.slot;
        updateTempStickerData(slotIndex, '0', '', '');
        updateStickerSlotUI(slotIndex, '', '');
    }

    function handleRemoveCharmTemp(element, event) {
        event.preventDefault();
        event.stopPropagation();
        updateTempCharmData('0', '', '');
        updateCharmSlotUI('', '');
    }

    function updateTempStickerData(slotIndex, stickerId, stickerName, stickerImage) {
        const hiddenInput = document.querySelector(`input[name="temp_sticker_slot_${slotIndex}"]`);
        if (hiddenInput) hiddenInput.value = stickerId;
    }

    function updateTempCharmData(charmId, charmName, charmImage) {
        const hiddenInput = document.querySelector(`input[name="temp_charm"]`);
        if (hiddenInput) hiddenInput.value = charmId;
    }

    function updateStickerSlotUI(slotIndex, stickerName, stickerImage) {
        const stickerSlot = document.querySelector(`.sticker-mini[data-slot="${slotIndex}"]`);
        if (!stickerSlot) return;

        if (stickerImage && stickerName) {
            stickerSlot.classList.remove('empty-sticker');
            stickerSlot.classList.add('has-sticker');
            stickerSlot.innerHTML = `
                <img src="${stickerImage}" alt="${stickerName}" loading="lazy">
                <div class="remove-sticker" data-handler="remove-sticker-temp" data-slot="${slotIndex}">×</div>
            `;
        } else {
            stickerSlot.classList.remove('has-sticker');
            stickerSlot.classList.add('empty-sticker');
            stickerSlot.innerHTML = '<span class="add-icon">+</span>';
        }
    }

    function updateCharmSlotUI(charmName, charmImage) {
        const charmSlot = document.querySelector('.charm-mini');
        if (!charmSlot) return;

        if (charmImage && charmName) {
            charmSlot.classList.remove('empty-charm');
            charmSlot.classList.add('has-charm');
            charmSlot.innerHTML = `
                <img src="${charmImage}" alt="${charmName}" loading="lazy">
                <div class="remove-charm" data-handler="remove-charm-temp">×</div>
            `;
        } else {
            charmSlot.classList.remove('has-charm');
            charmSlot.classList.add('empty-charm');
            charmSlot.innerHTML = '<span class="add-icon">+</span>';
        }
    }

    function initializeSidebarInfiniteScroll() {
        cleanupInfiniteScroll();

        const sidebarMain = document.querySelector('.stickers-sidebar__main, .charms-sidebar__main');
        if (!sidebarMain) return;

        const content = sidebarMain.querySelector('.stickers-sidebar__content, .charms-sidebar__content');
        const grid = sidebarMain.querySelector('#stickers-grid, #charms-grid');
        if (!content || !grid) return;

        content.scrollTop = 0;
        setTimeout(() => { content.scrollTop = 0; }, 50);

        const sentinel = document.createElement('div');
        sentinel.className = 'sidebar-infinite-sentinel';
        grid.appendChild(sentinel);

        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && currentSidebarContext && !currentSidebarContext.isLoading) {
                loadMoreSidebarItems();
            }
        }, { root: content, rootMargin: '400px' });

        observer.observe(sentinel);

        infiniteScrollObservers.set('sidebar', { observer, sentinel, content, grid });
    }

    async function loadMoreSidebarItems() {
        if (!currentSidebarContext || currentSidebarContext.isLoading) {
            console.log('loadMoreSidebarItems: skipping - no context or already loading');
            return;
        }

        console.log('loadMoreSidebarItems: loading page', (currentSidebarContext.page || 1) + 1);

        currentSidebarContext.isLoading = true;
        const nextPage = (currentSidebarContext.page || 1) + 1;

        const context = currentSidebarContext;
        const scrollTop = infiniteScrollObservers.get('sidebar')?.content?.scrollTop || 0;

        try {
            const params = new URLSearchParams({
                weapon_index: context.weaponIndex,
                skin_id: context.skinId,
                server_id: context.serverId,
                team: context.team,
                search: context.search || '',
                page: nextPage
            });
            if (context.type === 'stickers') params.append('slot_index', context.slotIndex);

            const endpoint = context.type === 'stickers' ? 'skins/stickers-sidebar' : 'skins/charms-sidebar';
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(u(`${endpoint}?${params.toString()}`));

            if (!response.ok) throw new Error(`HTTP ${response.status}`);

            const html = await response.text();
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;

            const gridSelector = context.type === 'stickers' ? '#stickers-grid' : '#charms-grid';
            const newGrid = tempDiv.querySelector(gridSelector);
            const currentGrid = document.querySelector(gridSelector);

            if (!newGrid || !currentGrid) {
                console.log('loadMoreSidebarItems: no grid found, cleaning up');
                cleanupInfiniteScroll();
                return;
            }

            const itemSelector = context.type === 'stickers' ? '.sticker-item:not(.sticker-item--remove)' : '.charm-item:not(.charm-item--remove)';
            const newItems = newGrid.querySelectorAll(itemSelector);

            console.log(`loadMoreSidebarItems: found ${newItems.length} new items`);

            if (newItems.length === 0) {
                console.log('loadMoreSidebarItems: no more items, cleaning up');
                cleanupInfiniteScroll();
                return;
            }

            const sentinel = currentGrid.querySelector('.sidebar-infinite-sentinel');
            newItems.forEach(item => {
                if (sentinel) currentGrid.insertBefore(item, sentinel);
                else currentGrid.appendChild(item);
            });

            if (infiniteScrollObservers.has('sidebar')) {
                infiniteScrollObservers.get('sidebar').content.scrollTop = scrollTop;
            }

            currentSidebarContext.page = nextPage;
            console.log(`loadMoreSidebarItems: updated page to ${nextPage}`);

            const hasMoreItems = tempDiv.querySelector('[data-has-more="true"]') ||
                tempDiv.querySelector('.sidebar-load-more') ||
                newItems.length >= 20; // Assume more if we got a full page

            if (!hasMoreItems) {
                console.log('loadMoreSidebarItems: no more data available, cleaning up');
                cleanupInfiniteScroll();
            }

        } catch (error) {
            console.error(`Failed to load more ${context.type} items:`, error);
            cleanupInfiniteScroll();
        } finally {
            if (currentSidebarContext) {
                currentSidebarContext.isLoading = false;
                console.log('loadMoreSidebarItems: finished loading');
            }
        }
    }

    function cleanupInfiniteScroll() {
        const observerData = infiniteScrollObservers.get('sidebar');
        if (observerData) {
            observerData.observer.disconnect();
            observerData.sentinel?.remove();
            infiniteScrollObservers.delete('sidebar');
        }
        stickerController?.abort();
        charmController?.abort();
        if (currentSidebarContext) currentSidebarContext.isLoading = false;
    }

    function closeSidebar() {
        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.closeModal('right-sidebar');
        }
        cleanupInfiniteScroll();
        currentSidebarContext = null;
    }

    function handleStickerSearch(value) {
        if (currentSidebarContext?.type === 'stickers') {
            currentSidebarContext.search = value;
            debouncedStickerSearch(currentSidebarContext, value);
        }
    }

    function handleCharmSearch(value) {
        if (currentSidebarContext?.type === 'charms') {
            currentSidebarContext.search = value;
            debouncedCharmSearch(currentSidebarContext, value);
        }
    }

    // Public API
    return {
        init,
        handleWeaponSettings,
        loadSkinSettings,
        loadSkinSettingsFromServer,
        handleUpdateWeaponSetting,
        updateWeaponSetting,
        handleFloatThumb,
        initializeFloatPickers,
        initializeFloatDragging,
        updateQualityDisplay,
        handleApplySkinSettings,
        refreshSkinSettings,
        handleStickerSlot,
        handleCharmSlot,
        handleRemoveSticker,
        handleRemoveCharm,
        getCurrentSkinSettings: () => currentSkinSettings,

        // Sidebar functions
        handleOpenStickerSidebar,
        handleOpenCharmSidebar,
        handleSelectSticker,
        handleSelectCharm,
        handleRemoveStickerSelection,
        handleRemoveCharmSelection,
        handleRemoveStickerTemp,
        handleRemoveCharmTemp,
        handleStickerSearch,
        handleCharmSearch
    };
})(); 