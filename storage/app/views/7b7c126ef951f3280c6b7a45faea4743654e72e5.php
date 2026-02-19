<?php
    $roles = $user->roles;
    $primaryRole = $roles[0] ?? null;
    $roleColor = $primaryRole?->color ?? '#8e8e8e';
    $socialNetworks = $user->socialNetworks;
    $unhiddenSocialNetworks = [];
    foreach ($socialNetworks as $network) {
        if (((bool) $network->hidden !== true || user()->can('admin.users')) && !empty($network->url)) {
            $unhiddenSocialNetworks[] = $network;
        }
    }
?>

<div class="user-card-content enhanced" style="--role-color: <?php echo e($roleColor); ?>">
    <div class="user-card-header">
        <div class="user-card-banner">
            <img src="<?php echo e(asset($user->banner ?? config('profile.default_banner'))); ?>" alt="<?php echo e($user->name); ?>">
        </div>

        <?php if(sizeof($unhiddenSocialNetworks) > 0): ?>
            <div class="user-card-actions">
                <?php $__currentLoopData = $unhiddenSocialNetworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a data-tooltip="<?php echo e($network->socialNetwork->key); ?>" href="<?php echo e($network->url); ?>" class="user-card-social" target="_blank">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($network->socialNetwork->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <a href="<?php echo e(url('profile/' . $user->getUrl())); ?>" hx-boost="true" hx-target="#main"
           hx-swap="outerHTML transition:true" class="user-card-avatar" data-tooltip="<?php echo e(__('profile.view')); ?>">
            <img src="<?php echo e(asset($user->avatar ?? config('profile.default_avatar'))); ?>" alt="<?php echo e($user->name); ?>">
            <span class="uc-status-dot <?php echo e($user->isOnline() ? 'online' : 'offline'); ?>"
                  aria-label="<?php echo e($user->isOnline() ? __('def.online') : __('def.offline')); ?>"
                  data-tooltip="<?php echo e($user->isOnline() ? __('def.online') : __('def.offline')); ?>"></span>
        </a>
    </div>

    <div class="user-card-body">
        <div class="user-card-info">
            <h4 class="user-card-name" style="color: <?php echo e($roleColor); ?>"><?php echo e($user->name); ?></h4>
            <?php if(!$user->isOnline()): ?>
                <span class="user-card-offline text-muted"><?php echo e($user->getLastLoggedPhrase()); ?></span>
            <?php endif; ?>
        </div>

        <?php if(count($roles) > 0): ?>
            <div class="user-card-roles">
                <?php $first = $roles[0]; ?>
                <div class="role-pill" style="--pill-color: <?php echo e($first->color); ?>">
                    <span class="role-swatch" style="background: <?php echo e($first->color); ?>"></span>
                    <span class="role-name"><?php echo e($first->name); ?></span>
                </div>

                <?php if(count($roles) > 1): ?>
                    <div class="roles-extra">
                        <?php $displayExtra = min(count($roles) - 1, 4); ?>
                        <?php for($i = 1; $i <= $displayExtra; $i++): ?>
                            <?php $role = $roles[$i]; ?>
                            <span class="role-dot" style="--dot-color: <?php echo e($role->color); ?>" data-tooltip="<?php echo e($role->name); ?>"></span>
                        <?php endfor; ?>

                        <?php if(count($roles) - 1 > 4): ?>
                            <?php $remaining = count($roles) - 1 - 4; ?>
                            <span class="role-dot more" data-tooltip="#user_roles_<?php echo e($user->id); ?>">+<?php echo e($remaining); ?></span>
                            <div id="user_roles_<?php echo e($user->id); ?>" class="d-none">
                                <ul class="user-roles-list">
                                    <?php for($a = 1; $a < count($roles); $a++): ?>
                                        <?php $role = $roles[$a]; ?>
                                        <li>
                                            <div class="user-card-role">
                                                <span class="user-card-role-square" style="background: <?php echo e($role->color); ?>"></span>
                                                <span class="user-card-role-name"><?php echo e($role->name); ?></span>
                                            </div>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if(isset($sections['user-card'])): ?>
            <?php echo $sections['user-card']; ?>

        <?php endif; ?>

        <div class="user-card-goto">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'primary','size' => 'small','href' => ''.e(url('profile/' . $user->getUrl())).'','swap' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','size' => 'small','href' => ''.e(url('profile/' . $user->getUrl())).'','swap' => 'true']); ?>
                <?php echo e(__('profile.view')); ?>

                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/user-card.blade.php ENDPATH**/ ?>