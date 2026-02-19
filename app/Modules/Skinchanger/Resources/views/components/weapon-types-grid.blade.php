<div class="weapon-types-modal-content">
    <div class="weapon-types-grid-container">
        <div class="weapon-types-grid">
            @if (!empty($weaponTypes))
                @foreach ($weaponTypes as $weaponId => $weaponName)
                    @php
                        $weaponImagePath = app(
                            \Flute\Modules\Skinchanger\Services\SkinchangerManager::class,
                        )->getWeaponImagePath($weaponId);
                    @endphp

                    <div class="weapon-type-option" data-handler="weapon-type-option"
                        data-weapon-id="{{ $weaponId }}" data-weapon-name="{{ $weaponName }}"
                        data-category="{{ $category }}" data-team="{{ $team }}"
                        data-server-id="{{ $serverId }}">
                        <div class="weapon-type-image">
                            <img src="{{ $weaponImagePath }}" alt="{{ $weaponName }}" loading="lazy">
                        </div>
                        <div class="weapon-type-info">
                            <div class="weapon-type-name">{{ $weaponName }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-items-message">
                    <div class="no-items-icon">
                        <x-icon path="ph.regular.smiley-sad" class="icon" />
                    </div>
                    <p>{{ __('skinchanger.search.no_weapon_types', 'No weapon types available') }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
