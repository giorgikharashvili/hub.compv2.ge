<div class="steam-info">
    <div class="steam-info-item">
        <span class="steam-info-label">{{ __('steam-info.steam.steam3') }}</span>
        <div class="steam-info-value">
            <span class="steam-info-text" title="{{ $steam3 }}">{{ $steam3 }}</span>
            <button class="steam-info-copy" onclick="copyToClipboard('{{ $steam3 }}');notyf.success('{{ __('steam-info.steam.copy_success') }}')" 
                data-tooltip="{{ __('steam-info.steam.copy') }}">
                <x-icon path="ph.regular.copy" />
            </button>
        </div>
    </div>

    <div class="steam-info-item">
        <span class="steam-info-label">{{ __('steam-info.steam.steam64') }}</span>
        <div class="steam-info-value">
            <span class="steam-info-text" title="{{ $steam64 }}">{{ $steam64 }}</span>
            <button class="steam-info-copy" onclick="copyToClipboard('{{ $steam64 }}');notyf.success('{{ __('steam-info.steam.copy_success') }}')"
                data-tooltip="{{ __('steam-info.steam.copy') }}">
                <x-icon path="ph.regular.copy" />
            </button>
        </div>
    </div>

    <div class="steam-info-item">
        <span class="steam-info-label">{{ __('steam-info.steam.steam32') }}</span>
        <div class="steam-info-value">
            <span class="steam-info-text" title="{{ $steam32 }}">{{ $steam32 }}</span>
            <button class="steam-info-copy" onclick="copyToClipboard('{{ $steam32 }}');notyf.success('{{ __('steam-info.steam.copy_success') }}')"
                data-tooltip="{{ __('steam-info.steam.copy') }}">
                <x-icon path="ph.regular.copy" />
            </button>
        </div>
    </div>
</div>
