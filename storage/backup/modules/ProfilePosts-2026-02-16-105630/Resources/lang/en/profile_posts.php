<?php

return [
    'title' => 'Comments',

    'tab' => [
        'title' => 'Wall',
    ],

    'form' => [
        'placeholder' => 'Start a thread...',
        'submit' => 'Post',
        'comment_placeholder' => 'Write a comment...',
        'reply_placeholder' => 'Reply to :name...',
        'login_to_post' => 'Login to post on wall',
        'attach_image' => 'Attach image',
    ],

    'actions' => [
        'comment' => 'Comment',
        'react' => 'React',
        'reply' => 'Reply',
        'show_replies' => 'Show replies',
        'hide_replies' => 'Hide replies',
    ],

    'empty' => [
        'title' => 'Wall is empty',
        'text' => 'There are no posts on this wall yet.',
        'owner_text' => 'Write something on your wall!',
    ],

    'edited' => 'edited',
    'load_more' => 'Load more',
    'replies_count' => ':count replies',

    'confirm_delete' => 'Delete this post?',
    'confirm_delete_comment' => 'Delete this comment?',
    'add_reaction' => 'Add reaction',

    'messages' => [
        'created' => 'Post published!',
        'deleted' => 'Post deleted',
        'comment_added' => 'Comment added',
        'comment_deleted' => 'Comment deleted',
    ],

    'errors' => [
        'not_found' => 'Post not found',
        'user_not_found' => 'User not found',
        'comment_required' => 'Please enter comment text',
        'you_are_banned' => 'You are blocked and cannot post',
        'only_owner_can_post' => 'Only the owner can post on this wall',
        'profile_is_closed' => 'Profile is closed for posts',
        'reactions_disabled' => 'Reactions are disabled',
        'comments_disabled' => 'Comments are disabled',
        'invalid_reaction' => 'Invalid reaction',
        'invalid_action' => 'Invalid action',
        'rate_limited' => 'Too many requests, please wait',
        'max_reactions_reached' => 'Maximum reactions limit reached for this post',
    ],

    'admin' => [
        'menu' => 'Profile Wall',
        'settings' => 'Wall Settings',
        'permission' => 'Manage profile wall',

        'section_wall' => 'Wall Settings',
        'section_comments' => 'Comments',
        'section_reactions' => 'Reactions',
        'section_images' => 'Images',
        'section_rate_limit' => 'Rate Limits',
        'section_notifications' => 'Notifications',

        'images_enabled' => 'Enable images',
        'images_enabled_help' => 'Users can attach images to posts',
        'images_max_size' => 'Max size (MB)',
        'images_max_size_small' => 'Maximum image file size',

        'allow_others' => 'Others can post',
        'allow_others_help' => 'Allow other users to post on walls',

        'require_open_profile' => 'Require open profile',
        'require_open_profile_help' => 'Can only post if profile is not hidden',

        'min_length' => 'Min characters',
        'min_length_small' => 'Minimum post length',

        'max_length' => 'Max characters',
        'max_length_small' => 'Maximum post length',

        'comments_enabled' => 'Enable comments',
        'comments_enabled_help' => 'Users can leave comments on posts',

        'comments_max_length' => 'Max comment length',
        'comments_max_length_small' => 'Character limit for comments',

        'reactions_enabled' => 'Enable reactions',
        'reactions_enabled_help' => 'Users can add emoji reactions',

        'reactions_available' => 'Available reactions',
        'reactions_available_small' => 'Emojis separated by space',

        'reactions_max_per_post' => 'Max reactions per post',
        'reactions_max_per_post_small' => 'How many different reactions one user can leave',

        'rate_limit_posts' => 'Posts per minute',
        'rate_limit_posts_small' => 'Post creation limit',

        'rate_limit_comments' => 'Comments per minute',
        'rate_limit_comments_small' => 'Comment creation limit',

        'rate_limit_reactions' => 'Reactions per minute',
        'rate_limit_reactions_small' => 'Reaction limit',

        'notify_wall_post' => 'Notify about posts',
        'notify_wall_post_help' => 'Send notification to wall owner about new posts',

        'notify_comment' => 'Notify about comments',
        'notify_comment_help' => 'Send notification to post author about new comments',
    ],

    'notifications' => [
        'new_post_title' => 'New wall post',
        'new_post_content' => ':user posted on your wall',
        'new_comment_title' => 'New comment',
        'new_comment_content' => ':user commented on your post',
    ],
];
