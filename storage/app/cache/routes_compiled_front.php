<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/translate' => [[['_route' => 'translation.translate', '_controller' => ['Flute\\Core\\Modules\\Translation\\Controllers\\TranslationController', 'translate'], '_middleware' => ['throttle', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/admin/api/translate' => [[['_route' => 'translation.admin.translate', '_controller' => ['Flute\\Core\\Modules\\Translation\\Controllers\\TranslationController', 'translate'], '_middleware' => ['csrf']], null, ['POST' => 0], null, false, false, null]],
        '/live' => [[['_route' => 'yoyo.update', '_controller' => ['Flute\\Core\\Template\\Controllers\\YoyoController', 'handle'], '_middleware' => ['web', 'csrf']], null, ['GET' => 0, 'POST' => 1, 'PUT' => 2, 'DELETE' => 3, 'PATCH' => 4, 'OPTIONS' => 5, 'HEAD' => 6], null, false, false, null]],
        '/install' => [[['_route' => 'installer.welcome', '_controller' => ['Flute\\Core\\Modules\\Installer\\Controllers\\InstallerController', 'welcome']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/install/([^/]++)(*:24)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        24 => [
            [['_route' => 'installer.step', '_controller' => ['Flute\\Core\\Modules\\Installer\\Controllers\\InstallerController', 'index']], ['id'], ['GET' => 0, 'POST' => 1, 'HEAD' => 2], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

return new FluteCompiledRoutes([]);