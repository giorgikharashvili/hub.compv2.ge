@props([
    'weaponId',
    'weaponName',
    'skinId',
    'skinName',
    'skinImage',
    'rarityColor',
    'rarityName',
    'serverId',
    'currentTeam',
    'currentWear' => 0,
    'currentStatTrak' => false,
    'currentFloat' => '0.0',
    'currentPattern' => '0',
    'currentNametag' => '',
    'currentStickers' => [],
    'currentCharms' => [],
    'isSpecialItem' => false,
])

<div class="skin-settings-modal-content">
    <div class="weapon-preview-section">
        <div class="weapon-showcase">
            <div class="weapon-image">
                <img src="{{ $skinImage }}" alt="{{ $skinName }}" loading="lazy">
                <div class="rarity-glow" style="--rarity-color: {{ $rarityColor }};"></div>
            </div>
        </div>

        <div class="weapon-attachments">
            @if (!$isSpecialItem)
                <div class="attachment-section">
                    <div class="section-label">{{ __('skinchanger.settings.stickers_label') }}</div>
                    <div class="stickers-preview">
                        @for ($i = 0; $i < 4; $i++)
                            @php
                                $slotKey = 'slot' . ($i + 1);
                                $currentSticker = $currentStickers[$slotKey] ?? null;
                                $hasSticker = !empty($currentSticker) && isset($currentSticker['image']);
                            @endphp
                            <div class="sticker-mini {{ $hasSticker ? 'has-sticker' : 'empty-sticker' }}"
                                data-handler="open-sticker-sidebar" data-slot="{{ $i }}"
                                data-weapon-index="{{ $weaponId }}" data-skin-id="{{ $skinId }}"
                                data-server-id="{{ $serverId }}" data-team="{{ $currentTeam }}">
                                @if ($hasSticker)
                                    <img src="{{ $currentSticker['image'] ?? '' }}"
                                        alt="{{ $currentSticker['name'] ?? '' }}" loading="lazy">
                                    <div class="remove-sticker" data-handler="remove-sticker-temp"
                                        data-slot="{{ $i }}">×</div>
                                @else
                                    <span class="add-icon">+</span>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="attachment-section">
                    <div class="section-label">{{ __('skinchanger.settings.charm_label') }}</div>
                    <div class="charm-preview">
                        @php
                            $currentCharm = $currentCharms[0] ?? null;
                            $hasCharm = !empty($currentCharm);
                        @endphp
                        <div class="charm-mini {{ $hasCharm ? 'has-charm' : 'empty-charm' }}"
                            data-handler="open-charm-sidebar" data-weapon-index="{{ $weaponId }}"
                            data-skin-id="{{ $skinId }}" data-server-id="{{ $serverId }}"
                            data-team="{{ $currentTeam }}">
                            @if ($hasCharm)
                                <img src="{{ $currentCharm['image'] ?? '' }}" alt="{{ $currentCharm['name'] ?? '' }}"
                                    loading="lazy">
                                <div class="remove-charm" data-handler="remove-charm-temp">×</div>
                            @else
                                <span class="add-icon">+</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="settings-panel">
        <div class="setting-section">
            <div class="setting-content">
                <div class="float-control">
                    <div class="float-visual-picker" data-handler="float-picker">
                        <div class="float-track">
                            <div class="float-thumb" style="left: {{ $currentFloat * 100 }}%;"
                                data-handler="float-thumb"></div>
                        </div>
                        <div class="float-labels">
                            <div class="float-label">
                                <span class="label-text">FN</span>
                                <span class="label-range">0.00-0.07</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">MW</span>
                                <span class="label-range">0.07-0.15</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">FT</span>
                                <span class="label-range">0.15-0.38</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">WW</span>
                                <span class="label-range">0.38-0.45</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">BS</span>
                                <span class="label-range">0.45-1.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-input-group">
                        <x-fields.input type="number" step="0.001" min="0" max="1"
                            value="{{ $currentFloat }}" name="float" class="skin-setting-input" />
                        <div class="current-quality">
                            @php
                                $qualities = [
                                    __('skinchanger.quality.factory_new'),
                                    __('skinchanger.quality.minimal_wear'),
                                    __('skinchanger.quality.field_tested'),
                                    __('skinchanger.quality.well_worn'),
                                    __('skinchanger.quality.battle_scarred'),
                                ];
                                echo $qualities[$currentWear] ?? 'Unknown';
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="setting-section">
            <div class="section-title">{{ __('skinchanger.settings.nametag') }}</div>
            <div class="nametag-control">
                <x-fields.input type="text" name="nametag" maxlength="20" value="{{ $currentNametag }}"
                    placeholder="{{ __('skinchanger.settings.nametag_placeholder') }}" class="skin-setting-input" />
            </div>
        </div>

        <div class="settings-section">
            <div class="setting-section">
                <div class="section-title">{{ __('skinchanger.settings.pattern') }}</div>
                <div class="pattern-control">
                    <x-fields.input type="number" name="pattern" min="0" max="999"
                        value="{{ $currentPattern }}" placeholder="0" class="skin-setting-input" />
                </div>
            </div>

            <div class="setting-section">
                <div class="section-title">{{ __('skinchanger.settings.stattrack') }}</div>
                <div class="stattrack-control">
                    <x-fields.toggle name="stattrack" checked="{{ $currentStatTrak }}" class="skin-setting-input" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal__footer skin-settings-modal-footer">
    <x-button data-modal-close="skin-settings-modal" type="outline-primary">
        {{ __('skinchanger.buttons.close') }}
    </x-button>
    <x-button data-handler="apply-skin-settings" data-weapon-index="{{ $weaponId }}"
        data-skin-id="{{ $skinId }}" data-server-id="{{ $serverId }}" data-team="{{ $currentTeam }}"
        type="primary">
        {{ __('skinchanger.buttons.apply') }}
    </x-button>
</div>

<div class="skin-settings-data" style="display: none;">
    <input type="hidden" name="temp_sticker_slot_0" value="{{ $currentStickers['slot1']['id'] ?? 0 }}">
    <input type="hidden" name="temp_sticker_slot_1" value="{{ $currentStickers['slot2']['id'] ?? 0 }}">
    <input type="hidden" name="temp_sticker_slot_2" value="{{ $currentStickers['slot3']['id'] ?? 0 }}">
    <input type="hidden" name="temp_sticker_slot_3" value="{{ $currentStickers['slot4']['id'] ?? 0 }}">
    <input type="hidden" name="temp_charm" value="{{ $currentCharms[0]['id'] ?? 0 }}">
    <input type="hidden" name="temp_quality" value="{{ $currentWear }}">
</div>
