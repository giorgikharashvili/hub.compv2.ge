window.SkinchangerManager = (function() {
    'use strict';

    let currentTeam = 'ct';
    let serverId = '';
    let routes = {};
    let messages = {};
    let cache = new Map();

    /**
     * Initialize the main manager
     */
    function init() {
        const data = window.skinchangerData || {};
        currentTeam = data.currentTeam || 'ct';
        serverId = data.serverId || '';
        routes = data.routes || {};
        messages = data.messages || {};

        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.storeModalSkeletons();
        }

        if (window.SkinchangerFilterManager) {
            window.SkinchangerFilterManager.init();
        }

        if (window.SkinchangerWeaponSettingsManager) {
            window.SkinchangerWeaponSettingsManager.init();
        }

        initEventDelegation();
        initHTMXListeners();
        initializeComponents();

        console.log('SkinchangerManager initialized');
    }

    /**
     * Initialize event delegation
     */
    function initEventDelegation() {
        document.addEventListener('click', handleDocumentClick);
        document.addEventListener('input', handleDocumentInput, { capture: true });
        document.addEventListener('keypress', handleDocumentKeypress);
    }

    /**
     * Initialize HTMX listeners
     */
    function initHTMXListeners() {
        document.addEventListener('htmx:afterSwap', () => {
            initializeComponents();
        });

        document.addEventListener('htmx:afterSettle', () => {
            initializeComponents();
        });
    }

    /**
     * Handle document click events
     * @param {Event} e - Click event
     */
    function handleDocumentClick(e) {
        const target = e.target.closest('[data-handler]');
        if (!target) return;

        const handler = target.dataset.handler;

        // Define all handlers
        const handlers = {
            'team-button': () => handleTeamButton(target),
            'weapon-card': () => window.SkinchangerSkinManager?.handleWeaponCard(target, e),
            'clear-filters': () => window.SkinchangerFilterManager?.handleClearFilters(target),
            'rarity-badge': () => window.SkinchangerFilterManager?.handleRarityBadge(target),
            'weapon-search': () => handleWeaponSearch(target, e),
            'clear-weapon-search': () => window.SkinchangerFilterManager?.handleClearWeaponSearch(),
            'close-modal': () => handleCloseModal(target),
            'reset-all-skins': () => handleResetAllSkins(target, e),
            'copy-to-opposite-team': () => handleCopyToOppositeTeam(target, e),
            'remove-item': () => window.SkinchangerSpecialItemsManager?.handleRemoveItem(target, e),
            'remove-weapon-skin': () => handleRemoveWeaponSkin(target, e),
            
            // Skin and item handlers
            'skin-option': () => handleSkinSelection(target),
            'special-item-card': () => handleSpecialItemCard(target),
            'special-item-option': () => handleSpecialItemSelection(target),
            'agent-card': () => handleAgentCard(target),
            'weapon-type-option': () => window.SkinchangerSpecialItemsManager?.handleWeaponTypeSelection(target),
            'weapon-skin-option': () => window.SkinchangerSpecialItemsManager?.handleWeaponSkinSelection(target),
            'back-to-weapon-types': () => window.SkinchangerSpecialItemsManager?.handleBackToWeaponTypes(target),
            
            // Settings handlers
            'weapon-settings': () => handleWeaponSettings(target, e),
            'apply-skin-team': () => handleApplySkinTeam(target, e),
            'apply-skin-settings': () => window.SkinchangerWeaponSettingsManager?.handleApplySkinSettings(target, e),
            'update-weapon-setting': () => window.SkinchangerWeaponSettingsManager?.handleUpdateWeaponSetting(target, e),
            'float-thumb': () => window.SkinchangerWeaponSettingsManager?.handleFloatThumb(target, e),
            'sticker-slot': () => window.SkinchangerWeaponSettingsManager?.handleStickerSlot(target, e),
            'charm-slot': () => window.SkinchangerWeaponSettingsManager?.handleCharmSlot(target, e),
            'remove-sticker': () => window.SkinchangerWeaponSettingsManager?.handleRemoveSticker(target, e),
            'remove-charm': () => window.SkinchangerWeaponSettingsManager?.handleRemoveCharm(target, e),
            'open-sticker-sidebar': () => window.SkinchangerWeaponSettingsManager?.handleOpenStickerSidebar(target, e),
            'open-charm-sidebar': () => window.SkinchangerWeaponSettingsManager?.handleOpenCharmSidebar(target, e),
            'select-sticker': () => window.SkinchangerWeaponSettingsManager?.handleSelectSticker(target, e),
            'select-charm': () => window.SkinchangerWeaponSettingsManager?.handleSelectCharm(target, e),
            'remove-sticker-selection': () => window.SkinchangerWeaponSettingsManager?.handleRemoveStickerSelection(target, e),
            'remove-charm-selection': () => window.SkinchangerWeaponSettingsManager?.handleRemoveCharmSelection(target, e),
            'remove-sticker-temp': () => window.SkinchangerWeaponSettingsManager?.handleRemoveStickerTemp(target, e),
            'remove-charm-temp': () => window.SkinchangerWeaponSettingsManager?.handleRemoveCharmTemp(target, e),
            'load-more-stickers': () => window.SkinchangerWeaponSettingsManager?.handleLoadMoreStickers(target, e),
            'load-more-charms': () => window.SkinchangerWeaponSettingsManager?.handleLoadMoreCharms(target, e)
        };

        if (handlers[handler]) {
            e.preventDefault();
            e.stopPropagation();
            handlers[handler]();
        }
    }

    /**
     * Handle document input events
     * @param {Event} e - Input event
     */
    function handleDocumentInput(e) {
        const el = e.target;

        if (el.matches('[data-handler="sticker-search"], [name="sticker_search"]')) {
            e.stopPropagation();
            window.SkinchangerWeaponSettingsManager?.handleStickerSearch(el.value.trim());
            return;
        }

        if (el.matches('[data-handler="charm-search"], [name="charm_search"]')) {
            e.stopPropagation();
            window.SkinchangerWeaponSettingsManager?.handleCharmSearch(el.value.trim());
            return;
        }

        // Weapon search
        if (el.matches('.weapon-search-input, [name="weapon_search"]')) {
            window.SkinchangerFilterManager?.handleWeaponSearch(el.value.trim());
            return;
        }

        // Modal search and filters
        if (el.closest('.search-container') && 
            el.matches('input[name="search"], .input__field')) {
            if (el.closest('.charms-sidebar__main, .stickers-sidebar__main')) {
                return;
            }
            window.SkinchangerFilterManager?.handleModalFilter();
            return;
        }

        // Weapon settings updates
        if (el.matches('[data-handler="update-weapon-setting"]')) {
            handleUpdateWeaponSetting(el, e);
            return;
        }
    }

    /**
     * Handle document keypress events
     * @param {Event} e - Keypress event
     */
    function handleDocumentKeypress(e) {
        if (e.key === 'Enter' && e.target.matches('.search-input input, .search-input .input__field, input[name="search"], .input__field')) {
            e.preventDefault();
            
            // Cancel debounced filter and perform immediately
            window.SkinchangerFilterManager?.cancelDebouncedOperations();
            window.SkinchangerFilterManager?.performClientSideFilter();
            window.SkinchangerFilterManager?.updateClearButtonVisibility();
        }
    }

    /**
     * Handle team button click
     * @param {HTMLElement} button - Team button
     */
    function handleTeamButton(button) {
        document.querySelectorAll('.skins-team-button').forEach(btn => {
            btn.classList.remove('active');
        });

        button.classList.add('active');
        
        // Update data attributes for other buttons
        const resetButton = document.querySelector('[data-handler="reset-all-skins"]');
        const copyButton = document.querySelector('[data-handler="copy-to-opposite-team"]');
        
        if (resetButton) {
            resetButton.dataset.team = button.dataset.team;
            resetButton.dataset.serverId = serverId;
        }
        if (copyButton) {
            copyButton.dataset.team = button.dataset.team;
            copyButton.dataset.serverId = serverId;
        }

        currentTeam = button.dataset.team;
        cache.clear();

        reloadWeaponData();
    }

    /**
     * Reload weapon data for new team
     */
    function reloadWeaponData() {
        document.querySelectorAll('.weapon-card').forEach(card => {
            card.dataset.team = currentTeam;
            updateWeaponCardDisplay(card);
        });
    }

    /**
     * Update weapon card display
     * @param {HTMLElement} card - Weapon card element
     */
    function updateWeaponCardDisplay(card) {
        const skinNameElement = card.querySelector('.skin-name');
        const addSkinElement = card.querySelector('.add-skin-text');
        const hasSkin = card.classList.contains('has-skin');

        if (skinNameElement) {
            skinNameElement.style.display = hasSkin ? 'flex' : 'none';
        }
        if (addSkinElement) {
            addSkinElement.style.display = hasSkin ? 'none' : 'flex';
        }
    }

    /**
     * Handle weapon card click
     * @param {HTMLElement} card - Weapon card
     * @param {Event} event - Click event
     */
    function handleWeaponCard(card, event) {
        if (event.target.closest('.weapon-action-btn') || event.target.closest('.weapon-actions')) {
            return;
        }

        document.querySelectorAll('.weapon-card').forEach(c => c.classList.remove('modal-target'));
        card.classList.add('modal-target');

        const weaponId = card.dataset.weaponId;
        const weaponName = card.dataset.weaponName;

        openSkinModal(weaponId, weaponName);
    }

    /**
     * Open skin selection modal
     * @param {string} weaponId - Weapon ID
     * @param {string} weaponName - Weapon name
     */
    function openSkinModal(weaponId, weaponName) {
        const modal = document.getElementById('skin-modal');
        
        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.updateModalTitle('skin-modal', weaponName);
            window.SkinchangerModalManager.restoreModalSkeleton('skin-modal');
            window.SkinchangerModalManager.openModal('skin-modal');
        }

        loadSkins(weaponName, currentTeam, serverId);
    }

    /**
     * Load skins for weapon
     * @param {string} weaponName - Weapon name
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     * @param {number} page - Page number
     */
    async function loadSkins(weaponName, team, serverId, page = 1) {
        const modal = document.getElementById('skin-modal');
        const modalBody = modal.querySelector('.modal__content');

        const cacheKey = `skins-${weaponName}-${team}`;

        if (cache.has(cacheKey)) {
            modalBody.innerHTML = cache.get(cacheKey);
            setTimeout(() => {
                window.SkinchangerFilterManager?.resetFiltersAndSearch();
                initializeComponents();
            }, 50);
            return;
        }

        try {
            const params = new URLSearchParams({
                weapon: weaponName,
                team: team,
                server_id: serverId,
                page: page
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                u(`skins/items/skins?${params.toString()}`)
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }

            const html = await response.text();
            modalBody.innerHTML = html;

            cache.set(cacheKey, html);

            // Limit cache size
            if (cache.size > 20) {
                const firstKey = cache.keys().next().value;
                cache.delete(firstKey);
            }

            setTimeout(() => {
                window.SkinchangerFilterManager?.resetFiltersAndSearch();
                initializeComponents();
            }, 50);

        } catch (error) {
            console.error('Error loading skins:', error);
            const errorMsg = messages.loadingError ?
                messages.loadingError.replace('{item}', 'skins') :
                'Failed to load skins. Please try again.';
            modalBody.innerHTML = `<div class="error-message">${errorMsg}</div>`;
        }
    }

    /**
     * Handle skin selection
     * @param {HTMLElement} option - Skin option
     */
    function handleSkinSelection(option) {
        const weaponCard = document.querySelector('.weapon-card.modal-target');
        if (!weaponCard) {
            console.error('No target weapon card found');
            return;
        }

        const skinData = {
            weaponId: weaponCard.dataset.weaponId,
            weaponName: weaponCard.dataset.weaponName,
            skinId: option.dataset.skinId,
            skinName: option.dataset.skinName,
            skinPrice: option.dataset.skinPrice,
            skinRarity: option.dataset.skinRarity,
            paintIndex: option.dataset.paintIndex
        };

        selectSkin(skinData);
    }

    /**
     * Select and save skin
     * @param {Object} skinData - Skin data
     */
    async function selectSkin(skinData) {
        const { weaponId, weaponName, skinName, skinPrice, skinRarity, skinId, paintIndex } = skinData;

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: currentTeam === 'ct' ? 0 : 1,
            weapon_index: weaponId,
            skin_id: skinId || 0
        });

        if (paintIndex) {
            formData.append('paint_index', paintIndex);
        }

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                `${routes.saveSkin || '/skins/save-skin'}?team=${currentTeam}&server_id=${serverId}`,
                {
                    method: 'POST',
                    body: formData
                }
            );

            const data = await response.json();

            if (data.success) {
                if (window.SkinchangerModalManager) {
                    window.SkinchangerModalManager.closeActiveModals();
                }

                // Refresh content
                htmx.ajax('GET',
                    `/skins?team=${currentTeam}&server_id=${serverId}`,
                    { target: '.skins-content', swap: 'outerHTML' }
                );

                const priceText = skinPrice > 0 ? ` ($${skinPrice})` : '';
                const message = messages.skinEquipped ?
                    messages.skinEquipped.replace('{skin}', `${skinName}${priceText}`) :
                    `${skinName}${priceText}`;
                
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                const errorMsg = messages.failedToSave ?
                    messages.failedToSave.replace('{item}', 'skin') :
                    'Failed to save skin';
                window.SkinchangerUtils.showNotification(data.error || errorMsg, 'error');
            }
        } catch (error) {
            console.error('Error saving skin:', error);
            const errorMsg = messages.failedToSave ?
                messages.failedToSave.replace('{item}', 'skin') :
                'Failed to save skin';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Handle special item card click
     * @param {HTMLElement} card - Special item card
     */
    function handleSpecialItemCard(card) {
        const itemType = card.dataset.itemType;
        
        if (itemType === 'knives' || itemType === 'gloves') {
            // Handle weapon types modal
            if (window.SkinchangerModalManager) {
                const itemNames = {
                    'knives': 'Knife Type',
                    'gloves': 'Glove Type'
                };
                
                window.SkinchangerModalManager.updateModalTitle('weapon-modal', itemNames[itemType]);
                window.SkinchangerModalManager.restoreModalSkeleton('weapon-modal');
                window.SkinchangerModalManager.openModal('weapon-modal');
            }
            
            loadWeaponTypes(itemType, currentTeam, serverId);
            return;
        }

        // Handle special items modal
        if (window.SkinchangerModalManager) {
            const itemNames = {
                'coins': 'Coin',
                'music': 'Music Kit',
                'agents': 'Agent'
            };
            
            window.SkinchangerModalManager.updateModalTitle('special-items-modal', itemNames[itemType] || itemType);
            window.SkinchangerModalManager.restoreModalSkeleton('special-items-modal');
            window.SkinchangerModalManager.openModal('special-items-modal');
        }
        
        loadSpecialItems(itemType, currentTeam, serverId);
    }

    /**
     * Load weapon types (knives/gloves)
     * @param {string} category - Category (knives/gloves)
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function loadWeaponTypes(category, team, serverId) {
        const modal = document.getElementById('weapon-modal');
        const modalBody = modal.querySelector('.modal__content');

        const cacheKey = `weapon-types-${category}-${team}`;

        if (cache.has(cacheKey)) {
            modalBody.innerHTML = cache.get(cacheKey);
            initializeComponents();
            return;
        }

        try {
            const params = new URLSearchParams({
                team: team,
                server_id: serverId
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                `/skins/weapon-types/${category}?${params.toString()}`
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }

            const html = await response.text();
            modalBody.innerHTML = html;

            cache.set(cacheKey, html);

            if (cache.size > 20) {
                const firstKey = cache.keys().next().value;
                cache.delete(firstKey);
            }

            initializeComponents();

        } catch (error) {
            console.error('Error loading weapon types:', error);
            const errorMsg = messages.loadingError ?
                messages.loadingError.replace('{item}', 'weapon types') :
                'Failed to load weapon types. Please try again.';
            modalBody.innerHTML = `<div class="error-message">${errorMsg}</div>`;
        }
    }

    /**
     * Load special items
     * @param {string} itemType - Item type
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function loadSpecialItems(itemType, team, serverId) {
        const modal = document.getElementById('special-items-modal');
        const modalBody = modal.querySelector('.modal__content');

        const cacheKey = `special-items-${itemType}-${team}`;

        if (cache.has(cacheKey)) {
            modalBody.innerHTML = cache.get(cacheKey);
            setTimeout(() => {
                window.SkinchangerFilterManager?.resetFiltersAndSearch();
                initializeComponents();
            }, 50);
            return;
        }

        try {
            const params = new URLSearchParams({
                team: team,
                server_id: serverId,
                page: 1,
                search: ''
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                `/skins/items/${itemType}?${params.toString()}`
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }

            const html = await response.text();
            modalBody.innerHTML = html;

            cache.set(cacheKey, html);

            if (cache.size > 20) {
                const firstKey = cache.keys().next().value;
                cache.delete(firstKey);
            }

            setTimeout(() => {
                window.SkinchangerFilterManager?.resetFiltersAndSearch();
                initializeComponents();
            }, 50);

        } catch (error) {
            console.error('Error loading items:', error);
            const errorMsg = messages.loadingError ?
                messages.loadingError.replace('{item}', 'items') :
                'Failed to load items. Please try again.';
            modalBody.innerHTML = `<div class="error-message">${errorMsg}</div>`;
        }
    }

    function handleSpecialItemSelection(option) { 
        if (window.SkinchangerSpecialItemsManager) {
            window.SkinchangerSpecialItemsManager.handleSpecialItemSelection(option);
        }
    }
    
    function handleAgentCard(card) { 
        if (window.SkinchangerSpecialItemsManager) {
            window.SkinchangerSpecialItemsManager.handleAgentCard(card);
        }
    }
    
    function handleWeaponTypeSelection(option) { 
        if (window.SkinchangerSpecialItemsManager) {
            window.SkinchangerSpecialItemsManager.handleWeaponTypeSelection(option);
        }
    }
    
    function handleWeaponSkinSelection(option) { 
        if (window.SkinchangerSpecialItemsManager) {
            window.SkinchangerSpecialItemsManager.handleWeaponSkinSelection(option);
        }
    }
    
    function handleBackToWeaponTypes(target) { 
        if (window.SkinchangerSpecialItemsManager) {
            window.SkinchangerSpecialItemsManager.handleBackToWeaponTypes(target);
        }
    }
    
    function handleWeaponSettings(target, e) { 
        if (window.SkinchangerWeaponSettingsManager) {
            window.SkinchangerWeaponSettingsManager.handleWeaponSettings(target, e);
        }
    }
    
    function handleApplySkinTeam(target, e) { 
        handleApplySkinToTeam(target, e);
    }
    
    function handleApplySkinSettings(target, e) { 
        if (window.SkinchangerWeaponSettingsManager) {
            window.SkinchangerWeaponSettingsManager.handleApplySkinSettings(target, e);
        }
    }
    
    function handleUpdateWeaponSetting(target, e) { 
        if (window.SkinchangerWeaponSettingsManager) {
            window.SkinchangerWeaponSettingsManager.handleUpdateWeaponSetting(target, e);
        }
    }
    
    function handleWeaponSearch(target, e) { 
        const searchInput = document.querySelector('.weapon-search-input, [name="weapon_search"]');
        if (searchInput && window.SkinchangerFilterManager) {
            window.SkinchangerFilterManager.handleWeaponSearch(searchInput.value.trim());
        }
    }
    
    function handleCloseModal(target) { 
        const modalId = target.dataset.modal;
        if (modalId && window.SkinchangerModalManager) {
            window.SkinchangerModalManager.closeModal(modalId);
        } else if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.closeActiveModals();
        }
    }
    
    async function handleResetAllSkins(target, e) { 
        e.preventDefault();
        e.stopPropagation();

        const team = target.dataset.team;
        const serverId = target.dataset.serverId;

        const confirmMessage = messages.confirmResetAllSkins ||
            'Are you sure you want to reset ALL skins for this team? This action cannot be undone.';

        const confirmed = await window.SkinchangerUtils.confirmAction(confirmMessage, 'error');
        if (!confirmed) return;

        executeResetAllSkins(team, serverId);
    }
    
    async function handleCopyToOppositeTeam(target, e) { 
        e.preventDefault();
        e.stopPropagation();

        const team = target.dataset.team;
        const serverId = target.dataset.serverId;
        const oppositeTeam = team === 'ct' ? 't' : 'ct';

        const confirmMessage = messages.confirmCopyToOpposite ?
            messages.confirmCopyToOpposite
                .replaceAll('{team}', oppositeTeam.toUpperCase())
                .replaceAll('{source}', team.toUpperCase()) :
            `Are you sure you want to copy all skins from ${team.toUpperCase()} to ${oppositeTeam.toUpperCase()}? This will overwrite existing skins on the ${oppositeTeam.toUpperCase()} team.`;

        const confirmed = await window.SkinchangerUtils.confirmAction(confirmMessage, 'warning');
        if (!confirmed) return;

        executeCopyToOppositeTeam(team, serverId);
    }
    
    function handleRemoveWeaponSkin(target, e) { 
        if (window.SkinchangerSkinManager) {
            window.SkinchangerSkinManager.handleRemoveWeaponSkin(target, e);
        }
    }

    /**
     * Execute reset all skins
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function executeResetAllSkins(team, serverId) {
        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: team
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.resetAllSkins || '/skins/reset-all-skins',
                {
                    method: 'POST',
                    body: formData
                }
            );

            if (response.ok) {
                const html = await response.text();
                document.querySelector('.skins-content').outerHTML = html;

                if (typeof htmx !== 'undefined') {
                    htmx.process(document.querySelector('.skins-content'));
                }

                const message = messages.allSkinsReset || 'All skins reset successfully';
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                throw new Error(`HTTP ${response.status}`);
            }
        } catch (error) {
            console.error('Error resetting skins:', error);
            const errorMsg = messages.failedToReset || 'Failed to reset skins';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Execute copy to opposite team
     * @param {string} team - Source team
     * @param {string} serverId - Server ID
     */
    async function executeCopyToOppositeTeam(team, serverId) {
        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            source_team: team,
            target_team: team === 'ct' ? 't' : 'ct'
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.copyToOppositeTeam || '/skins/copy-to-opposite-team',
                {
                    method: 'POST',
                    body: formData
                }
            );

            if (response.ok) {
                const html = await response.text();
                document.querySelector('.skins-content').outerHTML = html;

                if (typeof htmx !== 'undefined') {
                    htmx.process(document.querySelector('.skins-content'));
                }

                const oppositeTeam = team === 'ct' ? 'T' : 'CT';
                const message = messages.skinsCopied ?
                    messages.skinsCopied.replace('{team}', oppositeTeam) :
                    `Skins copied to ${oppositeTeam} team successfully`;
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                throw new Error(`HTTP ${response.status}`);
            }
        } catch (error) {
            console.error('Error copying skins:', error);
            const errorMsg = messages.failedToCopy || 'Failed to copy skins';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Handle apply skin to team
     * @param {HTMLElement} target - Apply button
     * @param {Event} e - Click event
     */
    function handleApplySkinToTeam(target, e) {
        e.preventDefault();
        e.stopPropagation();

        const targetTeam = target.dataset.targetTeam;
        const weaponIndex = target.dataset.weaponIndex;
        const weaponId = target.dataset.weaponId;
        const skinId = target.dataset.skinId;
        const itemId = target.dataset.itemId;
        const itemType = target.dataset.itemType;
        const paintIndex = target.dataset.paintIndex;

        console.log('Applying to team:', { weaponIndex, weaponId, skinId, itemId, itemType, paintIndex, targetTeam });

        const isKnifeOrGlove = itemType === 'knife' || itemType === 'glove' || itemType === 'knives' || itemType === 'gloves' ||
            (weaponId && (weaponId.includes('knife') || weaponId.includes('bayonet') || weaponId.includes('karambit') ||
                weaponId.includes('gloves') || weaponId.includes('handwraps')));

        if (isKnifeOrGlove && window.SkinchangerSpecialItemsManager) {
            const finalItemId = weaponId || itemId;
            const finalItemType = itemType || (weaponId && (weaponId.includes('knife') || weaponId.includes('bayonet') || weaponId.includes('karambit')) ? 'knife' : 'glove');
            handleSpecialItemTeamApplication(finalItemId, finalItemType, targetTeam, paintIndex);
        } else if ((itemId || weaponId) && itemType && window.SkinchangerSpecialItemsManager) {
            const finalItemId = (itemType === 'knife' || itemType === 'glove') ? weaponId : itemId;
            handleSpecialItemTeamApplication(finalItemId, itemType, targetTeam, paintIndex);
        } else if (weaponIndex && (skinId || paintIndex) && window.SkinchangerSkinManager) {
            handleWeaponSkinTeamApplication(weaponIndex, skinId || paintIndex, targetTeam);
        } else {
            console.error('Missing required parameters for team application');
            window.SkinchangerUtils.showNotification('Missing required parameters for team application', 'error');
        }

        if (typeof app !== 'undefined' && app.dropdowns) {
            app.dropdowns.closeAllDropdowns();
        }
    }

    /**
     * Handle weapon skin team application
     * @param {string} weaponIndex - Weapon index
     * @param {string} skinId - Skin ID
     * @param {string} targetTeam - Target team
     */
    function handleWeaponSkinTeamApplication(weaponIndex, skinId, targetTeam) {
        if (!window.SkinchangerSkinManager) return;

        if (targetTeam === 'both') {
            Promise.all([
                window.SkinchangerSkinManager.applySkinToTeam(weaponIndex, skinId, 0),
                window.SkinchangerSkinManager.applySkinToTeam(weaponIndex, skinId, 1)
            ]).then(results => {
                const successCount = results.filter(r => r.success).length;
                if (successCount === 2) {
                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }
                    const message = messages.appliedToBothTeams || 'Applied skin to both teams';
                    window.SkinchangerUtils.showNotification(message, 'success');
                    refreshContent();
                } else if (successCount === 1) {
                    const message = messages.appliedToOneTeam || 'Applied skin to one team only';
                    window.SkinchangerUtils.showNotification(message, 'warning');
                } else {
                    const message = messages.failedToApply || 'Failed to apply skin';
                    window.SkinchangerUtils.showNotification(message, 'error');
                }
            });
        } else {
            const team = targetTeam === 'ct' ? 0 : 1;
            window.SkinchangerSkinManager.applySkinToTeam(weaponIndex, skinId, team).then(result => {
                if (result.success) {
                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }
                    const teamName = targetTeam === 'ct' ? (messages.teamCT || 'CT') : (messages.teamT || 'T');
                    const message = messages.appliedToTeam ?
                        messages.appliedToTeam.replace('{team}', teamName) :
                        `Applied skin to ${teamName} team`;
                    window.SkinchangerUtils.showNotification(message, 'success');
                    refreshContent();
                }
            });
        }
    }

    /**
     * Handle special item team application
     * @param {string} itemId - Item ID
     * @param {string} itemType - Item type
     * @param {string} targetTeam - Target team
     * @param {string} paintIndex - Paint index
     */
    function handleSpecialItemTeamApplication(itemId, itemType, targetTeam, paintIndex) {
        if (!window.SkinchangerSpecialItemsManager) return;

        if (targetTeam === 'both') {
            Promise.all([
                window.SkinchangerSpecialItemsManager.applySpecialItemToTeam(itemId, itemType, 0, paintIndex),
                window.SkinchangerSpecialItemsManager.applySpecialItemToTeam(itemId, itemType, 1, paintIndex)
            ]).then(results => {
                const successCount = results.filter(r => r.success).length;
                if (successCount === 2) {
                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }
                    const message = messages.appliedToBothTeams || 'Applied item to both teams';
                    window.SkinchangerUtils.showNotification(message, 'success');
                    refreshContent();
                } else if (successCount === 1) {
                    const message = messages.appliedToOneTeam || 'Applied item to one team only';
                    window.SkinchangerUtils.showNotification(message, 'warning');
                } else {
                    const message = messages.failedToApply || 'Failed to apply item';
                    window.SkinchangerUtils.showNotification(message, 'error');
                }
            });
        } else {
            const team = targetTeam === 'ct' ? 0 : 1;
            window.SkinchangerSpecialItemsManager.applySpecialItemToTeam(itemId, itemType, team, paintIndex).then(result => {
                if (result.success) {
                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }
                    const teamName = targetTeam === 'ct' ? (messages.teamCT || 'CT') : (messages.teamT || 'T');
                    const message = messages.appliedToTeam ?
                        messages.appliedToTeam.replace('{team}', teamName) :
                        `Applied item to ${teamName} team`;
                    window.SkinchangerUtils.showNotification(message, 'success');
                    refreshContent();
                }
            });
        }
    }

    /**
     * Refresh content
     */
    function refreshContent() {
        const url = routes.index ?
            `${routes.index}?team=${currentTeam}&server_id=${serverId}` :
            `/skins?team=${currentTeam}&server_id=${serverId}`;

        htmx.ajax('GET', url, { target: '.skins-content', swap: 'outerHTML' });
    }

    /**
     * Initialize components after content update
     */
    function initializeComponents() {
        document.querySelectorAll('.weapon-card').forEach(card => {
            window.SkinchangerSkinManager?.updateWeaponCardDisplay(card);
        });

        const viewMoreButton = document.querySelector('.view-more-button');
        if (viewMoreButton) {
            viewMoreButton.style.display = 'none';
        }

        if (window.SkinchangerFilterManager) {
            window.SkinchangerFilterManager.updateClearButtonVisibility();
            window.SkinchangerFilterManager.performClientSideFilter();
        }
        
        if (window.SkinchangerWeaponSettingsManager) {
            window.SkinchangerWeaponSettingsManager.initializeFloatPickers();
        }
    }

    // Public API
    return {
        init,
        getCurrentTeam: () => currentTeam,
        getServerId: () => serverId,
        getRoutes: () => routes,
        getMessages: () => messages,
        loadSkins,
        loadSpecialItems,
        loadWeaponTypes,
        initializeComponents,
        refreshContent
    };
})();

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    if (window.SkinchangerManager) {
        window.SkinchangerManager.init();
    }
});

// Handle HTMX updates
document.addEventListener('htmx:afterSwap', function () {
    if (window.SkinchangerManager) {
        window.SkinchangerManager.initializeComponents();
    }
});

console.log('SkinchangerManager loaded'); 

if(window.SkinchangerManager) {
    window.SkinchangerManager.init();
}