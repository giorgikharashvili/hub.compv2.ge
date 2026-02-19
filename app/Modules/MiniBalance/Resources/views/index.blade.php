@at(path('app/Modules/MiniBalance/Resources/assets/js/mini-balance.js'))

<li class="mini-balance-container is-compact" role="button" data-tooltip="{{ __('minibalance.balance') }}" tabindex="0"
    aria-label="{{ __('minibalance.balance') }}"
    @if (config('lk.only_modal')) data-modal-open="lk-modal" 
    @else
        hx-get="{{ url('lk') }}"
        hx-target="#main"
        hx-swap="outerHTML transition:true"
        hx-trigger="click" @endif>
    <div class="mini-balance-amount">
        <x-icon path="ph.regular.wallet" class="mini-balance-icon" />
        <span class="mini-balance-value" data-profile-balance>
            {{ number_format(user()->balance ?? 0) }}
        </span>
        <span class="mini-balance-currency">{{ config('lk.currency_view') }}</span>
    </div>

    <span class="mini-balance-btn" aria-hidden="true">
        <x-icon path="ph.regular.plus" />
    </span>
</li>
