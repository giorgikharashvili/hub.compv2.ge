<?php

return [
    'title' => 'Комментарии',

    'tab' => [
        'title' => 'Стена',
    ],

    'form' => [
        'placeholder' => 'Начать тред...',
        'submit' => 'Опубликовать',
        'comment_placeholder' => 'Написать комментарий...',
        'reply_placeholder' => 'Ответить :name...',
        'login_to_post' => 'Войдите, чтобы написать на стену',
        'attach_image' => 'Прикрепить изображение',
    ],

    'actions' => [
        'comment' => 'Комментировать',
        'react' => 'Реакция',
        'reply' => 'Ответить',
        'show_replies' => 'Показать ответы',
        'hide_replies' => 'Скрыть ответы',
    ],

    'empty' => [
        'title' => 'Стена пуста',
        'text' => 'На этой стене пока нет записей.',
        'owner_text' => 'Напишите что-нибудь на своей стене!',
    ],

    'edited' => 'изменено',
    'load_more' => 'Показать ещё',
    'replies_count' => ':count ответов',

    'confirm_delete' => 'Удалить эту запись?',
    'confirm_delete_comment' => 'Удалить комментарий?',
    'add_reaction' => 'Добавить реакцию',

    'messages' => [
        'created' => 'Запись опубликована!',
        'deleted' => 'Запись удалена',
        'comment_added' => 'Комментарий добавлен',
        'comment_deleted' => 'Комментарий удалён',
    ],

    'errors' => [
        'not_found' => 'Запись не найдена',
        'user_not_found' => 'Пользователь не найден',
        'comment_required' => 'Введите текст комментария',
        'you_are_banned' => 'Вы заблокированы и не можете писать',
        'only_owner_can_post' => 'Только владелец может писать на эту стену',
        'profile_is_closed' => 'Профиль закрыт для записей',
        'reactions_disabled' => 'Реакции отключены',
        'comments_disabled' => 'Комментарии отключены',
        'invalid_reaction' => 'Недопустимая реакция',
        'invalid_action' => 'Недопустимое действие',
        'rate_limited' => 'Слишком много запросов, подождите немного',
        'max_reactions_reached' => 'Достигнут лимит реакций на этот пост',
    ],

    'admin' => [
        'menu' => 'Стена профиля',
        'settings' => 'Настройки стены',
        'permission' => 'Управление стеной профиля',

        'section_wall' => 'Настройки стены',
        'section_comments' => 'Комментарии',
        'section_reactions' => 'Реакции',
        'section_images' => 'Изображения',
        'section_rate_limit' => 'Лимиты',
        'section_notifications' => 'Уведомления',

        'images_enabled' => 'Разрешить изображения',
        'images_enabled_help' => 'Пользователи смогут прикреплять изображения к постам',
        'images_max_size' => 'Макс. размер (МБ)',
        'images_max_size_small' => 'Максимальный размер файла изображения',

        'allow_others' => 'Другие могут писать',
        'allow_others_help' => 'Разрешить другим пользователям писать на стены',

        'require_open_profile' => 'Требовать открытый профиль',
        'require_open_profile_help' => 'Писать можно только если профиль не скрыт',

        'min_length' => 'Мин. символов',
        'min_length_small' => 'Минимальная длина записи',

        'max_length' => 'Макс. символов',
        'max_length_small' => 'Максимальная длина записи',

        'comments_enabled' => 'Разрешить комментарии',
        'comments_enabled_help' => 'Пользователи смогут оставлять комментарии',

        'comments_max_length' => 'Макс. длина комментария',
        'comments_max_length_small' => 'Ограничение символов для комментариев',

        'reactions_enabled' => 'Разрешить реакции',
        'reactions_enabled_help' => 'Пользователи смогут ставить эмодзи-реакции',

        'reactions_available' => 'Доступные реакции',
        'reactions_available_small' => 'Эмодзи через пробел',

        'reactions_max_per_post' => 'Макс. реакций на пост',
        'reactions_max_per_post_small' => 'Сколько разных реакций может оставить один пользователь',

        'rate_limit_posts' => 'Постов в минуту',
        'rate_limit_posts_small' => 'Лимит создания постов',

        'rate_limit_comments' => 'Комментариев в минуту',
        'rate_limit_comments_small' => 'Лимит создания комментариев',

        'rate_limit_reactions' => 'Реакций в минуту',
        'rate_limit_reactions_small' => 'Лимит постановки реакций',

        'notify_wall_post' => 'Уведомлять о записях',
        'notify_wall_post_help' => 'Отправлять уведомление владельцу стены о новой записи',

        'notify_comment' => 'Уведомлять о комментариях',
        'notify_comment_help' => 'Отправлять уведомление автору поста о новом комментарии',
    ],

    'notifications' => [
        'new_post_title' => 'Новая запись на стене',
        'new_post_content' => ':user написал на вашей стене',
        'new_comment_title' => 'Новый комментарий',
        'new_comment_content' => ':user прокомментировал вашу запись',
    ],
];
