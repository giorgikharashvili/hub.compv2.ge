// Skinchanger Special Items Manager - Handles knives, gloves, coins, music, agents
window.SkinchangerSpecialItemsManager = (function () {
    'use strict';

    let currentWeaponCategory = null;
    let currentWeaponData = null; // Store current weapon data for navigation

    /**
     * Handle special item card click
     * @param {HTMLElement} card - Special item card
     */
    function handleSpecialItemCard(card) {
        const itemType = card.dataset.itemType;
        const team = card.dataset.team;
        const serverId = card.dataset.serverId;

        if (itemType === 'knives' || itemType === 'gloves') {
            currentWeaponCategory = itemType;
            currentWeaponData = { itemType, team, serverId }; // Store for navigation

            // console.debug('Entering special item category:', { itemType, team, serverId });

            if (window.SkinchangerModalManager) {
                const itemNames = {
                    'knives': 'Knife Type',
                    'gloves': 'Glove Type'
                };

                window.SkinchangerModalManager.updateModalTitle('weapon-modal', itemNames[itemType]);
                window.SkinchangerModalManager.restoreModalSkeleton('weapon-modal');
                window.SkinchangerModalManager.openModal('weapon-modal');
            }

            loadWeaponTypes(itemType, team, serverId);
            return;
        }

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

        loadSpecialItems(itemType, team, serverId);
    }

    /**
     * Handle agent card click
     * @param {HTMLElement} card - Agent card
     */
    function handleAgentCard(card) {
        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.restoreModalSkeleton('special-items-modal');
            window.SkinchangerModalManager.openModal('special-items-modal');
        }

        if (window.SkinchangerManager) {
            const currentTeam = window.SkinchangerManager.getCurrentTeam();
            loadSpecialItems('agents', currentTeam, card.dataset.serverId);
        }
    }

    /**
     * Load weapon types (knives/gloves)
     * @param {string} category - Category (knives/gloves)
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function loadWeaponTypes(category, team, serverId) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        // Ensure category is set when loading weapon types
        currentWeaponCategory = category;
        currentWeaponData = { itemType: category, team, serverId };

        await window.SkinchangerManager.loadWeaponTypes(category, team, serverId);
    }

    /**
     * Load special items
     * @param {string} itemType - Item type
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function loadSpecialItems(itemType, team, serverId) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        await window.SkinchangerManager.loadSpecialItems(itemType, team, serverId);
    }

    /**
     * Handle special item selection
     * @param {HTMLElement} option - Special item option
     */
    function handleSpecialItemSelection(option) {
        const itemName = option.dataset.itemName;
        const itemPrice = option.dataset.itemPrice;
        const itemType = option.dataset.itemType;
        const itemId = option.dataset.itemId;
        const weaponId = option.dataset.weaponId;
        const paintIndex = option.dataset.paintIndex;

        selectSpecialItem(itemType, itemName, itemPrice, itemId, weaponId, paintIndex);
    }

    /**
     * Select and save special item
     * @param {string} itemType - Item type
     * @param {string} itemName - Item name
     * @param {string} itemPrice - Item price
     * @param {string} itemId - Item ID
     * @param {string} weaponId - Weapon ID
     * @param {string} paintIndex - Paint index
     */
    async function selectSpecialItem(itemType, itemName, itemPrice, itemId, weaponId, paintIndex) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const itemTypeMapping = {
            'knives': 'knife',
            'coins': 'coin',
            'music': 'music',
            'gloves': 'glove',
            'agents': 'agent'
        };

        const apiItemType = itemTypeMapping[itemType] || itemType;
        const currentTeam = window.SkinchangerManager.getCurrentTeam();
        const serverId = window.SkinchangerManager.getServerId();
        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: currentTeam === 'ct' ? 0 : 1,
            item_type: apiItemType
        });

        if (apiItemType === 'knife' || apiItemType === 'glove') {
            formData.append('item_id', weaponId || itemId || '0');
            if (paintIndex && paintIndex !== '0') {
                formData.append('paint_index', paintIndex);
            }
            const floatVal = option?.dataset?.float;
            const patternVal = option?.dataset?.pattern;
            if (typeof floatVal !== 'undefined') {
                formData.append('float', floatVal);
            }
            if (typeof patternVal !== 'undefined') {
                formData.append('pattern', patternVal);
            }
        } else {
            formData.append('item_id', itemId || '0');
        }

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                `${routes.saveItem || '/skins/save-item'}?team=${currentTeam}&server_id=${serverId}`,
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

                if (window.SkinchangerManager) {
                    window.SkinchangerManager.refreshContent();
                }

                const priceText = itemPrice > 0 ? ` ($${itemPrice})` : '';
                const message = messages.itemEquipped ?
                    messages.itemEquipped.replace('{item}', `${itemName}${priceText}`) :
                    `Equipped ${itemName}${priceText}`;
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                const errorMsg = messages.failedToSave ?
                    messages.failedToSave.replace('{item}', 'item') :
                    'Failed to save item';
                window.SkinchangerUtils.showNotification(data.error || errorMsg, 'error');
            }
        } catch (error) {
            console.error('Error saving item:', error);
            const errorMsg = messages.failedToSave ?
                messages.failedToSave.replace('{item}', 'item') :
                'Failed to save item';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Handle weapon type selection (knives/gloves)
     * @param {HTMLElement} option - Weapon type option
     */
    function handleWeaponTypeSelection(option) {
        const weaponId = option.dataset.weaponId;
        const weaponName = option.dataset.weaponName;
        const category = option.dataset.category;
        const team = option.dataset.team;
        const serverId = option.dataset.serverId;

        // console.debug('Weapon type selected:', { weaponId, weaponName, category });

        if (category) {
            currentWeaponCategory = category;
        }

        const isDefaultWeapon = weaponId === 'weapon_knife' ||
            (category === 'gloves' && (weaponId === 'ct_gloves' || weaponId === 't_gloves'));

        if (isDefaultWeapon) {
            removeDefaultWeapon(weaponId, category, team, serverId);
            return;
        }

        // Load skins for the selected weapon type
        loadWeaponSkins(weaponId, weaponName, team, serverId);
    }

    /**
     * Remove default weapon (set to default state)
     * @param {string} weaponId - Weapon ID
     * @param {string} category - Category (knives/gloves)
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function removeDefaultWeapon(weaponId, category, team, serverId) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const itemTypeMapping = {
            'knives': 'knife',
            'gloves': 'glove'
        };

        const apiItemType = itemTypeMapping[category];
        const currentTeam = window.SkinchangerManager.getCurrentTeam();
        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

        // console.debug('Setting default weapon:', { weaponId, category, apiItemType, currentTeam });

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: currentTeam === 'ct' ? 0 : 1,
            item_type: apiItemType,
            item_id: '0'  // Use "0" to reset to default
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.saveItem || '/skins/save-item',
                {
                    method: 'POST',
                    body: formData
                }
            );

            if (response.ok) {
                let result;
                const contentType = response.headers.get('content-type');
                
                if (contentType && contentType.includes('application/json')) {
                    result = await response.json();
                    
                    if (result.success) {
                        if (window.SkinchangerModalManager) {
                            window.SkinchangerModalManager.closeActiveModals();
                        }

                        if (window.SkinchangerManager) {
                            window.SkinchangerManager.refreshContent();
                        }

                        const weaponDisplayName = weaponId === 'weapon_knife' ? 'Default Knife' : 'Default Gloves';
                        const message = messages.itemEquipped ?
                            messages.itemEquipped.replace('{item}', weaponDisplayName) :
                            `Equipped ${weaponDisplayName}`;
                        window.SkinchangerUtils.showNotification(message, 'success');
                    } else {
                        throw new Error(result.error || 'Unknown error');
                    }
                } else {
                    const html = await response.text();
                    document.querySelector('.skins-content').outerHTML = html;

                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }

                    const weaponDisplayName = weaponId === 'weapon_knife' ? 'Default Knife' : 'Default Gloves';
                    const message = messages.itemEquipped ?
                        messages.itemEquipped.replace('{item}', weaponDisplayName) :
                        `Equipped ${weaponDisplayName}`;
                    window.SkinchangerUtils.showNotification(message, 'success');
                }
            } else {
                throw new Error(`HTTP ${response.status}`);
            }
        } catch (error) {
            console.error('Error setting default weapon:', error);
            const errorMsg = messages.failedToSave ?
                messages.failedToSave.replace('{item}', 'item') :
                'Failed to set default weapon';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Load weapon skins for specific weapon
     * @param {string} weaponId - Weapon ID
     * @param {string} weaponName - Weapon name
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function loadWeaponSkins(weaponId, weaponName, team, serverId) {
        const modal = document.getElementById('weapon-modal');
        const modalBody = modal.querySelector('.modal__content');

        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.updateModalTitle('weapon-modal', weaponName);
        }

        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

        try {
            const params = new URLSearchParams({
                team: team,
                server_id: serverId
            });

            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                `/skins/weapon-skins/${weaponId}?${params.toString()}`
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }

            const html = await response.text();
            modalBody.innerHTML = html;

            setTimeout(() => {
                window.SkinchangerFilterManager?.resetFiltersAndSearch();
                window.SkinchangerManager?.initializeComponents();
            }, 50);

        } catch (error) {
            console.error('Error loading weapon skins:', error);
            const errorMsg = messages.loadingError ?
                messages.loadingError.replace('{item}', 'skins') :
                'Failed to load skins. Please try again.';
            modalBody.innerHTML = `<div class="error-message">${errorMsg}</div>`;
        }
    }

    /**
     * Handle weapon skin selection
     * @param {HTMLElement} option - Weapon skin option
     */
    function handleWeaponSkinSelection(option) {
        const weaponId = option.dataset.weaponId;
        const skinId = option.dataset.skinId;
        const skinName = option.dataset.skinName;
        const paintIndex = option.dataset.paintIndex;

        // console.debug('Weapon skin selected:', { weaponId, skinId, skinName, paintIndex });

        selectWeaponSkin(weaponId, skinId, skinName, paintIndex);
    }

    /**
     * Select weapon skin
     * @param {string} weaponId - Weapon ID
     * @param {string} skinId - Skin ID
     * @param {string} skinName - Skin name
     * @param {string} paintIndex - Paint index
     */
    async function selectWeaponSkin(weaponId, skinId, skinName, paintIndex) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        if (!currentWeaponCategory && currentWeaponData) {
            currentWeaponCategory = currentWeaponData.itemType;
        }

        if (!currentWeaponCategory) {
            if (weaponId && (weaponId.includes('knife') || weaponId.includes('bayonet') || weaponId.includes('karambit'))) {
                currentWeaponCategory = 'knives';
            } else if (weaponId && (weaponId.includes('glove') || weaponId.includes('handwrap'))) {
                currentWeaponCategory = 'gloves';
            }
        }

        const itemTypeMapping = {
            'knives': 'knife',
            'gloves': 'glove'
        };

        const apiItemType = itemTypeMapping[currentWeaponCategory];

        if (!apiItemType) {
            console.error('Unknown weapon category:', currentWeaponCategory);
            console.error('Available weapon data:', currentWeaponData);
            console.error('Weapon ID:', weaponId);
            
            if (weaponId && (weaponId.includes('knife') || weaponId.includes('bayonet') || weaponId.includes('karambit'))) {
                currentWeaponCategory = 'knives';
            } else if (weaponId && (weaponId.includes('glove') || weaponId.includes('handwrap'))) {
                currentWeaponCategory = 'gloves';
            } else {
                window.SkinchangerUtils.showNotification('Unable to determine weapon category. Please try again.', 'error');
                return;
            }
        }

        const currentTeam = window.SkinchangerManager.getCurrentTeam();
        const serverId = window.SkinchangerManager.getServerId();
        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: currentTeam === 'ct' ? 0 : 1,
            item_type: itemTypeMapping[currentWeaponCategory],
            item_id: weaponId,
            paint_index: paintIndex || skinId || '0'
        });

        const floatInput = document.querySelector('input[name="float"]');
        const patternInput = document.querySelector('input[name="pattern"]');
        if (floatInput) formData.append('float', floatInput.value);
        if (patternInput) formData.append('pattern', patternInput.value);

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.saveItem || '/skins/save-item',
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

                if (window.SkinchangerManager) {
                    window.SkinchangerManager.refreshContent();
                }

                const message = messages.itemEquipped ?
                    messages.itemEquipped.replace('{item}', skinName) :
                    `Equipped ${skinName}`;
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                const errorMsg = messages.failedToSave ?
                    messages.failedToSave.replace('{item}', 'item') :
                    'Failed to save item';
                window.SkinchangerUtils.showNotification(data.error || errorMsg, 'error');
            }
        } catch (error) {
            console.error('Error saving weapon skin:', error);
            const errorMsg = messages.failedToSave ?
                messages.failedToSave.replace('{item}', 'item') :
                'Failed to save item';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Handle back to weapon types button
     * @param {HTMLElement} button - Back button
     */
    function handleBackToWeaponTypes(button) {
        // console.debug('Back to weapon types clicked, category:', currentWeaponCategory);
        
        if (!currentWeaponCategory && currentWeaponData) {
            currentWeaponCategory = currentWeaponData.itemType;
        }

        if (!currentWeaponCategory) {
            const modal = document.getElementById('weapon-modal');
            const modalTitle = modal?.querySelector('.modal__title')?.textContent;
            
            if (modalTitle) {
                if (modalTitle.includes('Knife') || modalTitle.includes('ож') || window.location.href.includes('knives')) {
                    currentWeaponCategory = 'knives';
                } else if (modalTitle.includes('Glove') || modalTitle.includes('ерчат') || window.location.href.includes('gloves')) {
                    currentWeaponCategory = 'gloves';
                }
            }
        }

        if (!window.SkinchangerModalManager || !currentWeaponCategory) {
            console.error('Cannot navigate back - missing modal manager or weapon category');
            
            if (window.SkinchangerModalManager) {
                window.SkinchangerModalManager.closeModal('weapon-modal');
            }
            return;
        }

        const itemNames = {
            'knives': 'Knife Type',
            'gloves': 'Glove Type'
        };

        window.SkinchangerModalManager.updateModalTitle('weapon-modal', itemNames[currentWeaponCategory]);

        if (window.SkinchangerManager) {
            const currentTeam = window.SkinchangerManager.getCurrentTeam();
            const serverId = window.SkinchangerManager.getServerId();
            
            if (!currentWeaponData) {
                currentWeaponData = { 
                    itemType: currentWeaponCategory, 
                    team: currentTeam, 
                    serverId: serverId 
                };
            }
            
            loadWeaponTypes(currentWeaponCategory, currentTeam, serverId);
        } else {
            console.error('Cannot load weapon types - missing manager');
        }
    }

    /**
     * Handle item removal
     * @param {HTMLElement} button - Remove button
     * @param {Event} event - Click event
     */
    async function handleRemoveItem(button, event) {
        event.preventDefault();
        event.stopPropagation();

        const itemType = button.dataset.itemType;
        const team = button.dataset.team;
        const serverId = button.dataset.serverId;

        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const messages = window.SkinchangerManager.getMessages();
        const confirmMessage = messages.confirmRemoveItem ?
            messages.confirmRemoveItem.replace('{item}', itemType) :
            `Are you sure you want to remove this ${itemType}?`;

        const confirmed = await window.SkinchangerUtils.confirmAction(confirmMessage, 'error');
        if (!confirmed) return;

        executeRemoveItem(itemType, team, serverId);
    }

    /**
     * Execute item removal
     * @param {string} itemType - Item type
     * @param {string} team - Team
     * @param {string} serverId - Server ID
     */
    async function executeRemoveItem(itemType, team, serverId) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const currentTeam = window.SkinchangerManager.getCurrentTeam();
        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            item_type: itemType,
            team: currentTeam
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.removeItem || '/skins/remove-item',
                {
                    method: 'POST',
                    body: formData
                }
            );

            if (response.ok) {
                const html = await response.text();
                document.querySelector('.skins-content').outerHTML = html;

                const message = messages.itemRemoved ?
                    messages.itemRemoved.replace('{item}', itemType) :
                    `${itemType} removed successfully`;
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                throw new Error(`HTTP ${response.status}`);
            }
        } catch (error) {
            console.error('Error removing item:', error);
            const errorMsg = messages.failedToRemove ?
                messages.failedToRemove.replace('{item}', itemType) :
                'Failed to remove item';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Apply special item to team
     * @param {string} itemId - Item ID
     * @param {string} itemType - Item type
     * @param {number} team - Team (0 for CT, 1 for T)
     * @param {string} paintIndex - Paint index
     * @returns {Object} Result object
     */
    async function applySpecialItemToTeam(itemId, itemType, team, paintIndex) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return { success: false, error: 'Manager not available' };
        }

        const itemTypeMapping = {
            'knives': 'knife',
            'coins': 'coin',
            'music': 'music',
            'gloves': 'glove',
            'agents': 'agent'
        };

        const apiItemType = itemTypeMapping[itemType] || itemType;
        const serverId = window.SkinchangerManager.getServerId();
        const routes = window.SkinchangerManager.getRoutes();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: team,
            item_type: apiItemType,
            item_id: itemId || '0'
        });

        if ((apiItemType === 'knife' || apiItemType === 'glove') && paintIndex) {
            formData.append('paint_index', paintIndex);
        }

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.saveItem || '/skins/save-item',
                {
                    method: 'POST',
                    body: formData
                }
            );

            const data = await response.json();

            if (data.success) {
                const teamName = team === 0 ? 'CT' : 'T';
                console.log(`Successfully applied ${itemType} to ${teamName}`);
                return { success: true, team: teamName };
            } else {
                console.error(`Failed to apply ${itemType} to team ${team}:`, data.error);
                return { success: false, error: data.error };
            }
        } catch (error) {
            console.error(`Error applying ${itemType} to team:`, error);
            return { success: false, error: error.message };
        }
    }

    /**
     * Handle apply item to team
     * @param {HTMLElement} button - Apply button
     * @param {Event} event - Click event
     */
    function handleApplySpecialItemTeam(button, event) {
        event.preventDefault();
        event.stopPropagation();

        const targetTeam = button.dataset.targetTeam;
        const itemId = button.dataset.itemId;
        const itemType = button.dataset.itemType;
        const paintIndex = button.dataset.paintIndex;

        // console.debug('Applying special item to team:', { itemId, itemType, paintIndex, targetTeam });

        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const messages = window.SkinchangerManager.getMessages();

        if (targetTeam === 'both') {
            Promise.all([
                applySpecialItemToTeam(itemId, itemType, 0, paintIndex),
                applySpecialItemToTeam(itemId, itemType, 1, paintIndex)
            ]).then(results => {
                const successCount = results.filter(r => r.success).length;
                if (successCount === 2) {
                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }
                    const message = messages.appliedToBothTeams || 'Applied item to both teams';
                    window.SkinchangerUtils.showNotification(message, 'success');
                    window.SkinchangerManager?.refreshContent();
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
            applySpecialItemToTeam(itemId, itemType, team, paintIndex).then(result => {
                if (result.success) {
                    if (window.SkinchangerModalManager) {
                        window.SkinchangerModalManager.closeActiveModals();
                    }
                    const teamName = targetTeam === 'ct' ? (messages.teamCT || 'CT') : (messages.teamT || 'T');
                    const message = messages.appliedToTeam ?
                        messages.appliedToTeam.replace('{team}', teamName) :
                        `Applied item to ${teamName} team`;
                    window.SkinchangerUtils.showNotification(message, 'success');
                    window.SkinchangerManager?.refreshContent();
                }
            });
        }

        if (typeof app !== 'undefined' && app.dropdowns) {
            app.dropdowns.closeAllDropdowns();
        }
    }

    // Public API
    return {
        handleSpecialItemCard,
        handleAgentCard,
        loadWeaponTypes,
        loadSpecialItems,
        handleSpecialItemSelection,
        selectSpecialItem,
        handleWeaponTypeSelection,
        removeDefaultWeapon,
        loadWeaponSkins,
        handleWeaponSkinSelection,
        selectWeaponSkin,
        handleBackToWeaponTypes,
        handleRemoveItem,
        executeRemoveItem,
        applySpecialItemToTeam,
        handleApplySpecialItemTeam,
        getCurrentWeaponCategory: () => currentWeaponCategory,
        setCurrentWeaponCategory: (category) => { currentWeaponCategory = category; }
    };
})(); 