<div class="banners-widget">
    @if (empty($banners))
        <div class="banners-empty">
            <p>{{ __('banners.no_banners') }}</p>
        </div>
    @else
        <div class="banners-slider swiper{{ count($banners) <= 1 ? ' single-banner' : '' }}"
            @if (($settings['autoplay'] ?? true) && count($banners) > 1) data-autoplay="true" data-interval="{{ $settings['interval'] ?? 5000 }}" @endif
            data-height-mode="{{ $settings['height_mode'] ?? 'manual' }}" data-height="{{ $settings['height'] ?? 300 }}"
            @if (($settings['height_mode'] ?? 'manual') === 'manual') style="height: {{ $settings['height'] ?? 300 }}px;" @endif>
            <div class="banners-slider-track swiper-wrapper">
                @foreach ($banners as $index => $banner)
                    <div class="banner-slide swiper-slide">
                        @if (!empty($banner['link_url']))
                            <a href="{{ $banner['link_url'] }}" target="{{ $banner['target'] ?? '_self' }}"
                                rel="{{ ($banner['target'] ?? '_self') === '_blank' ? 'noopener noreferrer' : '' }}"
                                @if (!empty($banner['link_url']) && !str_contains($banner['link_url'], 'http')) hx-boost="true" 
                                   hx-target="#main" 
                                   hx-swap="outerHTML transition:true" @endif
                                aria-label="{{ !empty($banner['title']) ? __($banner['title']) : __('banners.banner_image') }}">
                        @endif

                        <div class="banner-image">
                            <img src="{{ asset($banner['image_url']) }}"
                                alt="{{ __($banner['title'] ?? __('banners.banner_image')) }}"
                                loading="{{ $index === 0 ? 'eager' : 'lazy' }}" decoding="async">
                        </div>

                        @if (!empty($banner['title']) || !empty($banner['description']))
                            <div class="banner-content">
                                @if (!empty($banner['title']))
                                    <h3 class="banner-title">{{ __($banner['title']) }}</h3>
                                @endif

                                @if (!empty($banner['description']))
                                    <div class="banner-description">{{ __($banner['description']) }}</div>
                                @endif
                            </div>
                        @endif

                        @if (!empty($banner['link_url']))
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>

            @if (count($banners) > 1)
                <div class="banners-controls">
                    <button class="banner-prev" type="button" aria-label="{{ __('banners.prev_slide') }}">
                        <x-icon path="ph.regular.caret-left" />
                    </button>

                    <button class="banner-next" type="button" aria-label="{{ __('banners.next_slide') }}">
                        <x-icon path="ph.regular.caret-right" />
                    </button>
                </div>

                <div class="banners-indicators" role="tablist" aria-label="{{ __('banners.slide_indicators') }}"></div>
            @endif
        </div>
    @endif
</div>
