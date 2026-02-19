@props([
    'stickers',
    'search' => '',
    'weaponIndex',
    'skinId',
    'slotIndex',
    'serverId',
    'team',
    'total' => 0,
    'page' => 1,
    'pages' => 1,
    'hasMore' => false,
])

<div class="stickers-sidebar__main" data-remove-handler>
    <header class="right_sidebar__header">
        <h5 class="right_sidebar__title">
            {{ __('skinchanger.stickers.title') }}
        </h5>
        <button class="right_sidebar__close" aria-label="Close modal" data-a11y-dialog-hide="right-sidebar"
            data-handler="close-modal" data-modal="right-sidebar" onclick="closeModal('right-sidebar')"
            data-original-tabindex="null"></button>
    </header>

    <div class="stickers-sidebar__content">
        <div class="stickers-sidebar__search-container">
            <div class="stickers-sidebar__search">
                <div class="search-input-wrapper">
                    <x-fields.input type="text" name="sticker_search"
                        placeholder="{{ __('skinchanger.stickers.search') }}" value="{{ $search }}"
                        data-handler="sticker-search" data-weapon-index="{{ $weaponIndex }}"
                        data-skin-id="{{ $skinId }}" data-slot-index="{{ $slotIndex }}"
                        data-server-id="{{ $serverId }}" data-team="{{ $team }}" autocomplete="off" />
                    <x-icon path="ph.regular.magnifying-glass" class="search-icon" />
                </div>
            </div>

            <div class="stickers-sidebar__count">
                {{ __('skinchanger.stickers.found', ['count' => $total]) }}
            </div>
        </div>

        <div class="stickers-sidebar__grid" id="stickers-grid">
            @if (count($stickers) > 0)
                <div class="sticker-item sticker-item--remove" data-handler="remove-sticker-selection"
                    data-weapon-index="{{ $weaponIndex }}" data-skin-id="{{ $skinId }}"
                    data-slot-index="{{ $slotIndex }}" data-server-id="{{ $serverId }}"
                    data-team="{{ $team }}">

                    <div class="sticker-item__image">
                        <div class="sticker-item__remove-icon">
                            <x-icon path="ph.regular.x" />
                        </div>
                    </div>

                    <div class="sticker-item__info">
                        <div class="sticker-item__name">
                            {{ __('skinchanger.buttons.remove_sticker', 'Remove Sticker') }}
                        </div>
                    </div>
                </div>

                @foreach ($stickers as $sticker)
                    <div class="sticker-item" data-handler="select-sticker"
                        data-sticker-id="{{ str_replace('sticker-', '', $sticker['id'] ?? '') }}"
                        data-sticker-name="{{ $sticker['name'] ?? '' }}"
                        data-sticker-image="{{ $sticker['image'] ?? '' }}" data-weapon-index="{{ $weaponIndex }}"
                        data-skin-id="{{ $skinId }}" data-slot-index="{{ $slotIndex }}"
                        data-server-id="{{ $serverId }}" data-team="{{ $team }}"
                        @if (isset($sticker['rarity']['color'])) style="--rarity-color: {{ $sticker['rarity']['color'] }}" @endif>

                        <div class="sticker-item__image">
                            @if (!empty($sticker['image']))
                                <img src="{{ $sticker['image'] }}" alt="{{ $sticker['name'] ?? '' }}" loading="lazy">
                            @else
                                <div class="sticker-item__no-image">
                                    <x-icon path="ph.regular.image" />
                                </div>
                            @endif
                        </div>

                        <div class="sticker-item__info">
                            <div class="sticker-item__name">
                                {{ $sticker['name'] ?? 'Unknown Sticker' }}
                            </div>
                            {{-- @if (isset($sticker['rarity']))
                                <div class="sticker-item__rarity"
                                    style="color: {{ $sticker['rarity']['color'] ?? '#b0c3d9' }}">
                                    {{ $sticker['rarity']['name'] ?? 'Common' }}
                                </div>
                            @endif --}}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="stickers-sidebar__empty">
                    <div class="stickers-sidebar__empty-icon h1">
                        <x-icon path="ph.regular.smiley-sad" />
                    </div>
                    <div class="stickers-sidebar__empty-text">
                        @if (!empty($search))
                            {{ __('skinchanger.stickers.no_results') }}
                        @else
                            {{ __('skinchanger.stickers.no_stickers') }}
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if ($hasMore && $page < $pages)
            <div class="sidebar-load-more" style="display: none;">
                <x-button type="outline-primary" data-handler="load-more-stickers" data-page="{{ $page + 1 }}"
                    data-weapon-index="{{ $weaponIndex }}" data-skin-id="{{ $skinId }}"
                    data-slot-index="{{ $slotIndex }}" data-server-id="{{ $serverId }}"
                    data-team="{{ $team }}" data-search="{{ $search }}">
                    {{ __('skinchanger.buttons.load_more') }}
                </x-button>
            </div>
        @endif
    </div>
</div>
