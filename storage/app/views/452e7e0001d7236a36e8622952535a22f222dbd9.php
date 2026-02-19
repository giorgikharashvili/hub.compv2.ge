<?php
    $useLazyLoad = $lazyload ?? false;
    $sticky = $sticky ?? true;
    $parentSlug = $parentSlug ?? '';
    $uniqueSlug = $parentSlug ? $parentSlug . '_' . $slug : $slug;
?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.tabs','data' => ['name' => $uniqueSlug,'pills' => $pills ?? false,'sticky' => $sticky ?? true,'yoyo:ignore' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($uniqueSlug),'pills' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pills ?? false),'sticky' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sticky ?? true),'yoyo:ignore' => true]); ?>
     <?php $__env->slot('headings', null, []); ?> 
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $slugName = $tab['slug'] ?? \Illuminate\Support\Str::slug($name);
                $uniqueSlugName = $uniqueSlug . '__' . $slugName;
                $isActive = $activeTab === $slugName || ($tab['active'] ?? false);
            ?>

            <?php if($useLazyLoad): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.tab-heading','data' => ['name' => ''.e($uniqueSlugName).'','badge' => $tab['badge'] ?? null,'active' => $isActive,'url' => ''.e(url($templateSlug)->withGet()->removeParams(['yoyo-id', 'component'])->addParams(['tab-'.$slug => $slugName])->get()).'','hxInclude' => 'none','shouldTrigger' => false,'hxBoost' => 'true','hxTarget' => '#tab__'.e($uniqueSlugName).'','hxSelect' => '#tab__'.e($uniqueSlugName).'','hxPushUrl' => 'true','hxSwap' => ''.e($morph ? 'morph:outerHTML transition:true' : 'outerHTML transition:true').'','hxParams' => 'not yoyo-id,component']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($uniqueSlugName).'','badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tab['badge'] ?? null),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isActive),'url' => ''.e(url($templateSlug)->withGet()->removeParams(['yoyo-id', 'component'])->addParams(['tab-'.$slug => $slugName])->get()).'','hx-include' => 'none','shouldTrigger' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'hx-boost' => 'true','hx-target' => '#tab__'.e($uniqueSlugName).'','hx-select' => '#tab__'.e($uniqueSlugName).'','hx-push-url' => 'true','hx-swap' => ''.e($morph ? 'morph:outerHTML transition:true' : 'outerHTML transition:true').'','hx-params' => 'not yoyo-id,component']); ?>

                    <?php if($tab['icon'] ?? false): ?>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($tab['icon']).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php endif; ?>

                    <?php echo __($tab['title'] ?? $name); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.tab-heading','data' => ['name' => ''.e($uniqueSlugName).'','badge' => $tab['badge'] ?? null,'active' => $isActive,'shouldTrigger' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($uniqueSlugName).'','badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tab['badge'] ?? null),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isActive),'shouldTrigger' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                    <?php if($tab['icon'] ?? false): ?>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($tab['icon']).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php endif; ?>

                    <?php echo __($tab['title'] ?? $name); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.tab-body','data' => ['name' => ''.e($uniqueSlug).'','class' => 'mb-3 mt-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($uniqueSlug).'','class' => 'mb-3 mt-3']); ?>
    <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $slugName = $tab['slug'] ?? \Illuminate\Support\Str::slug($name);
            $uniqueSlugName = $uniqueSlug . '__' . $slugName;
            $isActive = $activeTab === $slugName || ($tab['active'] ?? false);
        ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.tab-content','data' => ['name' => ''.e($uniqueSlugName).'','active' => $isActive,'id' => 'tab__'.e($uniqueSlugName).'','class' => ''.e($useLazyLoad && !$isActive ? 'lazy-content' : '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($uniqueSlugName).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isActive),'id' => 'tab__'.e($uniqueSlugName).'','class' => ''.e($useLazyLoad && !$isActive ? 'lazy-content' : '').'']); ?>
            <?php if(! $useLazyLoad): ?>
                <?php $__currentLoopData = $tab['forms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $result; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php if($isActive): ?>
                    <?php $__currentLoopData = $tab['forms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $result; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="row gx-3 gy-3 tab-skeleton-content">
                        <div class="col-md-8">
                            <div class="tabs-skeleton-card">
                                <div class="tabs-skeleton-card__header">
                                    <div class="skeleton tabs-skeleton-card__icon"></div>
                                    <div class="tabs-skeleton-card__title-group">
                                        <div class="skeleton tabs-skeleton-card__title"></div>
                                        <div class="skeleton tabs-skeleton-card__subtitle"></div>
                                    </div>
                                </div>
                                <div class="tabs-skeleton-card__content">
                                    <div class="tabs-skeleton-card__row tabs-skeleton-card__row--split">
                                        <div class="tabs-skeleton-card__field">
                                            <div class="skeleton tabs-skeleton-card__label"></div>
                                            <div class="skeleton tabs-skeleton-card__input"></div>
                                        </div>
                                        <div class="tabs-skeleton-card__field">
                                            <div class="skeleton tabs-skeleton-card__label"></div>
                                            <div class="skeleton tabs-skeleton-card__input"></div>
                                        </div>
                                    </div>
                                    <div class="tabs-skeleton-card__row">
                                        <div class="tabs-skeleton-card__field">
                                            <div class="skeleton tabs-skeleton-card__label"></div>
                                            <div class="skeleton tabs-skeleton-card__textarea"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tabs-skeleton-card">
                                <div class="tabs-skeleton-card__header">
                                    <div class="skeleton tabs-skeleton-card__icon"></div>
                                    <div class="tabs-skeleton-card__title-group">
                                        <div class="skeleton tabs-skeleton-card__title"></div>
                                    </div>
                                </div>
                                <div class="tabs-skeleton-card__content">
                                    <div class="tabs-skeleton-card__toggle">
                                        <div class="skeleton tabs-skeleton-card__toggle-switch"></div>
                                        <div class="skeleton tabs-skeleton-card__toggle-label"></div>
                                    </div>
                                    <div class="tabs-skeleton-card__toggle">
                                        <div class="skeleton tabs-skeleton-card__toggle-switch"></div>
                                        <div class="skeleton tabs-skeleton-card__toggle-label"></div>
                                    </div>
                                    <div class="tabs-skeleton-card__toggle">
                                        <div class="skeleton tabs-skeleton-card__toggle-switch"></div>
                                        <div class="skeleton tabs-skeleton-card__toggle-label"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tabs-skeleton-card">
                                <div class="tabs-skeleton-card__header">
                                    <div class="skeleton tabs-skeleton-card__icon"></div>
                                    <div class="tabs-skeleton-card__title-group">
                                        <div class="skeleton tabs-skeleton-card__title" style="width: 35%"></div>
                                        <div class="skeleton tabs-skeleton-card__subtitle" style="width: 20%"></div>
                                    </div>
                                </div>
                                <div class="tabs-skeleton-card__content">
                                    <div class="tabs-skeleton-card__row tabs-skeleton-card__row--split">
                                        <div class="tabs-skeleton-card__field">
                                            <div class="skeleton tabs-skeleton-card__label"></div>
                                            <div class="skeleton tabs-skeleton-card__input"></div>
                                        </div>
                                        <div class="tabs-skeleton-card__field">
                                            <div class="skeleton tabs-skeleton-card__label"></div>
                                            <div class="skeleton tabs-skeleton-card__input"></div>
                                        </div>
                                        <div class="tabs-skeleton-card__field">
                                            <div class="skeleton tabs-skeleton-card__label"></div>
                                            <div class="skeleton tabs-skeleton-card__input"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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
<?php endif; ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/tabs.blade.php ENDPATH**/ ?>