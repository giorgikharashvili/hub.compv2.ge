// Skinchanger Modal Manager - Handles modal operations
window.SkinchangerModalManager = (function() {
    'use strict';

    let modalSkeletons = new Map();

    /**
     * Store modal skeletons on initialization
     */
    function storeModalSkeletons() {
        const modalConfigs = [
            { id: 'skin-modal', selector: '.modal__content' },
            { id: 'special-items-modal', selector: '.modal__content' },
            { id: 'weapon-modal', selector: '.modal__content' },
            { id: 'skin-settings-modal', selector: '.modal__content' }
        ];

        modalConfigs.forEach(config => {
            const modal = document.getElementById(config.id);
            if (modal) {
                const contentElement = modal.querySelector(config.selector);
                if (contentElement) {
                    modalSkeletons.set(config.id, contentElement.innerHTML);
                    console.log(`Stored skeleton for ${config.id}`);
                }
            }
        });
    }

    /**
     * Restore modal skeleton content
     * @param {string} modalId - Modal ID to restore
     * @returns {boolean} Success status
     */
    function restoreModalSkeleton(modalId) {
        const modal = document.getElementById(modalId);
        const skeletonContent = modalSkeletons.get(modalId);

        if (modal && skeletonContent) {
            const modalBody = modal.querySelector('.modal__content');
            if (modalBody) {
                console.log(`Restoring skeleton for ${modalId}`);
                modalBody.innerHTML = skeletonContent;
                return true;
            }
        } else {
            console.log(`No skeleton found for ${modalId}, creating fallback`);
            createFallbackSkeleton(modalId);
            return false;
        }
        return false;
    }

    /**
     * Create fallback skeleton content when original is not available
     * @param {string} modalId - Modal ID to create fallback for
     */
    function createFallbackSkeleton(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        const modalBody = modal.querySelector('.modal__content');
        if (!modalBody) return;

        let skeletonHtml = '';

        switch (modalId) {
            case 'weapon-modal':
                skeletonHtml = createWeaponModalSkeleton();
                break;
            case 'special-items-modal':
                skeletonHtml = createSpecialItemsModalSkeleton();
                break;
            case 'skin-modal':
                skeletonHtml = createSkinModalSkeleton();
                break;
            case 'skin-settings-modal':
                skeletonHtml = createSkinSettingsModalSkeleton();
                break;
            default:
                skeletonHtml = '<div class="loading-skeleton">Loading...</div>';
        }

        modalBody.innerHTML = skeletonHtml;
        console.log(`Created fallback skeleton for ${modalId}`);
    }

    /**
     * Create weapon modal skeleton
     * @returns {string} HTML skeleton
     */
    function createWeaponModalSkeleton() {
        return `
            <div class="weapon-modal-skeleton">
                <div class="weapon-types-header">
                    <div class="skeleton-title"></div>
                    <div class="skeleton-description"></div>
                </div>
                <div class="weapon-types-grid-container">
                    <div class="weapon-types-grid-skeleton">
                        ${Array(12).fill().map(() => `
                            <div class="weapon-type-option-skeleton">
                                <div class="skeleton-weapon-image"></div>
                                <div class="skeleton-weapon-name"></div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
    }

    /**
     * Create special items modal skeleton
     * @returns {string} HTML skeleton
     */
    function createSpecialItemsModalSkeleton() {
        return `
            <div class="items-modal-skeleton">
                <div class="search-container">
                    <div class="search-input-wrapper">
                        <div class="skeleton-search-input"></div>
                        <div class="skeleton-clear-button"></div>
                    </div>
                </div>
                <div class="special-items-grid-container">
                    <div class="special-items-grid-skeleton">
                        ${Array(20).fill().map(() => `
                            <div class="special-item-option-skeleton">
                                <div class="skeleton-item-image"></div>
                                <div class="skeleton-item-name"></div>
                                <div class="skeleton-item-badge"></div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
    }

    /**
     * Create skin modal skeleton
     * @returns {string} HTML skeleton
     */
    function createSkinModalSkeleton() {
        return `
            <div class="skins-modal-skeleton">
                <div class="search-container">
                    <div class="search-input-wrapper">
                        <div class="skeleton-search-input"></div>
                        <div class="skeleton-clear-button"></div>
                    </div>
                    <div class="rarity-filters">
                        <div class="rarity-badges">
                            ${Array(6).fill().map(() => '<div class="skeleton-badge"></div>').join('')}
                        </div>
                    </div>
                </div>
                <div class="skins-grid-container">
                    <div class="skins-grid-skeleton">
                        ${Array(20).fill().map(() => `
                            <div class="skin-option-skeleton">
                                <div class="skeleton-skin-image"></div>
                                <div class="skeleton-skin-name"></div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
    }

    /**
     * Create skin settings modal skeleton
     * @returns {string} HTML skeleton
     */
    function createSkinSettingsModalSkeleton() {
        return `
            <div class="skin-settings-modal-skeleton">
                <div class="skin-settings-header">
                    <div class="skeleton-image"></div>
                    <div class="skin-details">
                        <div class="skeleton-title"></div>
                        <div class="skeleton-subtitle"></div>
                        <div class="skeleton-badge"></div>
                    </div>
                </div>
                <div class="skin-settings-content">
                    <div class="settings-section">
                        <div class="skeleton-section-title"></div>
                        <div class="settings-grid">
                            <div class="setting-item">
                                <div class="skeleton-label"></div>
                                <div class="skeleton-control"></div>
                            </div>
                            <div class="setting-item">
                                <div class="skeleton-label"></div>
                                <div class="skeleton-control"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    /**
     * Open modal using global openModal function
     * @param {string} modalId - Modal ID to open
     */
    function openModal(modalId) {
        if (typeof window.openModal === 'function') {
            window.openModal(modalId);

            if (modalId === 'right-sidebar') {
                const sidebar = document.getElementById('right-sidebar');
                if (sidebar) {
                    sidebar.style.zIndex = '9999';

                    const content = sidebar.querySelector('.stickers-sidebar__grid, .charms-sidebar__grid');
                    if (content) {
                        content.scrollTop = 0;
                        console.log('Forced sidebar scroll to top');
                    }
                }
            }
        }
    }

    /**
     * Close modal using global closeModal function
     * @param {string} modalId - Modal ID to close
     */
    function closeModal(modalId) {
        if (typeof window.closeModal === 'function') {
            window.closeModal(modalId);
        }
    }

    /**
     * Check if modal is currently visible
     * @param {HTMLElement} modal - Modal element
     * @returns {boolean} Visibility status
     */
    function isModalVisible(modal) {
        if (!modal) return false;

        const style = window.getComputedStyle(modal);
        const isDisplayed = style.display !== 'none';
        const isVisible = style.visibility !== 'hidden';
        const hasOpacity = parseFloat(style.opacity) > 0;

        const hasActiveClass = modal.classList.contains('active') ||
            modal.classList.contains('show') ||
            modal.classList.contains('open');

        return (isDisplayed && isVisible && hasOpacity) || hasActiveClass;
    }

    /**
     * Update modal title
     * @param {string} modalId - Modal ID
     * @param {string} title - New title
     */
    function updateModalTitle(modalId, title) {
        const modal = document.getElementById(modalId);
        if (modal) {
            const titleElement = modal.querySelector('.modal__title');
            if (titleElement) {
                titleElement.textContent = title;
            }
        }
    }

    /**
     * Close any active modals
     */
    function closeActiveModals() {
        const modals = ['skin-modal', 'special-items-modal', 'weapon-modal', 'skin-settings-modal', 'right-sidebar'];
        modals.forEach(modalId => {
            const modal = document.getElementById(modalId);
            if (modal && isModalVisible(modal)) {
                closeModal(modalId);
            }
        });
    }

    // Public API
    return {
        storeModalSkeletons,
        restoreModalSkeleton,
        createFallbackSkeleton,
        openModal,
        closeModal,
        isModalVisible,
        updateModalTitle,
        closeActiveModals
    };
})(); 