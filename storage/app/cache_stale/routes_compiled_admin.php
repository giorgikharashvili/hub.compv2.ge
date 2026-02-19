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
        '/login' => [
            [['_route' => 'route_667ad3025b28b6728e22cd4db0e247ce', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\AuthController', 'getLogin'], '_middleware' => ['guest', 'Flute\\Core\\Modules\\Auth\\Middlewares\\ModalAuthMiddleware']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null],
            [['_route' => 'route_9fed40d0b4a271056d62f4f5fd320f67', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\AuthController', 'postLogin'], '_middleware' => ['guest', 'Flute\\Core\\Modules\\Auth\\Middlewares\\StandardAuthMiddleware', 'csrf']], null, ['POST' => 0], null, false, false, null],
        ],
        '/register' => [
            [['_route' => 'route_bf388f53c0a23422f18696402355ec5a', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\AuthController', 'getRegister'], '_middleware' => ['guest', 'Flute\\Core\\Modules\\Auth\\Middlewares\\StandardAuthMiddleware', 'Flute\\Core\\Modules\\Auth\\Middlewares\\RegisterMiddleware']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null],
            [['_route' => 'route_3dca5fb0eb27e2ffed916785e7607643', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\AuthController', 'postRegister'], '_middleware' => ['guest', 'Flute\\Core\\Modules\\Auth\\Middlewares\\StandardAuthMiddleware', 'csrf']], null, ['POST' => 0], null, false, false, null],
        ],
        '/social/register' => [
            [['_route' => 'route_bead187bb397be0bb12ef1b2658e32e5', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\SocialAuthController', 'getSocialRegister'], '_middleware' => ['guest']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null],
            [['_route' => 'route_5c146b9c2a4c8bcc525f8ca24a0d62fe', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\SocialAuthController', 'postSocialRegister'], '_middleware' => ['guest', 'Flute\\Core\\Modules\\Auth\\Middlewares\\StandardAuthMiddleware', 'csrf']], null, ['POST' => 0], null, false, false, null],
        ],
        '/logout' => [[['_route' => 'route_bdae51f36afdf439bc30f24a85468896', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\AuthController', 'getLogout'], '_middleware' => ['auth', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/notifications/all' => [[['_route' => 'route_b78f0c03da79bc985c10a41f9f3310f8', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\NotificationController', 'getAll'], '_middleware' => ['auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/api/notifications/unread' => [[['_route' => 'route_9e3117c22919ae3ee39026c3be4b0dab', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\NotificationController', 'getUnread'], '_middleware' => ['auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/api/notifications/count-unread' => [[['_route' => 'route_11a894e048fb9c1d930135754cf74e1d', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\NotificationController', 'getCountUnread'], '_middleware' => ['auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/api/notifications' => [[['_route' => 'route_753d9b99321b7124b91bef420f55fc92', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\NotificationController', 'clear'], '_middleware' => ['auth']], null, ['DELETE' => 0], null, true, false, null]],
        '/sidebar/notifications' => [[['_route' => 'route_b7c275cd6f59cc19d64561461875f0bd', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\Components\\NotificationsSidebar', 'sidebarNotifications'], '_middleware' => ['auth', 'htmx']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/sidebar/notifications/all' => [[['_route' => 'notifications.all', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\Components\\NotificationsSidebar', 'all'], '_middleware' => ['auth', 'htmx']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/sidebar/notifications/all/splitted' => [[['_route' => 'notifications.all.splitted', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\Components\\NotificationsSidebar', 'allSplitted'], '_middleware' => ['auth', 'htmx']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/sidebar/notifications/unread' => [[['_route' => 'notifications.unread', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\Components\\NotificationsSidebar', 'unread'], '_middleware' => ['auth', 'htmx']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/sidebar/notifications/unread/splitted' => [[['_route' => 'notifications.unread.splitted', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\Components\\NotificationsSidebar', 'unreadSplitted'], '_middleware' => ['auth', 'htmx']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/lk' => [[['_route' => 'route_2c5be8650af68d4f1f71ec875deb5273', '_controller' => ['Flute\\Core\\Modules\\Payments\\Controllers\\PaymentsViewController', 'index'], '_middleware' => ['auth', 'htmx']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/lk/success' => [[['_route' => 'route_77bdd20e5690885584e65d3552ee58a7', '_controller' => ['Flute\\Core\\Modules\\Payments\\Controllers\\PaymentsViewController', 'paymentSuccess'], '_middleware' => ['auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/lk/fail' => [[['_route' => 'route_f5051667d54bbad46d35a88ae8c366af', '_controller' => ['Flute\\Core\\Modules\\Payments\\Controllers\\PaymentsViewController', 'paymentFail'], '_middleware' => ['auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/profile/settings' => [[['_route' => 'route_14d93366120df26e0370d44d1ac261f9', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileEditController', 'index'], '_middleware' => ['auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/profile/verify-email' => [[['_route' => 'route_e29ef0bd0ee04e1040fef391f91d0831', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileVerificationController', 'verifyEmail'], '_middleware' => ['auth', 'throttle']], null, ['POST' => 0], null, false, false, null]],
        '/sidebar/miniprofile' => [[['_route' => 'route_67cdc211f405181c7fd451c0550889d5', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\Htmx\\ProfileSidebar', 'open'], '_middleware' => ['htmx', 'auth']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/api/pages/render-widget' => [[['_route' => 'pages.renderWidget', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'renderWidget'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/render-widgets' => [[['_route' => 'pages.renderWidgets', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'renderWidgets'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/widgets/settings-form' => [[['_route' => 'pages.widgetSettingsForm', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'settingsForm'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/widgets/save-settings' => [[['_route' => 'pages.saveWidgetSettings', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'saveSettings'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/widgets/handle-action' => [[['_route' => 'pages.handleWidgetAction', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'handleAction'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/widgets/buttons-batch' => [[['_route' => 'pages.getWidgetButtonsBatch', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'getButtonsBatch'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/widgets/buttons' => [[['_route' => 'pages.getWidgetButtons', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'getButtons'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/save-colors' => [[['_route' => 'pages.saveColors', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\ColorController', 'saveColors'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/save-layout' => [[['_route' => 'pages.saveLayout', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'saveLayout'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/get-layout' => [[['_route' => 'pages.getLayout', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'getLayout'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/api/pages/save-seo' => [[['_route' => 'pages.saveSEO', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\PageController', 'saveSEO'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/api/pages/seo' => [[['_route' => 'pages.seo', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\PageController', 'seo'], '_middleware' => ['can:admin.pages', 'csrf']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/offline' => [[['_route' => 'pages.offline', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\PageController', 'offline']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/live' => [[['_route' => 'yoyo.update', '_controller' => ['Flute\\Core\\Template\\Controllers\\YoyoController', 'handle'], '_middleware' => ['web', 'csrf']], null, ['GET' => 0, 'POST' => 1, 'PUT' => 2, 'DELETE' => 3, 'PATCH' => 4, 'OPTIONS' => 5, 'HEAD' => 6], null, false, false, null]],
        '/api/tip/complete' => [[['_route' => 'route_de02a85d097fc3e372bc40811a2c5ea8', '_controller' => ['Flute\\Core\\Modules\\Tips\\Controllers\\TipController', 'complete'], '_middleware' => ['can:admin.boss', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => ['Flute\\Core\\Modules\\Home\\Controllers\\HomeController', 'index'], '_middleware' => ['Flute\\Core\\Modules\\Installer\\Middlewares\\IsInstalledMiddleware']], null, ['GET' => 0, 'POST' => 1, 'PUT' => 2, 'DELETE' => 3, 'PATCH' => 4, 'OPTIONS' => 5, 'HEAD' => 6], null, false, false, null]],
        '/admin/search' => [[['_route' => 'route_602717416d8b5b1bbd14ee71574cc189', '_controller' => ['Flute\\Admin\\Packages\\Search\\Controllers\\AdminSearchController', 'search'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/search/commands' => [[['_route' => 'route_b95156448a161491f68b33aa8cf310fe', '_controller' => ['Flute\\Admin\\Packages\\Search\\Controllers\\AdminSearchController', 'slashCommands'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/select/search' => [[['_route' => 'route_9c569ac5c77c3418a5acbd8f2e564687', '_controller' => ['Flute\\Admin\\Packages\\Search\\Controllers\\AdminSelectController', 'search'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/api/sidebar' => [[['_route' => 'route_a1c4d4999ee493fe6fdb6f64f9ff3184', '_controller' => ['Flute\\Admin\\Http\\Controllers\\SidebarController', 'getSidebar'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/modules/install' => [[['_route' => 'admin.modules.install', '_controller' => ['Flute\\Admin\\Packages\\Modules\\Controllers\\ModulesController', 'installModule'], '_middleware' => ['can:admin.modules', 'csrf']], null, ['POST' => 0], null, false, false, null]],
        '/admin/api/icons/packages' => [[['_route' => 'route_5db43195d7941f0ce4fc6adf81c01556', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'getPackages'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/api/icons/all' => [[['_route' => 'route_5488b3afa0c7010dc4a5cbcf68eab364', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'getAllIcons'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/api/icons/render' => [[['_route' => 'route_cf5519bca07b853595349855d7d5c1f7', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'renderIcon'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/api/icons/search' => [[['_route' => 'route_039be631f1225b90db990cf4e61cb5c3', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'searchIcons'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        '/admin/api/icons/batch-render' => [[['_route' => 'route_adef0a10968098efdc830a6b4f93c9c1', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'batchRenderIcons'], '_middleware' => ['can:admin']], null, ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/social/([^/]++)(*:23)'
                .'|/confirm/([^/]++)(*:47)'
                .'|/a(?'
                    .'|pi/(?'
                        .'|notifications/(\\d+)(?'
                            .'|(*:87)'
                        .')'
                        .'|lk/handle/([^/]++)(*:113)'
                        .'|pages/delete\\-widget/([^/]++)(*:150)'
                        .'|search/([^/]++)(*:173)'
                    .')'
                    .'|dmin/api/icons/packages/([^/]++)(?'
                        .'|(*:217)'
                        .'|/categories(*:236)'
                    .')'
                .')'
                .'|/p(?'
                    .'|ayment/([^/]++)(*:266)'
                    .'|rofile/(?'
                        .'|social/(?'
                            .'|bind/([^/]++)(*:307)'
                            .'|unbind/([^/]++)(*:330)'
                        .')'
                        .'|([^/]++)(?'
                            .'|(*:350)'
                            .'|/mini(*:363)'
                        .')'
                        .'|search/([^/]++)(*:387)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        23 => [[['_route' => 'route_746018771a4e4c84164735806a856da5', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\SocialAuthController', 'redirectToProvider']], ['provider'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        47 => [[['_route' => 'route_4eb124a03c6216731d2a86a6dc3bfd50', '_controller' => ['Flute\\Core\\Modules\\Auth\\Controllers\\AuthController', 'getConfirmation']], ['token'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        87 => [
            [['_route' => 'route_41a3865bc61c567beb9b8a1d1d363595', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\NotificationController', 'delete'], '_middleware' => ['auth']], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'route_bf9c6262b40ef671cc6a5fff70659758', '_controller' => ['Flute\\Core\\Modules\\Notifications\\Controllers\\NotificationController', 'read'], '_middleware' => ['auth']], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        113 => [[['_route' => 'route_b815a70d2a0e0c2960df187aff4ff1a0', '_controller' => ['Flute\\Core\\Modules\\Payments\\Controllers\\PaymentsApiController', 'handle']], ['gateway'], ['POST' => 0], null, false, true, null]],
        150 => [[['_route' => 'pages.deleteWidget', '_controller' => ['Flute\\Core\\Modules\\Page\\Controllers\\WidgetController', 'deleteWidget'], '_middleware' => ['can:admin.pages', 'csrf']], ['id'], ['DELETE' => 0], null, false, true, null]],
        173 => [[['_route' => 'route_debd0baa3f951a6f06393b0d7062f442', '_controller' => ['Flute\\Core\\Modules\\Search\\Controllers\\SearchController', 'search'], '_middleware' => ['csrf']], ['value'], ['POST' => 0], null, false, true, null]],
        217 => [[['_route' => 'route_e4c79f9f29a914a9985009ec7158b243', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'getIcons'], '_middleware' => ['can:admin']], ['prefix'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        236 => [[['_route' => 'route_4df89fc3405dc2e576df273fa1a961c2', '_controller' => ['Flute\\Core\\Modules\\Icons\\Controllers\\IconController', 'getCategories'], '_middleware' => ['can:admin']], ['prefix'], ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        266 => [[['_route' => 'route_941006e60d74e8eaddb662974327f508', '_controller' => ['Flute\\Core\\Modules\\Payments\\Controllers\\PaymentsViewController', 'processPayment'], '_middleware' => ['auth']], ['transaction'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        307 => [[['_route' => 'route_68b3f08392f11611cc1be93efd7b1ec9', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileSocialBindController', 'bindSocial'], '_middleware' => ['auth']], ['provider'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        330 => [[['_route' => 'route_1cd1798032b544f97613e05cada869b2', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileSocialBindController', 'unbindSocial'], '_middleware' => ['auth', 'csrf']], ['provider'], ['POST' => 0], null, false, true, null]],
        350 => [[['_route' => 'route_d5e54b8b5e489dd494ebd980d99b2931', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileIndexController', 'index'], '_middleware' => ['Flute\\Core\\Modules\\Profile\\Middlewares\\UserExistsMiddleware']], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        363 => [[['_route' => 'route_2445924e2720963a9862027d1fd95a4e', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileIndexController', 'mini']], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, false, null]],
        387 => [
            [['_route' => 'route_6329e808ca7f9fdfaec7636e602fc134', '_controller' => ['Flute\\Core\\Modules\\Profile\\Controllers\\ProfileRedirectController', 'search'], '_middleware' => ['throttle']], ['value'], ['GET' => 0, 'HEAD' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

return new FluteCompiledRoutes([]);