<?php $__env->startSection('title'); ?>
    <?php echo e(__('def.profile') . " - {$user->name}"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (\Illuminate\Support\Facades\Blade::check('auth')): ?>
                    <?php if(!$user->password && user()->id === $user->id && !config('auth.only_social')): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'warning','onlyBorders' => true,'withClose' => 'false','hxBoost' => 'true','hxTarget' => '#main','hxSwap' => 'outerHTML transition:true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','onlyBorders' => true,'withClose' => 'false','hx-boost' => 'true','hx-target' => '#main','hx-swap' => 'outerHTML transition:true']); ?>
                            <?php echo __('profile.protection_warning', [':link' => url('/profile/settings?tab=main#password-settings')]); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('auth')): ?>
                    <?php if(!$user->verified && config('auth.registration.confirm_email') && user()->id === $user->id): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'warning','onlyBorders' => true,'withClose' => 'false','hxBoost' => 'true','hxTarget' => '#main','hxSwap' => 'outerHTML transition:true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','onlyBorders' => true,'withClose' => 'false','hx-boost' => 'true','hx-target' => '#main','hx-swap' => 'outerHTML transition:true']); ?>
                            <?php echo __('profile.verification_warning', [':link' => url('/profile/settings')]); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('auth')): ?>
                    <?php if($user->hidden && user()->id === $user->id): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'warning','onlyBorders' => true,'withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','onlyBorders' => true,'withClose' => 'false']); ?>
                            <?php echo __('profile.hidden_warning'); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php echo $__env->yieldPushContent('profile_alerts_wrapper'); ?>

                <?php if(isset($sections['profile_alerts_wrapper'])): ?>
                    <?php echo $sections['profile_alerts_wrapper']; ?>

                <?php endif; ?>

                <article class="profile" data-profile-id="<?php echo e($user->id); ?>" itemscope
                    itemtype="https://schema.org/Person">
                    <header class="profile__banner-wrapper">
                        <div class="profile__banner-wrapper-inner">
                            <img src="<?php echo e(url($user->banner)); ?>"
                                alt="<?php echo e(__('profile.banner_alt', ['name' => $user->name])); ?>" class="profile__banner"
                                loading="lazy" data-profile-banner="<?php echo e($user->banner); ?>"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';" />
                            <div class="profile__banner-fallback"
                                style="display: none; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100%; width: 100%;">
                            </div>
                        </div>

                        <?php if(isset($sections['profile_banner_wrapper'])): ?>
                            <?php echo $sections['profile_banner_wrapper']; ?>

                        <?php endif; ?>
                    </header>

                    <?php if (\Illuminate\Support\Facades\Blade::check('auth')): ?>
                        <?php if(!$user->isTemporary()): ?>
                            <?php if((user()->can('admin.users') && user()->can($user)) || $user->id === user()->id): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['size' => 'medium','href' => ''.e(url($user->id !== user()->id ? 'admin/users/' . $user->id . '/edit' : 'profile/settings')).'','class' => 'profile__edit-btn','hxBoost' => ''.e($user->id !== user()->id ? 'false' : 'true').'','hxTarget' => '#main','hxSwap' => 'outerHTML transition:true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'medium','href' => ''.e(url($user->id !== user()->id ? 'admin/users/' . $user->id . '/edit' : 'profile/settings')).'','class' => 'profile__edit-btn','hx-boost' => ''.e($user->id !== user()->id ? 'false' : 'true').'','hx-target' => '#main','hx-swap' => 'outerHTML transition:true']); ?>
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.pencil'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <?php echo __('def.edit'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="profile__main">
                        <aside class="profile__sidebar" role="complementary">
                            <div class="profile__hero">
                                <div class="profile__hero-avatar">
                                    <img src="<?php echo e(url($user->avatar)); ?>"
                                        alt="<?php echo e(__('profile.avatar_alt', ['name' => $user->name])); ?>"
                                        class="profile__avatar" loading="lazy" data-profile-avatar="<?php echo e($user->avatar); ?>"
                                        onerror="this.src='<?php echo e(asset('assets/img/no-avatar.webp')); ?>'; this.onerror=null;"
                                        itemprop="image" />
                                </div>

                                <h1 class="profile__hero-name" data-profile-name="<?php echo e($user->name); ?>" itemprop="name">
                                    <?php echo e($user->name); ?>

                                    <?php if($user->isOnline()): ?>
                                        <span class="profile__status profile__status--online"
                                            data-profile-status="<?php echo e(__('def.online')); ?>"
                                            aria-label="<?php echo e(__('def.online')); ?>"><?php echo e(__('def.online')); ?></span>
                                    <?php endif; ?>
                                </h1>

                                <?php if(sizeof($user->roles)): ?>
                                    <div class="profile__roles" itemprop="jobTitle">
                                        <ul class="profile__roles-list" role="list">
                                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="profile__role">
                                                    <span class="profile__role-square"
                                                        style="background: <?php echo e($role->color); ?>" aria-hidden="true">
                                                    </span>
                                                    <span class="profile__role-name">
                                                        <?php echo e($role->name); ?>

                                                    </span>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                        <?php if(isset($sections['profile_roles'])): ?>
                                            <?php echo $sections['profile_roles']; ?>

                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="profile__hero-meta">
                                    <?php if(!$user->isOnline()): ?>
                                        <span class="profile__status profile__status--offline">
                                            <?php echo e($user->getLastLoggedPhrase()); ?>

                                        </span>
                                    <?php endif; ?>
                                    <span itemprop="memberOf" itemscope itemtype="https://schema.org/Organization">
                                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.calendar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-hidden' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                                        <time datetime="<?php echo e(carbon($user->createdAt)->toISOString()); ?>"
                                            itemprop="foundingDate">
                                            <?php echo e(__('profile.member_since', [':date' => carbon($user->createdAt)->format('d.m.Y')])); ?>

                                        </time>
                                    </span>
                                    <?php if($user->login): ?>
                                        <span itemprop="alternateName">
                                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.at'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-hidden' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                                            <?php echo e($user->login); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                                <?php if($user->socialNetworks): ?>
                                    <nav class="profile__socials" aria-label="<?php echo e(__('profile.social_networks')); ?>">
                                        <ul class="profile__socials-list" role="list">
                                            <?php $__currentLoopData = $user->socialNetworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!$social->hidden || (user()->isLoggedIn() && (user()->can('admin.users') || user()->id === $row->id))): ?>
                                                    <li class="profile__socials-item-wrapper">
                                                        <a href="<?php echo e($social->url); ?>" class="profile__socials-item"
                                                            target="_blank" data-tooltip="<?php echo e($social->name); ?>"
                                                            rel="noopener nofollow"
                                                            aria-label="<?php echo e(__('profile.visit_social', ['network' => $social->name])); ?>"
                                                            itemprop="sameAs">
                                                            <div class="profile__socials-item-icon">
                                                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($social->socialNetwork->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-hidden' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </nav>
                                <?php endif; ?>

                                <?php if(isset($sections['profile_hero_info'])): ?>
                                    <?php echo $sections['profile_hero_info']; ?>

                                <?php endif; ?>
                            </div>

                            <?php if(isset($sections['profile_sidebar'])): ?>
                                <?php echo $sections['profile_sidebar']; ?>

                            <?php endif; ?>
                        </aside>

                        <section class="profile__content-wrapper" role="main">
                            <?php if($tabs->count() === 0 && user()->can('admin.boss')): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'info','onlyBorders' => true,'style' => 'margin-top: 4.5rem;','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','onlyBorders' => true,'style' => 'margin-top: 4.5rem;','withClose' => 'false']); ?>
                                    <?php echo __('profile.no_profile_modules_info', [':link' => url('/admin/catalog')]); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                                <div class="profile__content">
                                    <nav aria-label="<?php echo e(__('profile.profile_tabs')); ?>">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.tabs','data' => ['name' => 'profile-tabs','hxPushUrl' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'profile-tabs','hx-push-url' => 'true']); ?>
                                             <?php $__env->slot('headings', null, []); ?> 
                                                <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.tab-heading','data' => ['name' => ''.e($tab['path']).'','url' => ''.e($tab['path'] === $activePath ? '' : url('profile/' . $user->getUrl())->addParams(['tab' => $tab['path']])).'','withoutHtmx' => ''.e($tab['path'] === $activePath).'','active' => ''.e($tab['path'] === $activePath).'','ariaLabel' => ''.e(__($tab['title'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($tab['path']).'','url' => ''.e($tab['path'] === $activePath ? '' : url('profile/' . $user->getUrl())->addParams(['tab' => $tab['path']])).'','withoutHtmx' => ''.e($tab['path'] === $activePath).'','active' => ''.e($tab['path'] === $activePath).'','aria-label' => ''.e(__($tab['title'])).'']); ?>
                                                        <?php if($tab['icon']): ?>
                                                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($tab['icon']).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-hidden' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php echo __($tab['title']); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php $__env->endSlot(); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </nav>

                                    <div class="profile__overflow-tabs">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.tab-body','data' => ['name' => 'profile-tabs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'profile-tabs']); ?>
                                            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.tab-content','data' => ['name' => ''.e($tab['path']).'','active' => ''.e($tab['path'] === $activePath).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($tab['path']).'','active' => ''.e($tab['path'] === $activePath).'']); ?>
                                                    <?php if(isset($sections['profile_tab_content_' . $tab['path']])): ?>
                                                        <?php echo $sections['profile_tab_content_' . $tab['path']]; ?>

                                                    <?php endif; ?>
                                                    <?php if($tab['path'] === $activePath): ?>
                                                        <?php echo $initialTabHtml ?? ''; ?>

                                                    <?php else: ?>
                                                        <?php echo $__env->make('flute::partials.tab-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </section>
                    </div>
                </article>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/pages/profile.js'), false); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('flute::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/pages/profile/index.blade.php ENDPATH**/ ?>