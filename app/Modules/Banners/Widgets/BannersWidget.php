<?php

namespace Flute\Modules\Banners\Widgets;

use Flute\Core\Modules\Page\Widgets\AbstractWidget;

class BannersWidget extends AbstractWidget
{
    public function getName(): string
    {
        return 'banners.widget';
    }

    public function getIcon(): string
    {
        return 'ph.regular.image-square';
    }

    public function getCategory(): string
    {
        return 'content';
    }

    public function render(array $settings): string
    {
        $banners = $settings['banners'] ?? [];

        $validBanners = [];
        foreach ($banners as $banner) {
            if (!empty($banner['image_url']) && $this->isValidImageUrl($banner['image_url'])) {
                $validBanners[] = $banner;
            }
        }

        return view('banners::widgets.banners', [
            'banners' => $validBanners,
            'settings' => $settings
        ])->render();
    }

    public function getDefaultWidth(): int
    {
        return 12;
    }

    public function hasSettings(): bool
    {
        return true;
    }

    /**
     * Get default settings
     */
    public function getSettings(): array
    {
        return [
            'banners' => [],
            'autoplay' => true,
            'interval' => 5000,
            'height' => 300,
            'height_mode' => 'manual'
        ];
    }

    /**
     * Returns the settings form
     */
    public function renderSettingsForm(array $settings): string
    {
        return view('banners::widgets.settings', [
            'settings' => $settings
        ])->render();
    }

    /**
     * Validates the widget's settings before saving.
     */
    public function validateSettings(array $input)
    {
        return validator()->validate($input, [
            'autoplay' => 'sometimes|boolean',
            'interval' => 'required|integer|min:1000|max:10000',
            'height' => 'required|integer|min:1|max:1000',
            'height_mode' => 'required|in:auto,manual',
            'banners' => 'sometimes|array',
        ]);
    }

    /**
     * Saves the widget's settings.
     */
    public function saveSettings(array $input): array
    {
        $settings = $this->getSettings();

        $settings['autoplay'] = isset($input['autoplay']) && (bool) $input['autoplay'];
        $settings['interval'] = isset($input['interval']) ? (int) $input['interval'] : 5000;
        $settings['height'] = isset($input['height']) ? (int) $input['height'] : 300;
        $settings['height_mode'] = isset($input['height_mode']) ? $input['height_mode'] : 'manual';

        $banners = [];

        if (isset($input['banners']) && is_array($input['banners'])) {
            foreach ($input['banners'] as $banner) {
                if (!empty($banner['image_url']) && $this->isValidImageUrl($banner['image_url'])) {
                    $processedBanner = [
                        'title' => trim($banner['title'] ?? ''),
                        'description' => trim($banner['description'] ?? ''),
                        'image_url' => trim($banner['image_url']),
                        'link_url' => trim($banner['link_url'] ?? ''),
                        'target' => in_array($banner['target'] ?? '', ['_self', '_blank']) ? $banner['target'] : '_self'
                    ];

                    if (!empty($processedBanner['link_url'])) {
                        $processedBanner['link_url'] = $this->sanitizeUrl($processedBanner['link_url']);
                    }

                    $banners[] = $processedBanner;
                }
            }
        }

        $settings['banners'] = $banners;

        return $settings;
    }

    /**
     * Validates if the image URL is valid
     */
    private function isValidImageUrl(string $url): bool
    {
        $url = trim($url);

        if (empty($url)) {
            return false;
        }

        if (str_starts_with($url, 'assets/') || str_starts_with($url, '/assets/')) {
            return true;
        }

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        }

        return false;
    }

    /**
     * Sanitizes URL
     */
    private function sanitizeUrl(string $url): string
    {
        $url = trim($url);

        if (empty($url)) {
            return '';
        }

        if (!str_contains($url, '://')) {
            return $url;
        }

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        }

        return '';
    }
}
