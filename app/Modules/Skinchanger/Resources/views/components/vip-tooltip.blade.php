@props(['vipOnlyMode' => false, 'hasVipAccess' => false])

@if ($vipOnlyMode && !$hasVipAccess)
    <div class="vip-tooltip">
        <x-icon path="ph.regular.crown-simple" class="vip-icon" />
        {{ __(config('skinchanger.vip_only_message', 'skinchanger.vip.required_tooltip')) }}
    </div>
@endif
