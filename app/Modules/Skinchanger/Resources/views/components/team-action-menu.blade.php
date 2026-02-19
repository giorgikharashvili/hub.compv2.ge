@props([
    'index',
    'weaponId' => null,
    'weaponIndex' => null,
    'skinId' => null,
    'itemId' => null,
    'itemType' => null,
    'paintIndex' => null,
    'teamRestriction' => null, // 'ct', 't', or null for no restriction
])

@php
    $isAgentWithRestriction = false;
    $restrictedTeam = null;

    if ($itemType === 'agent' || $itemType === 'agents') {
        $isAgentWithRestriction = !empty($teamRestriction);
        $restrictedTeam = $teamRestriction;
    }
@endphp

@if (!$isAgentWithRestriction)
    <div class="item-actions-menu">
        <button class="item-menu-trigger" data-dropdown-open="__item_menu_{{ $weaponIndex }}_{{ $index }}"
            data-dropdown-hover="true">
            <x-icon path="ph.regular.dots-three-vertical" class="icon" />
        </button>
        <div class="item-actions-dropdown" data-dropdown="__item_menu_{{ $weaponIndex }}_{{ $index }}">
            @if (!$isAgentWithRestriction)
                <a class="action-button" data-handler="apply-skin-team" data-target-team="both"
                    @if ($weaponIndex) data-weapon-index="{{ $weaponIndex }}" @endif
                    @if ($weaponId) data-weapon-id="{{ $weaponId }}" @endif
                    @if ($skinId) data-skin-id="{{ $skinId }}" @endif
                    @if ($itemId) data-item-id="{{ $itemId }}" @endif
                    @if ($itemType) data-item-type="{{ $itemType }}" @endif
                    @if ($paintIndex) data-paint-index="{{ $paintIndex }}" @endif>
                    <x-skinchanger::team-icon team="both" />
                    {{ __('skinchanger.teams.both', 'Both Teams') }}
                </a>
            @endif

            @if (!$isAgentWithRestriction || $restrictedTeam !== 't')
                <a class="action-button" data-handler="apply-skin-team" data-target-team="ct"
                    @if ($weaponIndex) data-weapon-index="{{ $weaponIndex }}" @endif
                    @if ($weaponId) data-weapon-id="{{ $weaponId }}" @endif
                    @if ($skinId) data-skin-id="{{ $skinId }}" @endif
                    @if ($itemId) data-item-id="{{ $itemId }}" @endif
                    @if ($itemType) data-item-type="{{ $itemType }}" @endif
                    @if ($paintIndex) data-paint-index="{{ $paintIndex }}" @endif>
                    <x-skinchanger::team-icon team="ct" />
                    {{ __('skinchanger.teams.ct_only', 'CT Only') }}
                </a>
            @endif

            @if (!$isAgentWithRestriction || $restrictedTeam !== 'ct')
                <a class="action-button" data-handler="apply-skin-team" data-target-team="t"
                    @if ($weaponIndex) data-weapon-index="{{ $weaponIndex }}" @endif
                    @if ($weaponId) data-weapon-id="{{ $weaponId }}" @endif
                    @if ($skinId) data-skin-id="{{ $skinId }}" @endif
                    @if ($itemId) data-item-id="{{ $itemId }}" @endif
                    @if ($itemType) data-item-type="{{ $itemType }}" @endif
                    @if ($paintIndex) data-paint-index="{{ $paintIndex }}" @endif>
                    <x-skinchanger::team-icon team="t" />
                    {{ __('skinchanger.teams.t_only', 'T Only') }}
                </a>
            @endif
        </div>
    </div>
@endif
