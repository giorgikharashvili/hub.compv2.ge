<?php

use Flute\Core\Router\Router;
use Flute\Modules\ProfilePosts\Admin\Package\Screens\ProfilePostsSettingsScreen;

Router::screen('/admin/profile-posts/settings', ProfilePostsSettingsScreen::class);
