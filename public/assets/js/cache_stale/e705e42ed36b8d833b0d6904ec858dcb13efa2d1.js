window.SkinchangerSkinManager = (function() {
    'use strict';

    /**
     * Handle skin selection
     * @param {HTMLElement} option - Skin option element
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

        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const serverId = window.SkinchangerManager.getServerId();
        const currentTeam = window.SkinchangerManager.getCurrentTeam();
        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

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
                if (window.SkinchangerManager) {
                    window.SkinchangerManager.refreshContent();
                }

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
     * Update weapon card UI with skin info
     * @param {string} weaponId - Weapon ID
     * @param {string} skinName - Skin name
     * @param {string} skinRarity - Skin rarity color
     */
    function updateWeaponCardUI(weaponId, skinName, skinRarity) {
        const weaponCard = document.querySelector(`[data-weapon-id="${weaponId}"]`);
        if (!weaponCard) return;

        const skinNameElement = weaponCard.querySelector('.skin-name');
        const addSkinElement = weaponCard.querySelector('.add-skin-text');
        const weaponImage = weaponCard.querySelector('.weapon-image');

        if (skinName !== 'Default') {
            weaponCard.classList.add('has-skin');

            if (skinNameElement) {
                skinNameElement.textContent = skinName;
                skinNameElement.style.display = 'flex';
            }
            if (addSkinElement) {
                addSkinElement.style.display = 'none';
            }

            // Update rarity badge
            const existingBadge = weaponImage.querySelector('.rarity-dot');
            if (existingBadge) existingBadge.remove();

            const badge = document.createElement('span');
            badge.className = 'rarity-dot';
            badge.style.background = skinRarity;
            weaponImage.appendChild(badge);
        } else {
            weaponCard.classList.remove('has-skin');

            if (skinNameElement) {
                skinNameElement.style.display = 'none';
            }
            if (addSkinElement) {
                addSkinElement.style.display = 'flex';
            }

            const existingBadge = weaponImage.querySelector('.rarity-dot');
            if (existingBadge) existingBadge.remove();
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
        if (window.SkinchangerModalManager) {
            window.SkinchangerModalManager.updateModalTitle('skin-modal', weaponName);
            window.SkinchangerModalManager.restoreModalSkeleton('skin-modal');
            window.SkinchangerModalManager.openModal('skin-modal');
        }

        if (window.SkinchangerManager) {
            const currentTeam = window.SkinchangerManager.getCurrentTeam();
            const serverId = window.SkinchangerManager.getServerId();
            window.SkinchangerManager.loadSkins(weaponName, currentTeam, serverId);
        }
    }

    /**
     * Update weapon card display based on skin status
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
     * Handle weapon skin removal
     * @param {HTMLElement} button - Remove button
     * @param {Event} event - Click event
     */
    async function handleRemoveWeaponSkin(button, event) {
        event.preventDefault();
        event.stopPropagation();

        const weaponId = button.dataset.weaponId;
        const serverId = button.dataset.serverId;
        const team = button.dataset.team;

        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const messages = window.SkinchangerManager.getMessages();
        const confirmMessage = messages.confirmRemoveSkin || 'Are you sure you want to remove this skin?';

        const confirmed = await window.SkinchangerUtils.confirmAction(confirmMessage);
        if (!confirmed) return;

        executeRemoveWeaponSkin(weaponId, serverId, team);
    }

    /**
     * Execute weapon skin removal
     * @param {string} weaponId - Weapon ID
     * @param {string} serverId - Server ID
     * @param {string} team - Team
     */
    async function executeRemoveWeaponSkin(weaponId, serverId, team) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return;
        }

        const currentTeam = window.SkinchangerManager.getCurrentTeam();
        const routes = window.SkinchangerManager.getRoutes();
        const messages = window.SkinchangerManager.getMessages();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: currentTeam,
            weapon_index: weaponId
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.removeSkin || '/skins/remove-skin',
                {
                    method: 'POST',
                    body: formData
                }
            );

            if (response.ok) {
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    const data = await response.json();
                    if (!data.success) {
                        const errorMsg = messages.failedToRemove ?
                            messages.failedToRemove.replace('{item}', 'skin') :
                            'Failed to remove skin';
                        window.SkinchangerUtils.showNotification(data.error || errorMsg, 'error');
                        return;
                    }
                } else {
                    const html = await response.text();
                    document.querySelector('.skins-content').outerHTML = html;

                    if (typeof htmx !== 'undefined') {
                        htmx.process(document.querySelector('.skins-content'));
                    }
                }

                const message = messages.skinRemoved || 'Skin removed successfully';
                window.SkinchangerUtils.showNotification(message, 'success');
            } else {
                throw new Error(`HTTP ${response.status}`);
            }
        } catch (error) {
            console.error('Error removing skin:', error);
            const errorMsg = messages.failedToRemove ?
                messages.failedToRemove.replace('{item}', 'skin') :
                'Failed to remove skin';
            window.SkinchangerUtils.showNotification(errorMsg, 'error');
        }
    }

    /**
     * Apply skin to specific team
     * @param {string} weaponIndex - Weapon index
     * @param {string} skinId - Skin ID
     * @param {number} team - Team (0 for CT, 1 for T)
     * @returns {Object} Result object
     */
    async function applySkinToTeam(weaponIndex, skinId, team) {
        if (!window.SkinchangerManager) {
            console.error('SkinchangerManager not available');
            return { success: false, error: 'Manager not available' };
        }

        const serverId = window.SkinchangerManager.getServerId();
        const routes = window.SkinchangerManager.getRoutes();

        const formData = window.SkinchangerUtils.createFormData({
            server_id: serverId,
            team: team,
            weapon_index: weaponIndex,
            skin_id: skinId || 0,
            paint_index: skinId || 0,
            quality: 0,
            wear: '0.0'
        });

        try {
            const response = await window.SkinchangerUtils.fetchWithErrorHandling(
                routes.saveSkin || '/skins/save-skin',
                {
                    method: 'POST',
                    body: formData
                }
            );

            const data = await response.json();

            if (data.success) {
                const teamName = team === 0 ? 'CT' : 'T';
                console.log(`Successfully applied skin to ${teamName}`);
                return { success: true, team: teamName };
            } else {
                console.error(`Failed to apply skin to team ${team}:`, data.error);
                return { success: false, error: data.error };
            }
        } catch (error) {
            console.error('Error applying skin to team:', error);
            return { success: false, error: error.message };
        }
    }

    // Public API
    return {
        handleSkinSelection,
        selectSkin,
        updateWeaponCardUI,
        handleWeaponCard,
        openSkinModal,
        updateWeaponCardDisplay,
        handleRemoveWeaponSkin,
        executeRemoveWeaponSkin,
        applySkinToTeam
    };
})(); 