window.SkinchangerFilterManager = (function() {
    'use strict';

    let debouncedModalFilter;
    let debouncedWeaponSearch;

    /**
     * Initialize filter manager
     */
    function init() {
        if (window.SkinchangerUtils) {
            debouncedModalFilter = window.SkinchangerUtils.debounce(() => {
                performClientSideFilter();
                updateClearButtonVisibility();
            }, 300);

            debouncedWeaponSearch = window.SkinchangerUtils.debounce((val) => {
                performWeaponSearch(val);
                updateClearSearchButtonVisibility(val);
            }, 300);
        }
    }

    /**
     * Reset all filters and search inputs
     */
    function resetFiltersAndSearch() {
        console.log('Resetting filters and search...');

        // Reset search input
        const searchInputs = document.querySelectorAll('input[name="search"], .input__field');
        searchInputs.forEach(input => {
            if (input.value !== '') {
                console.log('Clearing search input:', input.value);
                input.value = '';
            }
        });

        // Reset rarity filters
        const rarityBadges = document.querySelectorAll('.rarity-badge.active');
        rarityBadges.forEach(badge => {
            console.log('Resetting rarity badge:', badge.textContent);
            badge.classList.remove('active');
            badge.className = badge.className.replace(/badge-\w+/, 'badge-outline-primary');
        });

        // Hide clear button
        const clearButtons = document.querySelectorAll('.clear-filters-button');
        clearButtons.forEach(button => {
            button.style.display = 'none';
        });

        // Reset no-items message
        const noItemsMessages = document.querySelectorAll('.no-items-message');
        noItemsMessages.forEach(message => {
            message.style.display = 'none';
        });

        // Show all items
        const allItems = document.querySelectorAll('.skin-option, .special-item-option, .weapon-skin-option');
        allItems.forEach(item => {
            if (!item.classList.contains('no-items-message')) {
                item.style.display = 'flex';
            }
        });

        console.log('Filter reset completed');
    }

    /**
     * Perform client-side filtering in modals
     */
    function performClientSideFilter() {
        requestAnimationFrame(() => {
            const skinModal = document.getElementById('skin-modal');
            const specialModal = document.getElementById('special-items-modal');
            const weaponModal = document.getElementById('weapon-modal');

            let activeModal = null;
            if (skinModal && window.SkinchangerModalManager?.isModalVisible(skinModal)) {
                activeModal = skinModal;
            } else if (specialModal && window.SkinchangerModalManager?.isModalVisible(specialModal)) {
                activeModal = specialModal;
            } else if (weaponModal && window.SkinchangerModalManager?.isModalVisible(weaponModal)) {
                activeModal = weaponModal;
            }

            if (!activeModal) {
                console.log('No active modal found for filtering - this is normal for weapon search');
                return;
            }

            console.log('Performing filter on modal:', activeModal.id);

            const container = activeModal.querySelector('.search-container');
            const searchInput = container?.querySelector('input[name="search"]') || container?.querySelector('.input__field');
            const rarityFilters = container?.querySelector('.rarity-filters');
            const grid = activeModal.querySelector('.skins-grid') ||
                activeModal.querySelector('.special-items-grid') ||
                activeModal.querySelector('.weapon-skins-grid');

            if (!grid) {
                console.log('No grid found for filtering in', activeModal.id);
                return;
            }

            const searchValue = searchInput?.value.trim().toLowerCase() || '';
            const activeBadges = rarityFilters?.querySelectorAll('[data-handler="rarity-badge"].active') || [];
            const selectedRarityColors = Array.from(activeBadges).map(badge => badge.dataset.rarityColor || badge.getAttribute('data-rarity-color'));
            const selectedRarityNames = Array.from(activeBadges).map(badge => badge.dataset.rarity || badge.getAttribute('data-rarity'));

            console.log('Filtering with:', {
                searchValue,
                selectedRarityColors: selectedRarityColors.length,
                selectedRarityNames: selectedRarityNames.length,
                activeBadges: activeBadges.length,
                rarityColors: selectedRarityColors,
                rarityNames: selectedRarityNames,
                modal: activeModal.id
            });

            const itemOptions = grid.querySelectorAll('.skin-option, .special-item-option, .weapon-skin-option');
            console.log('Found', itemOptions.length, 'items to filter');

            let visibleCount = 0;
            itemOptions.forEach(option => {
                if (option.classList.contains('no-items-message') ||
                    option.classList.contains('default-item') ||
                    option.classList.contains('default-skin')) {
                    return;
                }

                const itemName = (
                    option.dataset.skinName ||           // camelCase
                    option.dataset.itemName ||           // camelCase
                    option.getAttribute('data-skin-name') ||    // kebab-case
                    option.getAttribute('data-item-name') ||    // kebab-case
                    ''
                ).toLowerCase();

                const itemRarityColor = 
                    option.dataset.rarityColor ||        // camelCase
                    option.dataset.skinRarityColor ||    // camelCase
                    option.dataset.itemRarityColor ||    // camelCase
                    option.getAttribute('data-rarity-color') ||      // kebab-case
                    option.getAttribute('data-skin-rarity-color') || // kebab-case
                    option.getAttribute('data-item-rarity-color') || // kebab-case
                    '';

                const itemRarityName = 
                    option.dataset.skinRarity ||         // camelCase
                    option.dataset.itemRarity ||         // camelCase
                    option.getAttribute('data-skin-rarity') ||      // kebab-case
                    option.getAttribute('data-item-rarity') ||      // kebab-case
                    '';

                let showItem = true;

                // Search filter
                if (searchValue && !itemName.includes(searchValue)) {
                    showItem = false;
                }

                // Rarity filter
                if (rarityFilters && (selectedRarityColors.length > 0 || selectedRarityNames.length > 0)) {
                    const matchesColor = selectedRarityColors.length === 0 || selectedRarityColors.includes(itemRarityColor);
                    const matchesName = selectedRarityNames.length === 0 || selectedRarityNames.some(rarity => 
                        itemRarityName.toLowerCase().includes(rarity.toLowerCase()) ||
                        rarity.toLowerCase().includes(itemRarityName.toLowerCase())
                    );
                    
                    if (!matchesColor && !matchesName) {
                        showItem = false;
                    }
                }

                option.style.display = showItem ? 'flex' : 'none';
                if (showItem) visibleCount++;
            });

            console.log('Visible items after filter:', visibleCount);
            updateNoItemsMessage(grid, searchValue, selectedRarityColors.concat(selectedRarityNames));
        });
    }

    /**
     * Update clear button visibility based on active filters
     */
    function updateClearButtonVisibility() {
        const skinModal = document.getElementById('skin-modal');
        const specialModal = document.getElementById('special-items-modal');
        const weaponModal = document.getElementById('weapon-modal');

        let activeModal = null;
        if (skinModal && window.SkinchangerModalManager?.isModalVisible(skinModal)) {
            activeModal = skinModal;
        } else if (specialModal && window.SkinchangerModalManager?.isModalVisible(specialModal)) {
            activeModal = specialModal;
        } else if (weaponModal && window.SkinchangerModalManager?.isModalVisible(weaponModal)) {
            activeModal = weaponModal;
        }

        if (!activeModal) return;

        const container = activeModal.querySelector('.search-container');
        const searchInput = container?.querySelector('input[name="search"]') || container?.querySelector('.input__field');
        const rarityFilters = container?.querySelector('.rarity-filters');
        const clearButton = container?.querySelector('.clear-filters-button');

        if (!clearButton) return;

        const hasSearchValue = searchInput?.value.trim().length > 0;
        const hasActiveFilters = rarityFilters?.querySelectorAll('.rarity-badge.active').length > 0;

        clearButton.style.display = (hasSearchValue || hasActiveFilters) ? 'flex' : 'none';
    }

    /**
     * Update no items message
     * @param {HTMLElement} grid - Grid element
     * @param {string} searchValue - Search value
     * @param {Array} selectedRarities - Selected rarity filters
     */
    function updateNoItemsMessage(grid, searchValue, selectedRarities) {
        const visibleItems = Array.from(grid.querySelectorAll('.skin-option, .special-item-option, .weapon-skin-option')).filter(item => {
            return !item.classList.contains('no-items-message') &&
                !item.classList.contains('default-item') &&
                (item.style.display === 'flex' || !item.style.display || item.style.display !== 'none');
        });
        const noItemsMessage = grid.querySelector('.no-items-message');

        if (visibleItems.length === 0) {
            if (noItemsMessage) {
                noItemsMessage.style.display = 'flex';
            }
        } else if (noItemsMessage) {
            noItemsMessage.style.display = 'none';
        }
    }

    /**
     * Handle weapon search functionality
     * @param {string} searchValue - Search term
     */
    function performWeaponSearch(searchValue) {
        const weaponsGrid = document.getElementById('weapons-grid');
        if (!weaponsGrid) return;

        const searchTerm = searchValue.toLowerCase();
        const categories = weaponsGrid.querySelectorAll('.weapon-category-section');
        let hasVisibleWeapons = false;
        let totalVisibleCategories = 0;

        categories.forEach(category => {
            const weapons = category.querySelectorAll('.weapon-card');
            let visibleWeaponsInCategory = 0;

            weapons.forEach(weapon => {
                const weaponName = weapon.dataset.weaponName?.toLowerCase() || '';
                const skinName = weapon.dataset.skinName?.toLowerCase() || '';
                const weaponDisplayName = weapon.querySelector('.weapon-name')?.textContent?.toLowerCase() || '';

                const isVisible = !searchTerm ||
                    weaponName.includes(searchTerm) ||
                    skinName.includes(searchTerm) ||
                    weaponDisplayName.includes(searchTerm);

                if (isVisible) {
                    weapon.classList.remove('hidden');
                    visibleWeaponsInCategory++;
                    hasVisibleWeapons = true;
                } else {
                    weapon.classList.add('hidden');
                }
            });

            if (visibleWeaponsInCategory > 0) {
                category.classList.remove('hidden');
                totalVisibleCategories++;
            } else {
                category.classList.add('hidden');
            }
        });

        updateNoWeaponsMessage(weaponsGrid, hasVisibleWeapons, searchTerm);
    }

    /**
     * Update clear search button visibility
     * @param {string} searchValue - Current search value
     */
    function updateClearSearchButtonVisibility(searchValue) {
        const clearButton = document.querySelector('.clear-search-btn');
        if (clearButton) {
            clearButton.style.display = searchValue.length > 0 ? 'flex' : 'none';
        }
    }

    /**
     * Update no weapons message
     * @param {HTMLElement} weaponsGrid - Weapons grid element
     * @param {boolean} hasVisibleWeapons - Whether there are visible weapons
     * @param {string} searchTerm - Search term
     */
    function updateNoWeaponsMessage(weaponsGrid, hasVisibleWeapons, searchTerm) {
        let noWeaponsMessage = weaponsGrid.querySelector('.no-weapons-message');

        if (!hasVisibleWeapons && searchTerm) {
            if (!noWeaponsMessage) {
                noWeaponsMessage = document.createElement('div');
                noWeaponsMessage.className = 'no-weapons-message';
                
                const messages = window.skinchangerData?.messages || {};
                const messageText = messages.noWeaponsFound || 'No weapons found matching your search';
                
                noWeaponsMessage.innerHTML = `
                    <div class="no-weapons-content">
                        <svg class="icon" viewBox="0 0 256 256">
                            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                        </svg>
                        <div class="no-weapons-text">${messageText}</div>
                    </div>
                `;
                weaponsGrid.appendChild(noWeaponsMessage);
            }
            noWeaponsMessage.classList.add('show');
        } else if (noWeaponsMessage) {
            noWeaponsMessage.classList.remove('show');
        }
    }

    /**
     * Handle clear filters button click
     * @param {HTMLElement} button - Clear button element
     */
    function handleClearFilters(button) {
        const container = button.closest('.search-container');
        const searchInput = container?.querySelector('input[name="search"]') || container?.querySelector('.input__field');
        const rarityBadges = container?.querySelectorAll('.rarity-badge.active');

        if (searchInput) {
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input', { bubbles: true }));
        }

        rarityBadges?.forEach(badge => {
            badge.classList.remove('active');
            badge.className = badge.className.replace(/badge-\w+/, 'badge-outline-primary');
        });

        performClientSideFilter();
        updateClearButtonVisibility();
    }

    /**
     * Handle rarity badge click
     * @param {HTMLElement} badge - Rarity badge element
     */
    function handleRarityBadge(badge) {
        const isActive = badge.classList.contains('active');

        console.log('Rarity badge clicked:', badge.dataset.rarity, 'isActive:', isActive);

        if (isActive) {
            badge.classList.remove('active');
            badge.className = badge.className.replace(/badge-\w+/, 'badge-outline-primary');
        } else {
            badge.classList.add('active');

            const rarity = badge.dataset.rarity;
            const typeMapping = {
                'contraband': 'warning',
                'covert': 'error',
                'classified': 'accent',
                'restricted': 'primary',
                'mil-spec grade': 'info',
                'consumer grade': 'outline-primary',
                'industrial grade': 'outline-primary'
            };

            const badgeType = typeMapping[rarity] || 'primary';
            badge.className = badge.className.replace(/badge-\w+/, `badge-${badgeType}`);
        }

        performClientSideFilter();
        updateClearButtonVisibility();
    }

    /**
     * Handle weapon search input
     * @param {string} searchValue - Search value
     */
    function handleWeaponSearch(searchValue) {
        if (debouncedWeaponSearch) {
            debouncedWeaponSearch(searchValue);
        } else {
            performWeaponSearch(searchValue);
            updateClearSearchButtonVisibility(searchValue);
        }
    }

    /**
     * Handle clear weapon search
     */
    function handleClearWeaponSearch() {
        const searchInput = document.querySelector('.weapon-search-input, [name="weapon_search"]');
        if (searchInput) {
            searchInput.value = '';
            performWeaponSearch('');
            updateClearSearchButtonVisibility('');
            searchInput.focus();
        }
    }

    /**
     * Handle modal search input
     */
    function handleModalFilter() {
        if (debouncedModalFilter) {
            debouncedModalFilter();
        } else {
            performClientSideFilter();
            updateClearButtonVisibility();
        }
    }

    /**
     * Cancel debounced operations
     */
    function cancelDebouncedOperations() {
        if (debouncedModalFilter && debouncedModalFilter.cancel) {
            debouncedModalFilter.cancel();
        }
        if (debouncedWeaponSearch && debouncedWeaponSearch.cancel) {
            debouncedWeaponSearch.cancel();
        }
    }

    // Public API
    return {
        init,
        resetFiltersAndSearch,
        performClientSideFilter,
        updateClearButtonVisibility,
        performWeaponSearch,
        handleClearFilters,
        handleRarityBadge,
        handleWeaponSearch,
        handleClearWeaponSearch,
        handleModalFilter,
        cancelDebouncedOperations
    };
})(); 