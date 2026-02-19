<form class="banners-settings-form">
    <div class="settings-section">
        <x-forms.field class="mb-3">
            <x-fields.checkbox name="autoplay" id="autoplay" checked="{{ $settings['autoplay'] ?? true }}"
                label="{{ __('banners.settings.autoplay') }}" />
        </x-forms.field>

        <div class="settings-row">
            <x-forms.field class="mb-3">
                <x-forms.label for="interval">{{ __('banners.settings.interval') }}</x-forms.label>
                <x-fields.input type="number" id="interval" name="interval" min="1000" step="500"
                    value="{{ $settings['interval'] ?? 5000 }}" postPrefix="ms" />
            </x-forms.field>

            <x-forms.field class="mb-3">
                <x-forms.label for="height_mode">{{ __('banners.settings.height_mode') }}</x-forms.label>
                <x-fields.select name="height_mode" id="height_mode" class="height-mode-select">
                    <option value="auto" {{ ($settings['height_mode'] ?? 'manual') === 'auto' ? 'selected' : '' }}>
                        {{ __('banners.settings.height_auto') }}
                    </option>
                    <option value="manual" {{ ($settings['height_mode'] ?? 'manual') === 'manual' ? 'selected' : '' }}>
                        {{ __('banners.settings.height_manual') }}
                    </option>
                </x-fields.select>
            </x-forms.field>
        </div>

        <div class="settings-row height-settings" style="{{ ($settings['height_mode'] ?? 'manual') === 'auto' ? 'display: none;' : '' }}">
            <x-forms.field class="mb-3">
                <x-forms.label for="height">{{ __('banners.settings.height') }}</x-forms.label>
                <x-fields.input type="number" id="height" name="height" min="100" step="10"
                    value="{{ $settings['height'] ?? 300 }}" postPrefix="px" />
            </x-forms.field>
        </div>
    </div>

    <div class="settings-section">
        <div class="settings-header">
            <x-forms.label class="section-title">{{ __('banners.settings.manage_banners') }}</x-forms.label>
            <button type="button" id="btn-add-banner" class="btn-add">
                <x-icon path="ph.regular.plus" />
                <span>{{ __('banners.settings.add_banner') }}</span>
            </button>
        </div>

        <div class="banners-list" id="banners-list">
            @if (!empty($settings['banners']))
                @foreach ($settings['banners'] as $index => $banner)
                    <div class="banner-item" data-index="{{ $index }}">
                        <div class="banner-header">
                            <h5 class="banner-title">{{ __('banners.banner') }} #{{ $index + 1 }}</h5>
                            <button type="button" class="btn-remove-banner">
                                <x-icon path="ph.regular.trash" />
                            </button>
                        </div>

                        <div class="banner-inputs">
                            <x-forms.field>
                                <x-forms.label>{{ __('banners.settings.image_url') }}</x-forms.label>
                                <div class="banner-image-upload">
                                    <x-fields.input type="text" name="banners[{{ $index }}][image_url]"
                                        value="{{ $banner['image_url'] ?? '' }}" required
                                        placeholder="{{ __('banners.settings.or_enter_url') }}" />
                                    <div class="image-upload-actions">
                                        <label class="btn btn-tiny btn-upload" for="banner-upload-{{ $index }}">
                                            <x-icon path="ph.regular.upload" />
                                            <span>{{ __('banners.settings.upload_image') }}</span>
                                        </label>
                                        <input type="file" id="banner-upload-{{ $index }}"
                                            accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                                            class="banner-file-input" data-index="{{ $index }}"
                                            style="display: none;">
                                    </div>
                                    <div class="upload-progress" style="display: none;">
                                        <div class="progress-bar">
                                            <div class="progress-fill"></div>
                                        </div>
                                        <span class="progress-text">{{ __('banners.settings.uploading') }}</span>
                                    </div>
                                    @if (!empty($banner['image_url']))
                                        <div class="image-preview">
                                            <img src="{{ asset($banner['image_url']) }}" alt="Preview">
                                            <button type="button" class="btn-remove-preview">
                                                <x-icon path="ph.regular.x" />
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </x-forms.field>

                            <x-forms.field>
                                <x-forms.label>{{ __('banners.settings.link_url') }}</x-forms.label>
                                <x-fields.input type="text" name="banners[{{ $index }}][link_url]"
                                    value="{{ $banner['link_url'] ?? '' }}" />
                            </x-forms.field>

                            <div class="banner-row">
                                <x-forms.field>
                                    <x-forms.label>{{ __('banners.settings.title') }}</x-forms.label>
                                    <x-fields.input type="text" name="banners[{{ $index }}][title]"
                                        value="{{ $banner['title'] ?? '' }}" />
                                </x-forms.field>

                                <x-forms.field>
                                    <x-forms.label>{{ __('banners.settings.target') }}</x-forms.label>
                                    <x-fields.select name="banners[{{ $index }}][target]" class="target-select">
                                        <option value="_self"
                                            {{ ($banner['target'] ?? '_self') === '_self' ? 'selected' : '' }}>
                                            {{ __('banners.settings.target_self') }}
                                        </option>
                                        <option value="_blank"
                                            {{ ($banner['target'] ?? '_self') === '_blank' ? 'selected' : '' }}>
                                            {{ __('banners.settings.target_blank') }}
                                        </option>
                                    </x-fields.select>
                                </x-forms.field>
                            </div>

                            <x-forms.field class="description-field">
                                <x-forms.label>{{ __('banners.settings.description') }}</x-forms.label>
                                <x-fields.textarea name="banners[{{ $index }}][description]" rows="3"
                                    value="{{ $banner['description'] ?? '' }}"></x-fields.textarea>
                            </x-forms.field>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</form>

<template id="banner-item-template">
    <div class="banner-item" data-index="{index}">
        <div class="banner-header">
            <h5 class="banner-title">{{ __('banners.banner') }} #{number}</h5>
            <button type="button" class="btn-remove-banner">
                <x-icon path="ph.regular.trash" />
            </button>
        </div>

        <div class="banner-inputs">
            <x-forms.field>
                <x-forms.label>{{ __('banners.settings.image_url') }}</x-forms.label>
                <div class="banner-image-upload">
                    <x-fields.input type="text" name="banners[{index}][image_url]" required
                        placeholder="{{ __('banners.settings.or_enter_url') }}" />
                    <div class="image-upload-actions">
                        <label class="btn btn-tiny btn-upload" for="banner-upload-{index}">
                            <x-icon path="ph.regular.upload" />
                            <span>{{ __('banners.settings.upload_image') }}</span>
                        </label>
                        <input type="file" id="banner-upload-{index}"
                            accept="image/jpeg,image/jpg,image/png,image/gif,image/webp" class="banner-file-input"
                            data-index="{index}" style="display: none;">
                    </div>
                    <div class="upload-progress" style="display: none;">
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                        </div>
                        <span class="progress-text">{{ __('banners.settings.uploading') }}</span>
                    </div>
                </div>
            </x-forms.field>

            <x-forms.field>
                <x-forms.label>{{ __('banners.settings.link_url') }}</x-forms.label>
                <x-fields.input type="text" name="banners[{index}][link_url]" />
            </x-forms.field>

            <div class="banner-row">
                <x-forms.field>
                    <x-forms.label>{{ __('banners.settings.title') }}</x-forms.label>
                    <x-fields.input type="text" name="banners[{index}][title]" />
                </x-forms.field>

                <x-forms.field>
                    <x-forms.label>{{ __('banners.settings.target') }}</x-forms.label>
                    <x-fields.select name="banners[{index}][target]" class="target-select">
                        <option value="_self">{{ __('banners.settings.target_self') }}</option>
                        <option value="_blank">{{ __('banners.settings.target_blank') }}</option>
                    </x-fields.select>
                </x-forms.field>
            </div>

            <x-forms.field class="description-field">
                <x-forms.label>{{ __('banners.settings.description') }}</x-forms.label>
                <x-fields.textarea name="banners[{index}][description]" rows="3"></x-fields.textarea>
            </x-forms.field>
        </div>
    </div>
</template>
