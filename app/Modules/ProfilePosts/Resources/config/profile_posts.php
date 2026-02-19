<?php

return  [
    'wall' => [
        'allow_others' => true,
        'require_open_profile' => true,
        'max_length' => 5000,
        'min_length' => 1,
    ],
    'comments' => [
        'enabled' => true,
        'max_length' => 1000,
    ],
    'reactions' => [
        'enabled' => true,
        'available' => [
            'heart' => '❤️',
            'fire' => '🔥',
            'thumbs_up' => '👍',
            'thumbs_down' => '👎',
            'laugh' => '😂',
            'sad' => '😢',
            'wow' => '😮',
            'diamond' => '💎',
            'star' => '⭐',
            'hundred' => '💯',
            'thinking' => '🤔',
            'clap' => '👏',
            'skull' => '💀',
            'party' => '🎉',
            'angry' => '😡',
            'rocket' => '🚀',
            'trophy' => '🏆',
            'sparkles' => '✨',
            'eyes' => '👀',
            'pray' => '🙏',
            'e_66d25ac8' => '🤡',
        ],
        'max_per_post' => 3,
    ],
    'images' => [
        'enabled' => true,
        'max_size' => 5,
    ],
    'notifications' => [
        'wall_post' => true,
        'comment' => true,
    ],
    'rate_limit' => [
        'posts' => 5,
        'comments' => 10,
        'reactions' => 30,
    ],
];
