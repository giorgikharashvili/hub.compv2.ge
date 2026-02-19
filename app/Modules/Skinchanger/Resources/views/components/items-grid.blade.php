<div class="skins-modal-content {{ ($vipOnlyMode ?? false) && !($hasVipAccess ?? false) ? 'skinchanger-vip-only' : '' }}">
    <div class="search-container">
        <div class="search-input-wrapper">
            <x-fields.input name="search" class="search-input"
                placeholder="{{ __('skinchanger.search.placeholder', 'Search items...') }}" value=""
                data-category="{{ $category ?? '' }}" data-team="{{ $team ?? 'ct' }}"
                data-server-id="{{ $serverId ?? '' }}" autocomplete="off" />

            <x-button type="outline-primary" class="clear-filters-button" data-handler="clear-filters">
                <x-icon path="ph.regular.x" class="icon" />
            </x-button>
        </div>

        @if($category === 'coins')
            <div class="rarity-filters" data-category="{{ $category ?? '' }}" data-team="{{ $team ?? 'ct' }}"
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
        @endif
    </div>

    <div class="special-items-grid-container">
        <div class="special-items-grid">
            <div class="no-items-message" style="display: {{ empty($items) ? 'flex' : 'none' }};">
                <div class="no-items-icon">
                    <x-icon path="ph.regular.package" class="icon" />
                </div>
                <p>{{ __('skinchanger.items.no_items', ['category' => $category ?? 'items']) }}</p>
                <p class="no-items-suggestion">
                    <small class="text-muted">
                        {{ __('skinchanger.search.try_different', 'Try different search terms or remove filters.') }}
                    </small>
                </p>
            </div>

            @if (!empty($items))
                <div class="special-item-option default-item has-vip-access" data-handler="special-item-option" data-item-id="0"
                    data-item-name="{{ __('skinchanger.items.default', 'Default') }}" data-item-price="0"
                    data-item-type="{{ $category }}" data-team="{{ $team }}"
                    data-server-id="{{ $serverId }}">
                    <div class="item-image">
                        <div class="item-preview">
                            <div class="default-item-content">
                                <x-icon path="ph.regular.minus-circle" class="default-icon h3" />
                            </div>
                        </div>
                    </div>
                    <div class="item-details">
                        <div class="item-name">{{ __('skinchanger.items.default', 'Default') }}</div>
                    </div>
                </div>

                @foreach ($items as $index => $item)
                    @php
                        $itemId = app('Flute\Modules\Skinchanger\Services\CS2DataService')->getItemId($item, $category);
                        $itemRarityColor = $item['rarity']['color'] ?? '#b0c3d9';
                        $itemRarityName = strtolower($item['rarity']['name'] ?? 'common');
                        $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
                        $hasVipAccessClass = $isVipRequired ? 'vip-restricted' : 'has-vip-access';
                    @endphp
                    <div class="special-item-option {{ $hasVipAccessClass }}" 
                        @if(!$isVipRequired || ($hasVipAccess && $isVipRequired))
                            data-handler="special-item-option"
                        @endif
                        data-item-id="{{ $itemId }}" data-item-name="{{ $item['name'] }}" data-item-price="0"
                        data-item-type="{{ $category }}" data-item-rarity-color="{{ $itemRarityColor }}"
                        data-item-rarity="{{ $itemRarityName }}"
                        data-weapon-id="{{ $item['weapon']['id'] ?? '' }}"
                        data-paint-index="{{ $item['paint_index'] ?? '' }}" data-team="{{ $team }}"
                        data-server-id="{{ $serverId }}" style="--rarity-color: {{ $itemRarityColor }};">

                        <x-skinchanger::vip-tooltip :vip-only-mode="$vipOnlyMode" :has-vip-access="$hasVipAccess" />

                        @if ($category !== 'agents')
                            <x-skinchanger::team-action-menu :index="$index" :item-id="$itemId" :item-type="$category" />
                        @else
                            @php
                                $agentTeamRestriction = null;
                                if ($team === 'ct') {
                                    $agentTeamRestriction = 'ct';
                                } elseif ($team === 't') {
                                    $agentTeamRestriction = 't';
                                }
                            @endphp
                            <x-skinchanger::team-action-menu :index="$index" :item-id="$itemId" :item-type="$category"
                                :team-restriction="$agentTeamRestriction" />
                        @endif

                        <span class="rarity-badge" style="color: {{ $itemRarityColor }};"></span>

                        <div class="item-image">
                            <div class="item-preview">
                                @if ($item['image'])
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" loading="lazy"
                                        onerror="this.parentElement.innerHTML='<span class=\'item-placeholder\'>{{ addslashes($item['name']) }}</span>';">
                                @else
                                    <span class="item-placeholder">{{ $item['name'] }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="item-details">
                            <div class="item-name" title="{{ $item['name'] }}">{{ $item['name'] }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
