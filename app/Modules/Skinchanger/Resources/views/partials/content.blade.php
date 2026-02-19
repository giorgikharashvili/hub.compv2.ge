@php
    $skinchangerManager = app(\Flute\Modules\Skinchanger\Services\SkinchangerManager::class);
    $vipOnlyMode = $vipOnlyMode ?? false;
    $hasVipAccess = $hasVipAccess ?? false;

    $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
@endphp

<div class="skins-content">
    <div class="skins-sidebar">
        <div class="sidebar-section agent-section">
            <div class="agent-container">
                @php
                    $currentTeam = request()->input('team', 'ct');
                    $teamData = $playerData[$currentTeam === 'ct' ? 'ct' : 't'];
                    $currentAgent = $teamData['items']['agent'] ?? null;

                    $defaultAgentName =
                        $currentTeam === 'ct'
                            ? __('skinchanger.defaults.ct_agent')
                            : __('skinchanger.defaults.t_agent');

                    $agentName = is_array($currentAgent)
                        ? $currentAgent['name'] ?? $defaultAgentName
                        : $defaultAgentName;
                    $agentImage = is_array($currentAgent) ? $currentAgent['image'] ?? null : null;
                @endphp

                <div class="agent-card" data-handler="agent-card" data-item-type="agents" data-team="{{ $currentTeam }}"
                    data-server-id="{{ $selectedServerId }}">
                    <div class="agent-image">
                        <div class="agent-background-map">
                            @if ($currentTeam === 'ct')
                                <img src="{{ asset('assets/img/maps/730/de_nuke.webp') }}" alt="Agent Background"
                                    class="agent-background-img" loading="lazy">
                            @else
                                <img src="{{ asset('assets/img/maps/730/de_mirage.webp') }}" alt="Agent Background"
                                    class="agent-background-img" loading="lazy">
                            @endif
                        </div>
                        @if ($agentImage)
                            <img src="{{ $agentImage }}" alt="{{ $agentName }}" class="agent-img" loading="lazy">
                        @else
                            <x-icon path="ph.regular.user" class="agent-icon" />
                        @endif
                        {{-- @if ($currentAgent && $currentAgent !== '0')
                            <button class="agent-remove-btn" data-handler="remove-item" data-item-type="agent"
                                data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}"
                                title="{{ __('skinchanger.buttons.remove_agent', 'Remove Agent') }}">
                                <x-icon path="ph.regular.x" class="icon" />
                            </button>
                        @endif --}}
                    </div>
                    <div class="agent-details">
                        @php
                            $currentTeam = request()->input('team', 'ct');
                            $teamData = $playerData[$currentTeam === 'ct' ? 'ct' : 't'];
                            $currentAgent = $teamData['items']['agent'] ?? null;

                            $defaultAgentName =
                                $currentTeam === 'ct'
                                    ? __('skinchanger.defaults.ct_agent')
                                    : __('skinchanger.defaults.t_agent');
                        @endphp
                        <div class="agent-name">
                            {{ $currentAgent ? $currentAgent['name'] ?? $defaultAgentName : $defaultAgentName }}
                        </div>
                        <x-button type="outline-primary" size="small" class="change-agent-btn">
                            {{ __('skinchanger.buttons.change_agent', 'Change Agent') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-section special-items-section">
            <div class="special-items-cards">
                @php
                    $currentCoin = $teamData['items']['coin'] ?? null;
                    $currentMusic = $teamData['items']['music'] ?? null;
                    $currentGloves = $teamData['items']['glove'] ?? null;
                    $currentKnife = $teamData['items']['knife'] ?? null;

                    $glovesName = __('skinchanger.defaults.default_gloves');
                    $glovesImage = null;
                    $glovesRarityColor = '#b0c3d9';
                    $hasGlovesSkin = false;

                    if ($currentGloves && is_array($currentGloves)) {
                        $glovesName = $skinchangerManager->normaliseName($currentGloves['name'] ?? $glovesName);
                        $glovesImage = $currentGloves['image'] ?? null;
                        $glovesRarityColor = $currentGloves['rarity_color'] ?? '#b0c3d9';
                        $hasGlovesSkin = $currentGloves['has_skin'] ?? false;
                    }

                    $knifeName = __('skinchanger.defaults.default_knife');
                    $knifeImage = null;
                    $knifeRarityColor = '#b0c3d9';
                    $hasKnifeSkin = false;

                    if ($currentKnife && is_array($currentKnife)) {
                        $knifeName = $skinchangerManager->normaliseName($currentKnife['name'] ?? $knifeName);
                        $knifeImage = $currentKnife['image'] ?? null;

                        if (!$knifeImage && isset($currentKnife['id'])) {
                            $knifeImage = $skinchangerManager->getWeaponImagePath($currentKnife['id']);
                        }
                    } else {
                        $knifeImage = null;
                    }

                    $coinName = $skinchangerManager->normaliseName(
                        $currentCoin
                            ? $currentCoin['name'] ?? __('skinchanger.defaults.no_coin')
                            : __('skinchanger.defaults.no_coin'),
                    );
                    $coinImage = is_array($currentCoin) ? $currentCoin['image'] ?? null : null;

                    $musicName = $skinchangerManager->normaliseName(
                        $currentMusic
                            ? $currentMusic['name'] ?? __('skinchanger.defaults.default_music')
                            : __('skinchanger.defaults.default_music'),
                    );
                    $musicImage = is_array($currentMusic) ? $currentMusic['image'] ?? null : null;
                @endphp

                <div @class([
                    'special-item-card',
                    'has-image' => $glovesImage !== null,
                    'has-skin' => $hasGlovesSkin,
                ]) data-handler="special-item-card" data-item-type="gloves"
                    data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}"
                    style="--rarity-color: {{ $glovesRarityColor }};">

                    @if ($hasGlovesSkin)
                        <span class="rarity-badge" style="background: {{ $glovesRarityColor }};"></span>
                    @endif

                    <div class="item-icon">
                        @if ($glovesImage)
                            <img src="{{ $glovesImage }}" alt="{{ $glovesName }}" class="item-image"
                                loading="lazy">
                        @else
                            <img src="{{ asset('assets/img/weapons/' . $currentTeam . '_gloves.webp') }}"
                                alt="{{ $glovesName }}" class="item-image" loading="lazy">
                        @endif
                    </div>
                    <div class="item-name">{{ $glovesName }}</div>
                    @if ($currentGloves && (is_array($currentGloves) && $currentGloves['id'] !== '0'))
                        <div class="item-actions">
                            @if (!$isVipRequired || ($hasVipAccess && $isVipRequired))
                                <button class="item-action-btn settings-btn" data-handler="weapon-settings"
                                    data-weapon-id="{{ $currentGloves['id'] ?? 'gloves' }}"
                                    data-weapon-name="{{ $glovesName }}"
                                    data-skin-id="{{ $currentGloves['skin_id'] ?? '0' }}"
                                    data-skin-name="{{ $glovesName }}" data-rarity-color="{{ $glovesRarityColor }}"
                                    data-skin-image="{{ $glovesImage }}"
                                    data-current-wear="{{ $currentGloves['quality'] ?? 0 }}"
                                    data-current-stattrack="{{ isset($currentKnife['stattrack']) && $currentKnife['stattrack'] ? 'true' : 'false' }}"
                                    data-current-float="{{ $currentGloves['float'] ?? '0.0' }}"
                                    data-current-pattern="{{ $currentGloves['pattern'] ?? '0' }}"
                                    data-current-nametag="{{ $currentGloves['nametag'] ?? '' }}"
                                    title="{{ __('skinchanger.buttons.settings', 'Settings') }}">
                                    <x-icon path="ph.regular.gear" class="icon" />
                                </button>
                            @endif
                            <button class="item-action-btn remove-btn" data-handler="remove-item" data-item-type="glove"
                                data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}"
                                title="{{ __('skinchanger.buttons.remove_item', 'Remove Item') }}">
                                <x-icon path="ph.regular.trash" class="icon" />
                            </button>
                        </div>
                    @endif
                </div>

                <div @class([
                    'special-item-card',
                    'has-image' => $knifeImage !== null,
                    'has-skin' => $hasKnifeSkin,
                ]) data-handler="special-item-card" data-item-type="knives"
                    data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}"
                    style="--rarity-color: {{ $knifeRarityColor }};">

                    <div class="item-icon">
                        @if ($knifeImage)
                            <img src="{{ $knifeImage }}" alt="{{ $knifeName }}" class="item-image"
                                loading="lazy">
                        @else
                            <img src="{{ asset('assets/img/weapons/weapon_knife' . ($currentTeam === 'ct' ? '' : '_t') . '.webp') }}"
                                alt="{{ $knifeName }}" class="item-image" loading="lazy">
                        @endif
                    </div>
                    <div class="item-name">{{ $knifeName }}</div>
                    @if ($currentKnife && (is_array($currentKnife) && $currentKnife['id'] !== '0') && !$hasKnifeSkin)
                        <div class="item-actions">
                            @if (!$isVipRequired || ($hasVipAccess && $isVipRequired))
                                <button class="item-action-btn settings-btn" data-handler="weapon-settings"
                                    data-weapon-id="{{ $currentKnife['id'] ?? 'knife' }}"
                                    data-weapon-name="{{ $knifeName }}"
                                    data-skin-id="{{ $currentKnife['skin_id'] ?? '0' }}"
                                    data-skin-name="{{ $knifeName }}" data-rarity-color="{{ $knifeRarityColor }}"
                                    data-skin-image="{{ $knifeImage }}"
                                    data-current-wear="{{ $currentKnife['quality'] ?? 0 }}"
                                    data-current-stattrack="{{ isset($currentKnife['stattrack']) && $currentKnife['stattrack'] ? 'true' : 'false' }}"
                                    data-current-float="{{ $currentKnife['float'] ?? '0.0' }}"
                                    data-current-pattern="{{ $currentKnife['pattern'] ?? '0' }}"
                                    data-current-nametag="{{ $currentKnife['nametag'] ?? '' }}"
                                    title="{{ __('skinchanger.buttons.settings', 'Settings') }}">
                                    <x-icon path="ph.regular.gear" class="icon" />
                                </button>
                            @endif
                            <button class="item-action-btn remove-btn" data-handler="remove-item" data-item-type="knife"
                                data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}"
                                title="{{ __('skinchanger.buttons.remove_item', 'Remove Item') }}">
                                <x-icon path="ph.regular.trash" class="icon" />
                            </button>
                        </div>
                    @endif
                </div>

                <div @class(['special-item-card', 'has-image' => $coinImage !== null]) data-handler="special-item-card" data-item-type="coins"
                    data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}">
                    <div class="item-icon">
                        @if ($coinImage)
                            <img src="{{ $coinImage }}" alt="{{ $coinName }}" class="item-image"
                                loading="lazy">
                        @else
                            <x-icon path="ph.regular.coin" class="icon" />
                        @endif
                    </div>
                    <div class="item-name">{{ $coinName }}</div>
                    @if ($currentCoin && $coinImage)
                        <div class="item-actions">
                            <button class="item-action-btn remove-btn" data-handler="remove-item"
                                data-item-type="coin" data-team="{{ $currentTeam }}"
                                data-server-id="{{ $selectedServerId }}"
                                title="{{ __('skinchanger.buttons.remove_item', 'Remove Item') }}">
                                <x-icon path="ph.regular.trash" class="icon" />
                            </button>
                        </div>
                    @endif
                </div>

                <div @class(['special-item-card', 'has-image' => $musicImage !== null]) data-handler="special-item-card" data-item-type="music"
                    data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}">
                    <div class="item-icon">
                        @if ($musicImage)
                            <img src="{{ $musicImage }}" alt="{{ $musicName }}" class="item-image"
                                loading="lazy">
                        @else
                            <x-icon path="ph.regular.music-note" class="icon" />
                        @endif
                    </div>
                    <div class="item-name">{{ $musicName }}</div>
                    @if ($currentMusic && $musicImage)
                        <div class="item-actions">
                            <button class="item-action-btn remove-btn" data-handler="remove-item"
                                data-item-type="music" data-team="{{ $currentTeam }}"
                                data-server-id="{{ $selectedServerId }}"
                                title="{{ __('skinchanger.buttons.remove_item', 'Remove Item') }}">
                                <x-icon path="ph.regular.trash" class="icon" />
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="sidebar-section community-section">
            <h3 class="section-title">{{ __('skinchanger.community.title', 'Community Loadouts') }}</h3>
            <div class="community-loadouts">
                <div class="coming-soon-notice">
                    <x-icon path="ph.regular.clock" class="icon" />
                    <span>{{ __('skinchanger.loadouts.coming_soon', 'Coming soon') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="skins-main">
        <div class="weapons-search-container">
            <div class="search-input-wrapper">
                <x-fields.input type="text" name="weapon_search" class="weapon-search-input"
                    placeholder="{{ __('skinchanger.search.weapon_search', 'Search weapons...') }}"
                    data-handler="weapon-search" />
                <x-icon path="ph.regular.magnifying-glass" class="search-icon" />
                <button class="clear-search-btn" data-handler="clear-weapon-search" style="display: none;">
                    <x-icon path="ph.regular.x" class="icon" />
                </button>
            </div>
        </div>

        <div class="weapons-grid" id="weapons-grid">
            @php
                $teamIndex = $currentTeam === 'ct' ? 0 : 1;
                $playerSkins = $teamData['skins'] ?? [];
                $allWeapons = $weaponList;

                $weaponCategories = [
                    'pistol' => [1, 2, 3, 4, 30, 31, 32, 36, 61, 63, 64],
                    'rifle' => [7, 8, 10, 13, 16, 39, 60],
                    'sniper' => [9, 11, 38, 40],
                    'smg' => [17, 19, 24, 26, 33, 34],
                    'shotgun' => [25, 27, 29, 35],
                    'lmg' => [14, 28],
                    'grenade' => [43, 44, 45, 46, 47, 48],
                    'knife' => [42, 59, 500, 503, 505, 506, 507, 508, 509, 512, 514, 515, 516, 517, 518, 519, 520, 521],
                    'gloves' => [5027, 5028, 5029, 5030, 5031, 5032, 5033, 5034],
                ];

                $categoryNames = [
                    'pistol' => __('skinchanger.categories.pistols', 'Pistols'),
                    'rifle' => __('skinchanger.categories.rifles', 'Rifles'),
                    'sniper' => __('skinchanger.categories.snipers', 'Sniper Rifles'),
                    'smg' => __('skinchanger.categories.smgs', 'SMGs'),
                    'shotgun' => __('skinchanger.categories.shotguns', 'Shotguns'),
                    'lmg' => __('skinchanger.categories.lmgs', 'Machine Guns'),
                    'grenade' => __('skinchanger.categories.grenades', 'Grenades'),
                ];

                function getWeaponCategory($weaponIndex, $weaponCategories)
                {
                    foreach ($weaponCategories as $category => $indexes) {
                        if (in_array($weaponIndex, $indexes)) {
                            return $category;
                        }
                    }
                    return 'rifle';
                }

                $weaponsByCategory = [];
                foreach ($allWeapons as $weaponIndex => $weaponId) {
                    $category = getWeaponCategory($weaponIndex, $weaponCategories);
                    if (!in_array($category, ['knife', 'gloves'])) {
                        $weaponsByCategory[$category][] = ['index' => $weaponIndex, 'id' => $weaponId];
                    }
                }

                $categoryOrder = ['rifle', 'pistol', 'sniper', 'smg', 'shotgun', 'lmg', 'grenade'];
                $sortedCategories = [];
                foreach ($categoryOrder as $cat) {
                    if (isset($weaponsByCategory[$cat])) {
                        $sortedCategories[$cat] = $weaponsByCategory[$cat];
                    }
                }
            @endphp

            @foreach ($sortedCategories as $category => $weapons)
                <div class="weapon-category-section" data-category="{{ $category }}">
                    <div class="category-header">
                        <h3 class="category-title">{{ $categoryNames[$category] ?? ucfirst($category) }}</h3>
                        <div class="category-divider"></div>
                    </div>

                    <div class="category-weapons">
                        @foreach ($weapons as $weapon)
                            @php
                                $weaponIndex = $weapon['index'];
                                $weaponId = $weapon['id'];
                                $weaponSkin = $playerSkins[$weaponIndex] ?? null;
                                $hasCustomSkin =
                                    $weaponSkin && isset($weaponSkin['skin_id']) && $weaponSkin['skin_id'] > 0;

                                $weaponImagePath = $skinchangerManager->getWeaponImagePath($weaponId);
                                $weaponDisplayName = $skinchangerManager->getWeaponDisplayName($weaponId);
                                $weaponShortName = $skinchangerManager->getWeaponShortName($weaponId);

                                $displaySkinName = 'Default';
                                $skinImagePath = $weaponImagePath;
                                if ($hasCustomSkin) {
                                    $displaySkinName = $skinchangerManager->normaliseName(
                                        $weaponSkin['skin_name'] ?? 'Unknown Skin',
                                    );
                                    $skinImagePath = $weaponSkin['skin_image'] ?? $weaponImagePath;
                                }

                                $qualityClass = 'factory-new';
                                if ($hasCustomSkin && isset($weaponSkin['quality'])) {
                                    $qualityNames = [
                                        'factory-new',
                                        'minimal-wear',
                                        'field-tested',
                                        'well-worn',
                                        'battle-scarred',
                                    ];
                                    $qualityClass = $qualityNames[$weaponSkin['quality']] ?? 'factory-new';
                                }

                                $rarityColor = '#b0c3d9'; // default
                                if ($hasCustomSkin && isset($weaponSkin['skin_rarity_col'])) {
                                    $rarityColor = $weaponSkin['skin_rarity_col'];
                                }
                            @endphp

                            <div class="weapon-card {{ $hasCustomSkin ? 'has-skin' : '' }}"
                                data-handler="weapon-card" data-weapon-id="{{ $weaponIndex }}"
                                data-weapon-name="{{ $weaponShortName }}" data-category="{{ $category }}"
                                data-team="{{ $currentTeam }}" data-server-id="{{ $selectedServerId }}"
                                data-has-skin="{{ $hasCustomSkin ? 'true' : 'false' }}"
                                data-skin-id="{{ $hasCustomSkin ? $weaponSkin['skin_id'] ?? '0' : '0' }}"
                                data-skin-name="{{ $hasCustomSkin ? $displaySkinName : '' }}"
                                style="--rarity-color: {{ $rarityColor }};">

                                @if ($hasCustomSkin)
                                    <span class="rarity-badge" style="background: {{ $rarityColor }};"></span>

                                    <div class="weapon-actions">
                                        @if (!$isVipRequired || ($hasVipAccess && $isVipRequired))
                                            <button class="weapon-action-btn settings-btn"
                                                data-handler="weapon-settings" data-weapon-id="{{ $weaponIndex }}"
                                                data-weapon-name="{{ $weaponShortName }}"
                                                data-skin-id="{{ $weaponSkin['skin_id'] ?? '0' }}"
                                                data-skin-name="{{ $displaySkinName }}"
                                                data-rarity-color="{{ $rarityColor }}"
                                                data-skin-image="{{ $skinImagePath }}"
                                                data-current-wear="{{ $weaponSkin['quality'] ?? 0 }}"
                                                data-current-stattrack="{{ isset($weaponSkin['stattrack']) && $weaponSkin['stattrack'] ? 'true' : 'false' }}"
                                                data-current-float="{{ $weaponSkin['float'] ?? '0.0' }}"
                                                data-current-pattern="{{ $weaponSkin['pattern'] ?? '0' }}"
                                                data-current-nametag="{{ $weaponSkin['nametag'] ?? '' }}"
                                                title="{{ __('skinchanger.buttons.settings', 'Settings') }}">
                                                <x-icon path="ph.regular.gear" class="icon" />
                                            </button>
                                        @endif
                                        <button class="weapon-action-btn remove-btn" data-handler="remove-weapon-skin"
                                            data-weapon-id="{{ $weaponIndex }}"
                                            data-server-id="{{ $selectedServerId }}"
                                            data-team="{{ $currentTeam === 'ct' ? 0 : 1 }}"
                                            title="{{ __('skinchanger.buttons.remove_skin', 'Remove Skin') }}">
                                            <x-icon path="ph.regular.trash" class="icon" />
                                        </button>
                                    </div>
                                @endif

                                <div class="weapon-content">
                                    <div class="weapon-image">
                                        <img src="{{ $skinImagePath }}" alt="{{ $weaponDisplayName }}"
                                            class="weapon-img" loading="lazy">
                                    </div>
                                    <div class="weapon-info">
                                        @if ($hasCustomSkin)
                                            <div class="weapon-name">{{ $weaponDisplayName }}</div>
                                            <div class="skin-name">
                                                {{ $displaySkinName }}
                                            </div>
                                            {{-- @if (isset($weaponSkin['nametag']) && !empty($weaponSkin['nametag']))
                                                <div class="weapon-nametag">"{{ $weaponSkin['nametag'] }}"</div>
                                            @endif --}}
                                        @else
                                            <div class="add-skin-text">
                                                {{ __('skinchanger.weapon.add_skin', ['weapon' => $weaponDisplayName]) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if ($hasCustomSkin)
                                    <div class="weapon-attachments">
                                        {{-- Stickers Preview --}}
                                        @if (isset($weaponSkin['stickers_data']) && !empty($weaponSkin['stickers_data']))
                                            <div class="weapon-stickers-preview">
                                                @foreach ($weaponSkin['stickers_data'] as $slot => $stickerData)
                                                    <div class="weapon-sticker-mini"
                                                        title="{{ $stickerData['name'] ?? 'Unknown Sticker' }}">
                                                        @if (isset($stickerData['image']) && $stickerData['image'])
                                                            <img src="{{ $stickerData['image'] }}"
                                                                alt="{{ $stickerData['name'] }}" loading="lazy">
                                                        @else
                                                            <div class="sticker-placeholder">S</div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        {{-- Keychain Preview --}}
                                        @if (isset($weaponSkin['keychain_data']) && $weaponSkin['keychain_data'])
                                            <div class="weapon-keychain-preview"
                                                title="{{ $weaponSkin['keychain_data']['name'] ?? 'Unknown Keychain' }}">
                                                @if (isset($weaponSkin['keychain_data']['image']) && $weaponSkin['keychain_data']['image'])
                                                    <img src="{{ $weaponSkin['keychain_data']['image'] }}"
                                                        alt="{{ $weaponSkin['keychain_data']['name'] }}"
                                                        loading="lazy">
                                                @else
                                                    <div class="keychain-placeholder">K</div>
                                                @endif
                                            </div>
                                        @endif

                                        {{-- StatTrak, Pattern, Float badges --}}
                                        <div class="weapon-badges">
                                            @if (isset($weaponSkin['stattrack']) && $weaponSkin['stattrack'])
                                                <div class="weapon-badge stattrack-badge" title="StatTrak™">ST</div>
                                            @endif
                                            {{-- @if (isset($weaponSkin['pattern']) && $weaponSkin['pattern'] !== '0' && !empty($weaponSkin['pattern']))
                                                <div class="weapon-badge pattern-badge" title="Pattern: {{ $weaponSkin['pattern'] }}">P{{ $weaponSkin['pattern'] }}</div>
                                            @endif --}}
                                            @if (isset($weaponSkin['float']) && $weaponSkin['float'] !== '0.0')
                                                @php
                                                    $float = (float) $weaponSkin['float'];
                                                    $floatClass = '';
                                                    if ($float <= 0.07) {
                                                        $floatClass = 'fn';
                                                    } elseif ($float <= 0.15) {
                                                        $floatClass = 'mw';
                                                    } elseif ($float <= 0.38) {
                                                        $floatClass = 'ft';
                                                    } elseif ($float <= 0.45) {
                                                        $floatClass = 'ww';
                                                    } else {
                                                        $floatClass = 'bs';
                                                    }
                                                @endphp
                                                <div class="weapon-badge float-badge {{ $floatClass }}"
                                                    title="Float: {{ number_format($float, 4) }}">
                                                    {{ $floatClass }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if (!$hasCustomSkin)
                                    <x-icon path="ph.regular.plus" class="add-skin-icon" />
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
