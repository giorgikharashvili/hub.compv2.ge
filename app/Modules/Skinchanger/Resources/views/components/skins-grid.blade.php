<div
    class="skins-modal-content {{ ($vipOnlyMode ?? false) && !($hasVipAccess ?? false) ? 'skinchanger-vip-only' : '' }}">
    <div class="search-container">
        <div class="search-input-wrapper">
            <x-fields.input name="search" class="search-input"
                placeholder="{{ __('skinchanger.search.placeholder', 'Search skins...') }}" value=""
                data-weapon="{{ $weapon ?? '' }}" data-team="{{ $team ?? 'ct' }}" data-server-id="{{ $serverId ?? '' }}"
                autocomplete="off" autofocus />

            <x-button type="outline-primary" class="clear-filters-button" data-handler="clear-filters">
                <x-icon path="ph.regular.x" class="icon" />
            </x-button>
        </div>

        <div class="rarity-filters" data-weapon="{{ $weapon ?? '' }}" data-team="{{ $team ?? 'ct' }}"
            data-server-id="{{ $serverId ?? '' }}">
            @php
                $rarities = [
                    'consumer grade' => __('skinchanger.rarity.consumer_grade', 'Consumer Grade'),
                    'industrial grade' => __('skinchanger.rarity.industrial_grade', 'Industrial Grade'),
                    'mil-spec grade' => __('skinchanger.rarity.mil_spec', 'Mil-Spec Grade'),
                    'restricted' => __('skinchanger.rarity.restricted', 'Restricted'),
                    'classified' => __('skinchanger.rarity.classified', 'Classified'),
                    'covert' => __('skinchanger.rarity.covert', 'Covert'),
                    'contraband' => __('skinchanger.rarity.contraband', 'Contraband'),
                ];
            @endphp

            <div class="rarity-badges">
                @foreach ($rarities as $rarityKey => $rarityName)
                    @php
                        $rarityColor = match ($rarityKey) {
                            'contraband' => '#e4ae39',
                            'covert' => '#eb4b4b',
                            'classified' => '#d32ce6',
                            'restricted' => '#8847ff',
                            'mil-spec grade' => '#4b69ff',
                            'industrial grade' => '#5e98d9',
                            'consumer grade' => '#b0c3d9',
                            default => '#b0c3d9',
                        };
                    @endphp
                    <x-badge type="outline-primary" class="rarity-badge" data-handler="rarity-badge"
                        data-rarity="{{ $rarityKey }}" data-rarity-name="{{ $rarityName }}"
                        data-rarity-color="{{ $rarityColor }}" style="cursor: pointer;">
                        {{ $rarityName }}
                    </x-badge>
                @endforeach
            </div>
        </div>
    </div>

    <div class="skins-grid-container">
        <div class="skins-grid">
            <div class="no-items-message" style="display: {{ empty($items) ? 'flex' : 'none' }};">
                <div class="no-items-icon">
                    <x-icon path="ph.regular.smiley-sad" class="icon" />
                </div>
                <p>{{ __('skinchanger.search.no_skins', ['weapon' => $weapon ?? 'this weapon']) }}</p>
                <p class="no-items-suggestion">
                    <small class="text-muted">
                        {{ __('skinchanger.search.try_different', 'Try different search terms or remove filters.') }}
                    </small>
                </p>
            </div>

            @if (!empty($items))
                @php
                    $skinchangerManager = app(\Flute\Modules\Skinchanger\Services\SkinchangerManager::class);
                    $weaponId = $skinchangerManager->getWeaponIdByShortName($weapon) ?? $weapon;
                    $weaponIndex = $skinchangerManager->getWeaponIndexById($weaponId);
                    $weaponImagePath = $skinchangerManager->getWeaponImagePath($weaponId);
                @endphp
                <div class="skin-option default-skin has-vip-access" data-handler="skin-option" data-skin-id="0"
                    data-skin-name="{{ __('skinchanger.skins.default', 'Default') }}" data-skin-price="0"
                    data-skin-rarity="consumer grade" data-paint-index="0" data-rarity-color="#b0c3d9">
                    <div class="skin-content">
                        <div class="skin-image">
                            <img src="{{ $weaponImagePath }}" class="skin-img" loading="lazy">
                        </div>
                        <div class="skin-info">
                            <div class="skin-name">{{ __('skinchanger.skins.default', 'Default') }}</div>
                        </div>
                    </div>
                </div>

                @foreach ($items as $index => $skin)
                    @php
                        $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
                        $hasVipAccessClass = $isVipRequired ? 'vip-restricted' : 'has-vip-access';
                    @endphp
                    <div class="skin-option {{ $hasVipAccessClass }}"
                        @if (!$isVipRequired || ($hasVipAccess && $isVipRequired)) data-handler="skin-option" @endif
                        data-skin-id="{{ $skin['id'] }}" data-skin-name="{{ $skin['name'] }}"
                        data-paint-index="{{ $skin['id'] }}" data-rarity-color="{{ $skin['rarity']['color'] }}"
                        data-skin-rarity="{{ strtolower($skin['rarity']['name'] ?? 'consumer grade') }}"
                        style="--rarity-color: {{ $skin['rarity']['color'] }};">

                        <x-skinchanger::vip-tooltip :vip-only-mode="$vipOnlyMode" :has-vip-access="$hasVipAccess" />

                        <span class="rarity-badge" style="color: {{ $skin['rarity']['color'] }};"></span>

                        @if (isset($category) && $category !== 'agents')
                            <x-skinchanger::team-action-menu :index="$index" :weapon-index="$weaponIndex" :skin-id="$skin['id']"
                                :paint-index="$skin['id']" />
                        @endif

                        <div class="skin-image">
                            <div class="skin-preview">
                                @if ($skin['image'])
                                    <img src="{{ $skin['image'] }}" alt="{{ $skin['name'] }}" loading="lazy"
                                        onerror="this.parentElement.innerHTML='<span class=\'skin-placeholder\'>{{ addslashes($skin['name']) }}</span>';">
                                @else
                                    <span class="skin-placeholder">{{ $skin['name'] }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="skin-info">
                            <div class="skin-name" title="{{ $skin['name'] }}">{{ $skin['name'] }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
