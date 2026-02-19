<?php

return  [
    'vip_only' => false,
    'vip_groups' => [],
    'vip_check_mode' => 'global',
    'vip_only_message' => 'skinchanger.vip.required_tooltip',
    'vip_check_server_id' => null,
    'refresh' => [
        'http_timeout' => 90,
        'task_time_budget' => 300, // Extended for large zipball downloads
        'source_url' => 'https://github.com/ByMykel/CSGO-API',
        'repo_cache_ttl' => 1800,
    ],
];
