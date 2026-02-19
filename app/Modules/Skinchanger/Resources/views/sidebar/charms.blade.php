@props([
    'charms',
    'search' => '',
    'weaponIndex',
    'skinId',
    'serverId',
    'team',
    'total' => 0,
    'page' => 1,
    'pages' => 1,
    'hasMore' => false,
])

<div class="charms-sidebar__main" data-remove-handler>
    <header class="right_sidebar__header">
        <h5 class="right_sidebar__title">
            {{ __('skinchanger.charms.title') }}
        </h5>
        <button class="right_sidebar__close" aria-label="Close modal" data-a11y-dialog-hide="right-sidebar"
            data-handler="close-modal" data-modal="right-sidebar" onclick="closeModal('right-sidebar')"
            data-original-tabindex="null"></button>
    </header>

    <div class="charms-sidebar__content">
        <div class="charms-sidebar__search-container">
            <div class="charms-sidebar__search">
                <div class="search-input-wrapper">
                    <x-fields.input type="text" name="charm_search"
                        placeholder="{{ __('skinchanger.charms.search') }}" value="{{ $search }}"
                        data-handler="charm-search" data-weapon-index="{{ $weaponIndex }}"
                        data-skin-id="{{ $skinId }}" data-server-id="{{ $serverId }}"
                        data-team="{{ $team }}" autocomplete="off" />
                    <x-icon path="ph.regular.magnifying-glass" class="search-icon" />
                </div>
            </div>

            <div class="charms-sidebar__count">
                {{ __('skinchanger.charms.found', ['count' => $total]) }}
            </div>
        </div>

        <div class="charms-sidebar__grid" id="charms-grid">
            @if (count($charms) > 0)
                <div class="charm-item charm-item--remove" data-handler="remove-charm-selection"
                    data-weapon-index="{{ $weaponIndex }}" data-skin-id="{{ $skinId }}"
                    data-server-id="{{ $serverId }}" data-team="{{ $team }}">

                    <div class="charm-item__image">
                        <div class="charm-item__remove-icon">
                            <x-icon path="ph.regular.x" />
                        </div>
                    </div>

                    <div class="charm-item__info">
                        <div class="charm-item__name">
                            {{ __('skinchanger.buttons.remove_charm', 'Remove Charm') }}
                        </div>
                    </div>
                </div>

                @foreach ($charms as $charm)
                    <div class="charm-item" data-handler="select-charm"
                        data-charm-id="{{ str_replace('keychain-', '', $charm['id'] ?? '') }}"
                        data-charm-name="{{ $charm['name'] ?? '' }}" data-charm-image="{{ $charm['image'] ?? '' }}"
                        data-weapon-index="{{ $weaponIndex }}" data-skin-id="{{ $skinId }}"
                        data-server-id="{{ $serverId }}" data-team="{{ $team }}"
                        @if (isset($charm['rarity']['color'])) style="--rarity-color: {{ $charm['rarity']['color'] }}" @endif>

                        <div class="charm-item__image">
                            @if (!empty($charm['image']))
                                <img src="{{ $charm['image'] }}" alt="{{ $charm['name'] ?? '' }}" loading="lazy">
                            @else
                                <div class="charm-item__no-image">
                                    <x-icon path="ph.regular.image" />
                                </div>
                            @endif
                        </div>

                        <div class="charm-item__info">
                            <div class="charm-item__name">
                                {{ $charm['name'] ?? 'Unknown Charm' }}
                            </div>
                            {{-- @if (isset($charm['rarity']))
                                <div class="charm-item__rarity"
                                    style="color: {{ $charm['rarity']['color'] ?? '#b0c3d9' }}">
                                    {{ $charm['rarity']['name'] ?? 'Common' }}
                                </div>
                            @endif --}}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="charms-sidebar__empty">
                    <div class="charms-sidebar__empty-icon h1">
                        <x-icon path="ph.regular.smiley-sad" />
                    </div>
                    <div class="charms-sidebar__empty-text">
                        @if (!empty($search))
                            {{ __('skinchanger.charms.no_results') }}
                        @else
                            {{ __('skinchanger.charms.no_charms') }}
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if ($hasMore && $page < $pages)
            <div class="sidebar-load-more" style="display: none;">
                <x-button type="outline-primary" data-handler="load-more-charms" data-page="{{ $page + 1 }}"
                    data-weapon-index="{{ $weaponIndex }}" data-skin-id="{{ $skinId }}"
                    data-server-id="{{ $serverId }}" data-team="{{ $team }}"
                    data-search="{{ $search }}">
                    {{ __('skinchanger.buttons.load_more') }}
                </x-button>
            </div>
        @endif
    </div>
</div>
