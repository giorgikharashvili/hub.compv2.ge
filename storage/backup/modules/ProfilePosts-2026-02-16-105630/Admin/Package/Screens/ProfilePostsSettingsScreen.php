<?php

namespace Flute\Modules\ProfilePosts\Admin\Package\Screens;

use Flute\Admin\Platform\Actions\Button;
use Flute\Admin\Platform\Fields\Input;
use Flute\Admin\Platform\Fields\Toggle;
use Flute\Admin\Platform\Layouts\LayoutFactory;
use Flute\Admin\Platform\Screen;
use Flute\Core\Services\ConfigurationService;

class ProfilePostsSettingsScreen extends Screen
{
    protected const DEFAULT_EMOJIS = [
        'heart' => '❤️',
        'fire' => '🔥',
        'thumbs_up' => '👍',
        'thumbs_down' => '👎',
        'laugh' => '😂',
        'sad' => '😢',
        'wow' => '😮',
        'party' => '🎉',
    ];

    protected const KNOWN_EMOJIS = [
        '❤️' => 'heart', '🔥' => 'fire', '👍' => 'thumbs_up', '👎' => 'thumbs_down',
        '😂' => 'laugh', '😢' => 'sad', '😮' => 'wow', '💎' => 'diamond',
        '⭐' => 'star', '💯' => 'hundred', '🤔' => 'thinking', '👏' => 'clap',
        '💀' => 'skull', '🎉' => 'party', '😡' => 'angry', '🚀' => 'rocket',
        '🏆' => 'trophy', '✨' => 'sparkles', '👀' => 'eyes', '🙏' => 'pray',
        '💪' => 'muscle', '🥳' => 'celebrate', '😎' => 'cool', '🤩' => 'starstruck',
        '😍' => 'love_eyes', '🤣' => 'rofl', '😱' => 'scream', '🥺' => 'pleading',
        '💖' => 'sparkling_heart', '💕' => 'two_hearts', '🔱' => 'trident',
        '❤' => 'heart_alt', '💜' => 'purple_heart', '💙' => 'blue_heart',
        '💚' => 'green_heart', '💛' => 'yellow_heart', '🖤' => 'black_heart',
        '🤍' => 'white_heart', '😏' => 'smirk', '🙄' => 'roll_eyes',
        '😴' => 'sleeping', '🤯' => 'mind_blown', '🥵' => 'hot_face',
        '🥶' => 'cold_face', '🤮' => 'vomit', '🤑' => 'money_face',
        '🤠' => 'cowboy', '👻' => 'ghost', '💩' => 'poop',
        '🎃' => 'pumpkin', '🤖' => 'robot', '👽' => 'alien',
    ];

    public ?string $name = null;

    public ?string $description = null;

    public ?string $permission = 'admin.profile_posts';

    public function mount(): void
    {
        $this->name = __('profile_posts.admin.settings');

        breadcrumb()
            ->add(__('def.admin_panel'), url('/admin'))
            ->add(__('profile_posts.admin.menu'))
            ->add(__('profile_posts.admin.settings'));
    }

    public function commandBar(): array
    {
        return [
            Button::make(__('def.save'))->method('save'),
        ];
    }

    public function layout(): array
    {
        $currentEmojis = config('profile_posts.reactions.available', self::DEFAULT_EMOJIS);

        // Display only emojis (values), space-separated
        $emojisString = implode(' ', array_values($currentEmojis));

        return [
            LayoutFactory::columns([
                LayoutFactory::blank([
                    LayoutFactory::block([
                        LayoutFactory::field(
                            Toggle::make('allow_others')
                                ->checked(filter_var(request()->input('allow_others', config('profile_posts.wall.allow_others', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.allow_others'))
                            ->popover(__('profile_posts.admin.allow_others_help')),

                        LayoutFactory::field(
                            Toggle::make('require_open_profile')
                                ->checked(filter_var(request()->input('require_open_profile', config('profile_posts.wall.require_open_profile', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.require_open_profile'))
                            ->popover(__('profile_posts.admin.require_open_profile_help')),

                        LayoutFactory::split([
                            LayoutFactory::field(
                                Input::make('min_length')
                                    ->type('number')
                                    ->value(request()->input('min_length', config('profile_posts.wall.min_length', 1)))
                                    ->min(1)
                                    ->max(100)
                            )->label(__('profile_posts.admin.min_length'))
                                ->small(__('profile_posts.admin.min_length_small')),

                            LayoutFactory::field(
                                Input::make('max_length')
                                    ->type('number')
                                    ->value(request()->input('max_length', config('profile_posts.wall.max_length', 5000)))
                                    ->min(100)
                                    ->max(20000)
                            )->label(__('profile_posts.admin.max_length'))
                                ->small(__('profile_posts.admin.max_length_small')),
                        ])->ratio('50/50'),
                    ])->title(__('profile_posts.admin.section_wall')),

                    LayoutFactory::block([
                        LayoutFactory::field(
                            Toggle::make('images_enabled')
                                ->checked(filter_var(request()->input('images_enabled', config('profile_posts.images.enabled', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.images_enabled'))
                            ->popover(__('profile_posts.admin.images_enabled_help')),

                        LayoutFactory::field(
                            Input::make('images_max_size')
                                ->type('number')
                                ->value(request()->input('images_max_size', config('profile_posts.images.max_size', 5)))
                                ->min(1)
                                ->max(20)
                        )->label(__('profile_posts.admin.images_max_size'))
                            ->small(__('profile_posts.admin.images_max_size_small')),
                    ])->title(__('profile_posts.admin.section_images')),

                    LayoutFactory::block([
                        LayoutFactory::field(
                            Toggle::make('comments_enabled')
                                ->checked(filter_var(request()->input('comments_enabled', config('profile_posts.comments.enabled', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.comments_enabled'))
                            ->popover(__('profile_posts.admin.comments_enabled_help')),

                        LayoutFactory::field(
                            Input::make('comments_max_length')
                                ->type('number')
                                ->value(request()->input('comments_max_length', config('profile_posts.comments.max_length', 1000)))
                                ->min(50)
                                ->max(5000)
                        )->label(__('profile_posts.admin.comments_max_length'))
                            ->small(__('profile_posts.admin.comments_max_length_small')),
                    ])->title(__('profile_posts.admin.section_comments')),
                ]),

                LayoutFactory::blank([
                    LayoutFactory::block([
                        LayoutFactory::field(
                            Toggle::make('reactions_enabled')
                                ->checked(filter_var(request()->input('reactions_enabled', config('profile_posts.reactions.enabled', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.reactions_enabled'))
                            ->popover(__('profile_posts.admin.reactions_enabled_help')),

                        LayoutFactory::field(
                            Input::make('reactions_available')
                                ->type('text')
                                ->value(request()->input('reactions_available', $emojisString))
                                ->placeholder('❤️ 🔥 👍 😂 😮 🎉')
                        )->label(__('profile_posts.admin.reactions_available'))
                            ->small(__('profile_posts.admin.reactions_available_small')),

                        LayoutFactory::field(
                            Input::make('reactions_max_per_post')
                                ->type('number')
                                ->value(request()->input('reactions_max_per_post', config('profile_posts.reactions.max_per_post', 3)))
                                ->min(1)
                                ->max(10)
                        )->label(__('profile_posts.admin.reactions_max_per_post'))
                            ->small(__('profile_posts.admin.reactions_max_per_post_small')),
                    ])->title(__('profile_posts.admin.section_reactions')),

                    LayoutFactory::block([
                        LayoutFactory::field(
                            Toggle::make('notify_wall_post')
                                ->checked(filter_var(request()->input('notify_wall_post', config('profile_posts.notifications.wall_post', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.notify_wall_post'))
                            ->popover(__('profile_posts.admin.notify_wall_post_help')),

                        LayoutFactory::field(
                            Toggle::make('notify_comment')
                                ->checked(filter_var(request()->input('notify_comment', config('profile_posts.notifications.comment', true)), FILTER_VALIDATE_BOOLEAN))
                        )->label(__('profile_posts.admin.notify_comment'))
                            ->popover(__('profile_posts.admin.notify_comment_help')),
                    ])->title(__('profile_posts.admin.section_notifications')),

                    LayoutFactory::block([
                        LayoutFactory::split([
                            LayoutFactory::field(
                                Input::make('rate_limit_posts')
                                    ->type('number')
                                    ->value(request()->input('rate_limit_posts', config('profile_posts.rate_limit.posts', 5)))
                                    ->min(1)
                                    ->max(100)
                            )->label(__('profile_posts.admin.rate_limit_posts'))
                                ->small(__('profile_posts.admin.rate_limit_posts_small')),

                            LayoutFactory::field(
                                Input::make('rate_limit_comments')
                                    ->type('number')
                                    ->value(request()->input('rate_limit_comments', config('profile_posts.rate_limit.comments', 10)))
                                    ->min(1)
                                    ->max(100)
                            )->label(__('profile_posts.admin.rate_limit_comments'))
                                ->small(__('profile_posts.admin.rate_limit_comments_small')),
                        ])->ratio('50/50'),

                        LayoutFactory::field(
                            Input::make('rate_limit_reactions')
                                ->type('number')
                                ->value(request()->input('rate_limit_reactions', config('profile_posts.rate_limit.reactions', 30)))
                                ->min(1)
                                ->max(200)
                        )->label(__('profile_posts.admin.rate_limit_reactions'))
                            ->small(__('profile_posts.admin.rate_limit_reactions_small')),
                    ])->title(__('profile_posts.admin.section_rate_limit')),
                ]),
            ]),
        ];
    }

    public function save(): void
    {
        $data = request()->input();

        $minLength = max(1, min(100, (int) ($data['min_length'] ?? 1)));
        $maxLength = max(100, min(20000, (int) ($data['max_length'] ?? 5000)));
        if ($maxLength < $minLength) {
            $maxLength = $minLength;
        }

        $commentsMaxLength = max(50, min(5000, (int) ($data['comments_max_length'] ?? 1000)));
        $reactionsMaxPerPost = max(1, min(10, (int) ($data['reactions_max_per_post'] ?? 3)));

        // Parse emojis - simple space/comma separated
        $reactionsString = trim($data['reactions_available'] ?? '');
        $reactionsAvailable = [];

        if ($reactionsString !== '') {
            // Split by spaces or commas
            $emojis = preg_split('/[\s,]+/u', $reactionsString, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($emojis as $emoji) {
                $emoji = trim($emoji);
                if ($emoji === '') {
                    continue;
                }

                $id = $this->generateEmojiId($emoji, $reactionsAvailable);
                if ($id && !isset($reactionsAvailable[$id])) {
                    $reactionsAvailable[$id] = $emoji;
                }
            }
        }

        if (empty($reactionsAvailable)) {
            $reactionsAvailable = self::DEFAULT_EMOJIS;
        }

        $rateLimitPosts = max(1, min(100, (int) ($data['rate_limit_posts'] ?? 5)));
        $rateLimitComments = max(1, min(100, (int) ($data['rate_limit_comments'] ?? 10)));
        $rateLimitReactions = max(1, min(200, (int) ($data['rate_limit_reactions'] ?? 30)));

        $imagesMaxSize = max(1, min(20, (int) ($data['images_max_size'] ?? 5)));

        $config = [
            'wall' => [
                'allow_others' => filter_var($data['allow_others'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'require_open_profile' => filter_var($data['require_open_profile'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'max_length' => $maxLength,
                'min_length' => $minLength,
            ],
            'comments' => [
                'enabled' => filter_var($data['comments_enabled'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'max_length' => $commentsMaxLength,
            ],
            'reactions' => [
                'enabled' => filter_var($data['reactions_enabled'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'available' => $reactionsAvailable,
                'max_per_post' => $reactionsMaxPerPost,
            ],
            'images' => [
                'enabled' => filter_var($data['images_enabled'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'max_size' => $imagesMaxSize,
            ],
            'notifications' => [
                'wall_post' => filter_var($data['notify_wall_post'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'comment' => filter_var($data['notify_comment'] ?? true, FILTER_VALIDATE_BOOLEAN),
            ],
            'rate_limit' => [
                'posts' => $rateLimitPosts,
                'comments' => $rateLimitComments,
                'reactions' => $rateLimitReactions,
            ],
        ];

        config()->set('profile_posts', $config);

        $written = @file_put_contents(
            path('app/Modules/ProfilePosts/Resources/config/profile_posts.php'),
            '<?php return ' . var_export($config, true) . ";\n"
        );

        if (function_exists('opcache_invalidate')) {
            opcache_invalidate(path('app/Modules/ProfilePosts/Resources/config/profile_posts.php'), true);
        }

        if ($written === false) {
            $this->flashMessage(__('def.server_error'), 'error');

            return;
        }

        app(ConfigurationService::class)->loadCustomConfig(
            path('app/Modules/ProfilePosts/Resources/config/profile_posts.php'),
            'profile_posts'
        );

        $this->flashMessage(__('def.success'), 'success');
    }

    /**
     * Generate a unique ID for an emoji
     */
    protected function generateEmojiId(string $emoji, array $existing): string
    {
        if (isset(self::KNOWN_EMOJIS[$emoji])) {
            $baseId = self::KNOWN_EMOJIS[$emoji];
        } else {
            // Generate short hash from emoji codepoints
            $baseId = 'e_' . substr(md5($emoji), 0, 8);
        }

        // Ensure unique
        $id = $baseId;
        $counter = 1;
        while (isset($existing[$id])) {
            $id = $baseId . '_' . $counter;
            $counter++;
        }

        return $id;
    }
}
