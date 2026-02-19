<?php

namespace Flute\Modules\ProfilePosts;

use Flute\Core\Database\Entities\Permission;
use Flute\Core\ModulesManager\ModuleInformation;
use Flute\Core\Support\AbstractModuleInstaller;

class Installer extends AbstractModuleInstaller
{
    public function install(ModuleInformation &$module): bool
    {
        $permission = Permission::findOne(['name' => 'admin.profile_posts']);

        if (!$permission) {
            $permission = new Permission();
            $permission->name = 'admin.profile_posts';
            $permission->desc = 'profile_posts.admin.permission';
            $permission->save();
        }

        return true;
    }

    public function uninstall(ModuleInformation &$module): bool
    {
        $permission = Permission::findOne(['name' => 'admin.profile_posts']);

        if ($permission) {
            $permission->delete();
        }

        return true;
    }
}
