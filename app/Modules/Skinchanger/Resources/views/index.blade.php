@extends('flute::layouts.app')

@section('title', __('skinchanger.title'))

@push('head')
    @at(path('app/Modules/Skinchanger/Resources/assets/js/utils.js'))
    @at(path('app/Modules/Skinchanger/Resources/assets/js/modal-manager.js'))
    @at(path('app/Modules/Skinchanger/Resources/assets/js/filter-manager.js'))
    @at(path('app/Modules/Skinchanger/Resources/assets/js/skin-manager.js'))
    @at(path('app/Modules/Skinchanger/Resources/assets/js/special-items-manager.js'))
    @at(path('app/Modules/Skinchanger/Resources/assets/js/weapon-settings-manager.js'))
    @at(path('app/Modules/Skinchanger/Resources/assets/js/skinchanger-manager.js'))
@endpush

@push('content')
    <div class="container skins-container">
        <div class="skins-header">
            {{-- <div class="skins-loadout-selector disabled">
                <div class="loadout-dropdown disabled">
                    <button class="loadout-button disabled" id="loadout-dropdown" disabled>
                        <span>{{ __('skinchanger.loadouts.current', 'Current Loadout') }}</span>
                        <x-icon path="ph.regular.caret-down" class="icon" />
                    </button>
                </div>
                <button class="loadout-add disabled" title="{{ __('skinchanger.loadouts.add_new', 'Add new loadout') }}"
                    disabled>
                    <x-icon path="ph.regular.plus" class="icon" />
                </button>
                <span class="disabled-notice">{{ __('skinchanger.loadouts.coming_soon', 'Coming soon') }}</span>
            </div> --}}
        </div>

        <div class="skins-teams">
            <button class="skins-team-button {{ request()->input('team', 'ct') === 'ct' ? 'active' : '' }}"
                hx-get="{{ route('skinchanger.index') }}?team=ct&server_id={{ $selectedServerId }}" hx-target=".skins-content"
                hx-swap="outerHTML" hx-push-url="true" data-handler="team-button" data-team="ct">
                @include('skinchanger::components.team-icon', ['team' => 'ct'])
                {{ __('skinchanger.teams.ct', 'CT') }}
            </button>
            <button class="skins-team-button {{ request()->input('team', 'ct') === 't' ? 'active' : '' }}"
                hx-get="{{ route('skinchanger.index') }}?team=t&server_id={{ $selectedServerId }}"
                hx-target=".skins-content" hx-push-url="true" hx-swap="outerHTML" data-handler="team-button" data-team="t">
                @include('skinchanger::components.team-icon', ['team' => 't'])
                {{ __('skinchanger.teams.t', 'T') }}
            </button>

            <div class="skins-actions">
                <x-button type="outline-primary" class="skins-copy-button" data-handler="copy-to-opposite-team"
                    data-team="{{ request()->input('team', 'ct') }}" data-server-id="{{ $selectedServerId }}"
                    data-tooltip="{{ __('skinchanger.buttons.copy_to_opposite') }}">
                    <x-icon path="ph.regular.copy" class="icon" />
                </x-button>
                <x-button type="outline-error" class="skins-reset-button" data-handler="reset-all-skins"
                    data-team="{{ request()->input('team', 'ct') }}" data-server-id="{{ $selectedServerId }}">
                    <x-icon path="ph.regular.arrow-counter-clockwise" class="icon" />
                    {{ __('skinchanger.buttons.reset_all', 'Reset All') }}
                </x-button>
            </div>
        </div>

        @include('skinchanger::partials.content')
    </div>

    <script>
        window.skinchangerData = {
            currentTeam: '{{ request()->input('team', 'ct') }}',
            serverId: {{ $selectedServerId }},
            weaponList: @json($weaponList),
            qualityList: @json($qualityList),
            playerData: @json($playerData),
            routes: {
                index: '{{ route('skinchanger.index') }}',
                getItems: '{{ route('skinchanger.get_items', ['type' => 'PLACEHOLDER']) }}',
                getWeaponTypes: '{{ route('skinchanger.get_weapon_types', ['category' => 'PLACEHOLDER']) }}',
                getWeaponSkins: '{{ route('skinchanger.get_weapon_skins', ['weaponId' => 'PLACEHOLDER']) }}',
                saveSkin: '{{ route('skinchanger.save_skin') }}',
                saveItem: '{{ route('skinchanger.save_item') }}',
                removeSkin: '{{ route('skinchanger.remove_skin') }}',
                removeItem: '{{ route('skinchanger.remove_item') }}',
                resetAllSkins: '{{ route('skinchanger.reset_all_skins') }}',
                copyToOppositeTeam: '{{ route('skinchanger.copy_to_opposite_team') }}',
                updateWeaponSetting: '{{ route('skinchanger.apply_skin_settings') }}'
            },
            messages: {
                confirmRemoveSkin: @json(__('skinchanger.confirm.remove_skin', 'Are you sure you want to remove this skin?')),
                confirmRemoveItem: @json(__('skinchanger.confirm.remove_item', 'Are you sure you want to remove this {item}?')),
                confirmResetAllSkins: @json(__(
                        'skinchanger.confirm.reset_all_skins',
                        'Are you sure you want to reset ALL skins for this team? This action cannot be undone.')),
                confirmCopyToOpposite: @json(__(
                        'skinchanger.confirm.copy_to_opposite',
                        'Are you sure you want to copy all skins from {source} to {team}? This will overwrite existing skins on the {team} team.')),
                skinRemoved: @json(__('skinchanger.messages.skin_removed', 'Skin removed successfully')),
                itemRemoved: @json(__('skinchanger.messages.item_removed', '{item} removed successfully')),
                allSkinsReset: @json(__('skinchanger.messages.all_skins_reset', 'All skins reset successfully')),
                skinsCopied: @json(__('skinchanger.messages.skins_copied', 'Skins copied to {team} team successfully')),
                skinEquipped: @json(__('skinchanger.messages.skin_equipped', 'Equipped {skin}')),
                itemEquipped: @json(__('skinchanger.messages.item_equipped', 'Equipped {item}')),
                appliedToTeam: @json(__('skinchanger.messages.applied_to_team', 'Applied skin to {team} team')),
                appliedToBothTeams: @json(__('skinchanger.messages.applied_to_both_teams', 'Applied skin to both teams')),
                appliedToOneTeam: @json(__('skinchanger.messages.applied_to_one_team', 'Applied skin to one team only')),
                failedToApply: @json(__('skinchanger.messages.failed_to_apply', 'Failed to apply skin')),
                failedToRemove: @json(__('skinchanger.messages.failed_to_remove', 'Failed to remove {item}')),
                failedToReset: @json(__('skinchanger.messages.failed_to_reset', 'Failed to reset skins')),
                failedToCopy: @json(__('skinchanger.messages.failed_to_copy', 'Failed to copy skins')),
                failedToSave: @json(__('skinchanger.messages.failed_to_save', 'Failed to save {item}')),
                errorOccurred: @json(__('skinchanger.messages.error_occurred', 'An error occurred')),
                loadingError: @json(__('skinchanger.messages.loading_error', 'Failed to load {item}. Please try again.')),
                noItemsFound: @json(__('skinchanger.messages.no_items_found', 'No items found')),
                searchPlaceholder: @json(__('skinchanger.search.placeholder', 'Search...')),
                teamCT: @json(__('skinchanger.teams.ct', 'CT')),
                teamT: @json(__('skinchanger.teams.t', 'T')),
                noWeaponsFound: @json(__('skinchanger.messages.noWeaponsFound', 'No weapons found matching your search')),
                weaponSearchPlaceholder: @json(__('skinchanger.search.weapon_search', 'Search weapons...')),
                removeStickerConfirm: @json(__('skinchanger.stickers.remove_confirm', 'Are you sure you want to remove this sticker?')),
                removeCharmConfirm: @json(__('skinchanger.charms.remove_confirm', 'Are you sure you want to remove this charm?')),
                settingsApplied: @json(__('skinchanger.messages.settings_applied', 'Settings applied successfully')),
                settingsApplyError: @json(__('skinchanger.messages.settings_apply_error', 'Failed to apply settings'))
            }
        };
    </script>
@endpush

<x-modal id="skin-modal" title="{{ __('skinchanger.skins.select', 'Select Skin') }}" size="large">
    @include('skinchanger::components.skeletons.skins-modal-skeleton')
</x-modal>

<x-modal id="weapon-modal" title="{{ __('skinchanger.weapons.select', 'Select Weapon Type') }}" size="large">
    @include('skinchanger::components.skeletons.weapon-modal-skeleton')
</x-modal>

<x-modal id="community-modal" title="{{ __('skinchanger.community.title', 'Community Loadouts') }}" size="large" />

<x-modal id="special-items-modal" title="{{ __('skinchanger.items.select', 'Select Item') }}" size="large">
    @include('skinchanger::components.skeletons.default-modal-skeleton')
</x-modal>

<x-modal id="loadout-preview-modal" title="{{ __('skinchanger.loadouts.preview', 'Loadout Preview') }}"
    size="large" />

<x-modal id="skin-settings-modal" title="{{ __('skinchanger.settings.title', 'Skin Settings') }}" size="medium">
    @include('skinchanger::components.skeletons.skin-settings-skeleton')
</x-modal>
