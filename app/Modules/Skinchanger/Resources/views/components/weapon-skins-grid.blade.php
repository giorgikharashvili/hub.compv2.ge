<div
    class="weapon-skins-modal-content {{ ($vipOnlyMode ?? false) && !($hasVipAccess ?? false) ? 'skinchanger-vip-only' : '' }}">
    <div class="search-container">
        <div class="back-to-types">
            <button class="back-button" data-handler="back-to-weapon-types">
                <x-icon path="ph.regular.arrow-left" class="icon" />
                {{ __('skinchanger.buttons.back_to_types', 'Back to Types') }}
            </button>
        </div>

        <div class="search-input-wrapper">
            <x-fields.input name="search" class="search-input"
                placeholder="{{ __('skinchanger.search.placeholder', 'Search skins...') }}" value=""
                data-weapon="{{ $weaponId }}" data-team="{{ $team }}" data-server-id="{{ $serverId }}"
                autofocus autocomplete="off" />

            <x-button type="outline-primary" class="clear-filters-button" data-handler="clear-filters">
                <x-icon path="ph.regular.x" class="icon" />
            </x-button>
        </div>
    </div>

    <div class="weapon-skins-grid-container">
        <div class="weapon-skins-grid">
            <div class="no-items-message" style="display: {{ empty($items) ? 'flex' : 'none' }};">
                <div class="no-items-icon">
                    <x-icon path="ph.regular.smiley-sad" class="icon" />
                </div>
                <p>{{ __('skinchanger.search.no_skins', ['weapon' => $weaponName]) }}</p>
                <p class="no-items-suggestion">
                    <small class="text-muted">
                        {{ __('skinchanger.search.try_different', 'Try different search terms or remove filters.') }}
                    </small>
                </p>
            </div>

            @if (!empty($items))
                @php
                    $skinchangerManager = app(\Flute\Modules\Skinchanger\Services\SkinchangerManager::class);
                    $weaponIndex = $skinchangerManager->getWeaponIndexById($weaponId);
                    $weaponImagePath = $skinchangerManager->getWeaponImagePath($weaponId);

                    // Determine item type based on weapon ID
                    $itemType = null;
                    if (
                        str_contains($weaponId, 'knife') ||
                        str_contains($weaponId, 'bayonet') ||
                        str_contains($weaponId, 'karambit')
                    ) {
                        $itemType = 'knife';
                    } elseif (str_contains($weaponId, 'gloves') || str_contains($weaponId, 'handwraps')) {
                        $itemType = 'glove';
                    }
                @endphp

                @if (!str_contains($weaponId, 'gloves') && !str_contains($weaponId, 'handwraps'))
                    <div class="weapon-skin-option default-skin has-vip-access" data-handler="weapon-skin-option"
                        data-skin-id="0" data-skin-name="{{ __('skinchanger.skins.default', 'Default') }}"
                        data-skin-price="0" data-skin-rarity="consumer grade" data-paint-index="0"
                        data-rarity-color="#b0c3d9" data-weapon-id="{{ $weaponId }}">
                        <div class="skin-content">
                            <div class="skin-image">
                                <img src="{{ $weaponImagePath }}" class="skin-img" loading="lazy">
                            </div>
                            <div class="skin-info">
                                <div class="skin-name">{{ __('skinchanger.skins.default', 'Default') }}</div>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($items as $index => $skin)
                    @php
                        $skinName = $skin['name'] ?? __('skinchanger.skins.unknown', 'Unknown Skin');
                        $skinName = preg_replace('/\([^()]*\)/', '', $skinName);
                        $paintIndex = $skin['paint_index'] ?? $index + 1;
                        $rarity = strtolower($skin['rarity']['name'] ?? 'common');
                        $rarityColor = $skin['rarity']['color'] ?? '#b0c3d9';
                        $skinImage = $skin['image'] ?? null;
                        $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
                        $hasVipAccessClass = $isVipRequired ? 'vip-restricted' : 'has-vip-access';
                    @endphp

                    <div class="weapon-skin-option {{ $hasVipAccessClass }}"
                        @if (!$isVipRequired || ($hasVipAccess && $isVipRequired)) data-handler="weapon-skin-option" @endif
                        data-skin-id="{{ $paintIndex }}" data-skin-name="{{ $skinName }}"
                        data-paint-index="{{ $paintIndex }}" data-rarity-color="{{ $rarityColor }}"
                        data-rarity="{{ $rarity }}" data-weapon-id="{{ $weaponId }}"
                        style="--rarity-color: {{ $rarityColor }};">

                        <x-skinchanger::vip-tooltip :has-vip-access="$hasVipAccess" :vip-only-mode="$vipOnlyMode" />

                        <span class="rarity-badge" style="color: {{ $rarityColor }};"></span>

                        <x-skinchanger::team-action-menu :index="$index" weapon-index="{{ $weaponIndex }}"
                            weapon-id="{{ $weaponId }}" skin-id="{{ $paintIndex }}"
                            paint-index="{{ $paintIndex }}" item-type="{{ $itemType }}" />

                        <div class="skin-image">
                            <div class="skin-preview">
                                @if ($skinImage)
                                    <img src="{{ $skinImage }}" alt="{{ $skinName }}" loading="lazy"
                                        onerror="this.parentElement.innerHTML='<span class=\'skin-placeholder\'>{{ addslashes($skinName) }}</span>';">
                                @else
                                    <span class="skin-placeholder">{{ $skinName }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="skin-info">
                            <div class="skin-name" title="{{ $skinName }}">{{ $skinName }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
