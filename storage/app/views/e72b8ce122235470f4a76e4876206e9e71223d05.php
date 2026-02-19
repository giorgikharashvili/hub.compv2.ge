<div class="updates-panel">
    <div class="headerbar">
        <div class="channel" title="<?php echo e(__('admin-update.updates_available')); ?>">
            <div class="toggle-group" aria-label="<?php echo e(__('admin-update.update_channel')); ?>">
                <button class="toggle <?php echo e(config('app.update_channel', 'stable') === 'stable' ? 'active' : ''); ?>"
                    yoyo:val.channel="stable" yoyo:post="switchChannel"><?php echo e(__('admin-update.channel_stable')); ?></button>
                <button class="toggle <?php echo e(config('app.update_channel', 'stable') === 'early' ? 'active' : ''); ?>"
                    yoyo:val.channel="early" yoyo:post="switchChannel"><?php echo e(__('admin-update.channel_early')); ?></button>
            </div>
        </div>
        <div class="actions">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['size' => 'sm','type' => 'secondary','yoyo:post' => 'handleCheckUpdates']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','type' => 'secondary','yoyo:post' => 'handleCheckUpdates']); ?>
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.arrows-clockwise-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-update.check_updates')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php $hasUpdates = !empty($update) || !empty($modules) || !empty($themes); ?>
            <?php if($hasUpdates): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['size' => 'sm','type' => 'accent','yoyo:post' => 'handleUpdateAll','hxFluteConfirm' => ''.e(__('admin-update.update_all_confirm')).'','hxFluteConfirmType' => 'success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','type' => 'accent','yoyo:post' => 'handleUpdateAll','hx-flute-confirm' => ''.e(__('admin-update.update_all_confirm')).'','hx-flute-confirm-type' => 'success']); ?>
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.arrow-circle-up-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php echo e(__('admin-update.update_all')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="content-col">
        <?php if(!empty($update)): ?>
            <section class="card card-primary">
                <i class="overlay-border-shift" aria-hidden="true"></i>
                <div class="card-row">
                    <div class="info">
                        <div class="name">CMS</div>
                        <div class="sub">
                            <span class="kv"><?php echo e(__('admin-update.current')); ?>:</span>
                            <span class="badge neutral">v<?php echo e($current_version); ?></span>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-right','class' => 'sep'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span class="kv"><?php echo e(__('admin-update.available')); ?>:</span>
                            <span class="badge accent">v<?php echo e($update['version']); ?></span>
                        </div>
                        <div class="meta"><?php echo e($update['release_date'] ?? date(default_date_format(true))); ?></div>
                    </div>
                    <div class="cta">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['size' => 'sm','yoyo:post' => 'handleUpdate','yoyo:val.type' => 'cms','hxFluteConfirm' => ''.e(__('admin-update.update_confirm')).'','hxFluteConfirmType' => 'info','hxFluteActionKey' => 'cms_update_'.e(str_replace('.', '_', $update['version'])).'','hxTrigger' => 'confirmed','type' => 'accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','yoyo:post' => 'handleUpdate','yoyo:val.type' => 'cms','hx-flute-confirm' => ''.e(__('admin-update.update_confirm')).'','hx-flute-confirm-type' => 'info','hx-flute-action-key' => 'cms_update_'.e(str_replace('.', '_', $update['version'])).'','hx-trigger' => 'confirmed','type' => 'accent']); ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.arrow-circle-up-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php echo e(__('admin-update.update')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <details class="more">
                    <summary>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right','class' => 'chevron'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <span><?php echo e(__('admin-update.more_info')); ?></span>
                    </summary>
                    <div class="more-body">
                        <?php if(!empty($update['changelog_html'])): ?>
                            <?php echo $__env->make('admin-update::components.markdown', [
                                'html' => $update['changelog_html'],
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif(!empty($update['changes'])): ?>
                            <ul class="changes">
                                <?php $__currentLoopData = $update['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $changeItem = preg_replace('/^\s*[-*]\s*/', '', (string) $change); ?>
                                    <li><?php echo $__env->make('admin-update::components.markdown', ['markdown' => $changeItem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php elseif(!empty($update['changelog'])): ?>
                            <?php echo $__env->make('admin-update::components.markdown', ['markdown' => $update['changelog']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </details>
                <?php if(!empty($update['previous_versions'])): ?>
                    <details class="versions">
                        <summary>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right','class' => 'chevron'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span><?php echo e(__('admin-update.version_history')); ?></span>
                        </summary>
                        <div class="history-timeline">
                            <?php $__currentLoopData = $update['previous_versions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="timeline-item">
                                    <div class="timeline-header">
                                        <span class="timeline-version">v<?php echo e($v['version']); ?></span>
                                        <span class="timeline-date"><?php echo e($v['release_date'] ?? ''); ?></span>
                                    </div>
                                    <div class="timeline-content">
                                        <?php if(!empty($v['changelog_html'])): ?>
                                            <?php echo $__env->make('admin-update::components.markdown', [
                                                'html' => $v['changelog_html'],
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         <?php elseif(!empty($v['changes'])): ?>
                                             <ul>
                                                 <?php $__currentLoopData = $v['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $changeItem = preg_replace('/^\s*[-*]\s*/', '', (string) $c); ?>
                                                     <li><?php echo $__env->make('admin-update::components.markdown', [
                                                         'markdown' => $changeItem,
                                                     ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </ul>
                                         <?php elseif(!empty($v['changelog'])): ?>
                                             <?php echo $__env->make('admin-update::components.markdown', ['markdown' => $v['changelog']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </details>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <?php if(!empty($modules) || !empty($themes)): ?>
            <h3 class="section-title"><?php echo e(__('admin-update.also_available')); ?></h3>
        <?php endif; ?>

        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleId => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="card card-compact">
                <div class="card-row">
                    <div class="info">
                        <div class="name"><?php echo e($m['name']); ?></div>
                        <div class="sub">
                            <span class="kv"><?php echo e(__('admin-update.current')); ?>:</span>
                            <span class="badge neutral">v<?php echo e($m['current_version']); ?></span>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-right','class' => 'sep'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span class="kv"><?php echo e(__('admin-update.available')); ?>:</span>
                            <span class="badge accent">v<?php echo e($m['version']); ?></span>
                        </div>
                    </div>
                    <div class="cta"
                        yoyo:vals='{"id": "<?php echo e($moduleId); ?>", "version": "<?php echo e($m['version']); ?>", "type": "module"}'>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['yoyo:post' => 'handleUpdate','hxFluteConfirm' => ''.e(__('admin-update.update_confirm')).'','hxFluteConfirmType' => 'info','hxFluteActionKey' => 'module_update_'.e($moduleId).'_'.e(str_replace('.', '_', $m['version'])).'','hxTrigger' => 'confirmed','type' => 'accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['yoyo:post' => 'handleUpdate','hx-flute-confirm' => ''.e(__('admin-update.update_confirm')).'','hx-flute-confirm-type' => 'info','hx-flute-action-key' => 'module_update_'.e($moduleId).'_'.e(str_replace('.', '_', $m['version'])).'','hx-trigger' => 'confirmed','type' => 'accent']); ?>
                            <?php echo e(__('admin-update.update')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <details class="more">
                    <summary>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right','class' => 'chevron'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <span><?php echo e(__('admin-update.more_info')); ?></span>
                    </summary>
                    <div class="more-body">
                        <?php if(!empty($m['changelog_html'])): ?>
                            <?php echo $__env->make('admin-update::components.markdown', ['html' => $m['changelog_html']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif(!empty($m['changes'])): ?>
                            <ul class="changes">
                                <?php $__currentLoopData = $m['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $changeItem = preg_replace('/^\s*[-*]\s*/', '', (string) $change); ?>
                                    <li><?php echo $__env->make('admin-update::components.markdown', ['markdown' => $changeItem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php elseif(!empty($m['changelog'])): ?>
                            <?php echo $__env->make('admin-update::components.markdown', ['markdown' => $m['changelog']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif(!empty($m['description'])): ?>
                            <?php
                                $desc = (string) $m['description'];
                                $hasNewlines = str_contains((string)$desc, "\n");
                                $inlineDashCount = preg_match_all('/\s-\s+/', $desc, $__m) ?: 0;
                                $looksLikeInlineList = !$hasNewlines && $inlineDashCount > 0;
                            ?>
                            <?php if($looksLikeInlineList): ?>
                                <ul class="changes">
                                    <?php $__currentLoopData = preg_split('/\s-\s+/', ltrim($desc, " -")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(trim($item) !== ''): ?>
                                            <li><?php echo $__env->make('admin-update::components.markdown', ['markdown' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <?php echo $__env->make('admin-update::components.markdown', [
                                    'markdown' => $desc,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </details>
                <?php if(!empty($m['previous_versions'])): ?>
                    <details class="versions">
                        <summary>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right','class' => 'chevron'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span><?php echo e(__('admin-update.version_history')); ?></span>
                        </summary>
                        <div class="history-timeline">
                            <?php $__currentLoopData = $m['previous_versions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="timeline-item">
                                    <div class="timeline-header">
                                        <span class="timeline-version">v<?php echo e($v['version']); ?></span>
                                        <span class="timeline-date"><?php echo e($v['release_date'] ?? ''); ?></span>
                                    </div>
                                    <div class="timeline-content">
                                        <?php if(!empty($v['changelog_html'])): ?>
                                            <?php echo $__env->make('admin-update::components.markdown', [
                                                'html' => $v['changelog_html'],
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         <?php elseif(!empty($v['changes'])): ?>
                                             <ul>
                                                 <?php $__currentLoopData = $v['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $changeItem = preg_replace('/^\s*[-*]\s*/', '', (string) $c); ?>
                                                     <li><?php echo $__env->make('admin-update::components.markdown', [
                                                         'markdown' => $changeItem,
                                                     ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </ul>
                                         <?php elseif(!empty($v['changelog'])): ?>
                                             <?php echo $__env->make('admin-update::components.markdown', ['markdown' => $v['changelog']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </details>
                <?php endif; ?>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $themeId => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="card card-compact">
                <div class="card-row">
                    <div class="info">
                        <div class="name"><?php echo e($t['name']); ?></div>
                        <div class="sub">
                            <span class="kv"><?php echo e(__('admin-update.current')); ?>:</span>
                            <span class="badge neutral">v<?php echo e($t['current_version']); ?></span>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-right','class' => 'sep'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span class="kv"><?php echo e(__('admin-update.available')); ?>:</span>
                            <span class="badge accent">v<?php echo e($t['version']); ?></span>
                        </div>
                    </div>
                    <div class="cta"
                        yoyo:vals='{"id": "<?php echo e($themeId); ?>", "version": "<?php echo e($t['version']); ?>", "type": "theme"}'>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['yoyo:post' => 'handleUpdate','hxFluteConfirm' => ''.e(__('admin-update.update_confirm')).'','hxFluteConfirmType' => 'info','hxFluteActionKey' => 'theme_update_'.e($themeId).'_'.e(str_replace('.', '_', $t['version'])).'','hxTrigger' => 'confirmed','type' => 'accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['yoyo:post' => 'handleUpdate','hx-flute-confirm' => ''.e(__('admin-update.update_confirm')).'','hx-flute-confirm-type' => 'info','hx-flute-action-key' => 'theme_update_'.e($themeId).'_'.e(str_replace('.', '_', $t['version'])).'','hx-trigger' => 'confirmed','type' => 'accent']); ?>
                            <?php echo e(__('admin-update.update')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <details class="more">
                    <summary>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right','class' => 'chevron'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <span><?php echo e(__('admin-update.more_info')); ?></span>
                    </summary>
                    <div class="more-body">
                        <?php if(!empty($t['changelog_html'])): ?>
                            <?php echo $__env->make('admin-update::components.markdown', ['html' => $t['changelog_html']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif(!empty($t['changes'])): ?>
                            <ul class="changes">
                                <?php $__currentLoopData = $t['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $changeItem = preg_replace('/^\s*[-*]\s*/', '', (string) $change); ?>
                                    <li><?php echo $__env->make('admin-update::components.markdown', ['markdown' => $changeItem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php elseif(!empty($t['changelog'])): ?>
                            <?php echo $__env->make('admin-update::components.markdown', ['markdown' => $t['changelog']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </details>
                <?php if(!empty($t['previous_versions'])): ?>
                    <details class="versions">
                        <summary>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right','class' => 'chevron'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span><?php echo e(__('admin-update.version_history')); ?></span>
                        </summary>
                        <div class="history-timeline">
                            <?php $__currentLoopData = $t['previous_versions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="timeline-item">
                                    <div class="timeline-header">
                                        <span class="timeline-version">v<?php echo e($v['version']); ?></span>
                                        <span class="timeline-date"><?php echo e($v['release_date'] ?? ''); ?></span>
                                    </div>
                                    <div class="timeline-content">
                                        <?php if(!empty($v['changelog_html'])): ?>
                                            <?php echo $__env->make('admin-update::components.markdown', [
                                                'html' => $v['changelog_html'],
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         <?php elseif(!empty($v['changes'])): ?>
                                             <ul>
                                                 <?php $__currentLoopData = $v['changes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $changeItem = preg_replace('/^\s*[-*]\s*/', '', (string) $c); ?>
                                                     <li><?php echo $__env->make('admin-update::components.markdown', [
                                                         'markdown' => $changeItem,
                                                     ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </ul>
                                         <?php elseif(!empty($v['changelog'])): ?>
                                             <?php echo $__env->make('admin-update::components.markdown', ['markdown' => $v['changelog']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </details>
                <?php endif; ?>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(empty($update) && empty($modules) && empty($themes)): ?>
            <?php echo $__env->make('admin-update::components.no-updates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Update/Resources/views/layouts/update-center.blade.php ENDPATH**/ ?>