<div class="about-system">
    <div class="about-system__support-banner">
        <h2><?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.music-notes-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?> <?php echo e(__('admin-about-system.labels.donate_title')); ?></h2>
        <p><?php echo e(__('admin-about-system.labels.donate_description')); ?></p>
        <div class="about-system__support-actions">
            <a href="https://github.com/Flute-CMS/cms/sponsors" target="_blank"
                class="about-system__btn about-system__btn--primary">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.heart-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.support.github_sponsors')); ?>

            </a>
            <a href="https://github.com/Flute-CMS/cms" target="_blank" class="about-system__btn">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.github-logo'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.support.github')); ?>

            </a>
        </div>
    </div>

    <div class="about-system__panels">
        <section class="about-system__panel">
            <h2 class="about-system__panel-title">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.sections.system_info.title')); ?>

            </h2>

            <div class="about-system__grid">
                <div class="about-system__grid-item">
                    <div class="about-system__grid-label"><?php echo e(__('admin-about-system.labels.author')); ?></div>
                    <div class="about-system__grid-value">
                        <a href="https://github.com/FlamesONE" target="_blank">
                            <?php echo e(explode(' <', $systemInfo['author'])[0] ?? $systemInfo['author']); ?>

                        </a>
                    </div>
                </div>

                <div class="about-system__grid-item">
                    <div class="about-system__grid-label"><?php echo e(__('admin-about-system.labels.project_link')); ?></div>
                    <div class="about-system__grid-value">
                        <a href="<?php echo e($systemInfo['project_link']); ?>" target="_blank">GitHub</a>
                    </div>
                </div>

                <div class="about-system__grid-item">
                    <div class="about-system__grid-label"><?php echo e(__('admin-about-system.labels.license')); ?></div>
                    <div class="about-system__grid-value">
                        <span class="badge primary"><?php echo e($systemInfo['license']); ?></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-system__panel">
            <h2 class="about-system__panel-title">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.code'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.sections.php_info.title')); ?>

            </h2>

            <div class="about-system__grid">
                <?php $__currentLoopData = ['version', 'memory_limit', 'max_execution_time', 'upload_max_filesize', 'post_max_size', 'opcache']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($phpInfo[$key])): ?>
                        <?php
                            $hasWarning = isset($phpWarnings[$key]);
                            $warningMessage = $hasWarning ? $phpWarnings[$key] : '';
                        ?>

                        <div
                            class="about-system__grid-item <?php echo e($hasWarning ? 'about-system__grid-item--warning' : ''); ?>">
                            <div class="about-system__grid-label">
                                <?php echo e(__('admin-about-system.labels.' . $key)); ?>

                                <?php if($hasWarning): ?>
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.warning','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-tooltip' => ''.e($warningMessage).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="about-system__grid-value">
                                <?php if($key === 'version'): ?>
                                    <span
                                        class="about-system__badge <?php echo e($phpVersionValid ? 'about-system__badge--success' : 'about-system__badge--warning'); ?>">
                                        <?php echo e($phpInfo[$key]); ?>

                                    </span>
                                <?php elseif($key === 'opcache' || $key === 'jit'): ?>
                                    <span
                                        class="about-system__badge <?php echo e($phpInfo[$key] === 'Enabled' ? 'about-system__badge--success' : 'about-system__badge--warning'); ?>">
                                        <?php echo e($phpInfo[$key]); ?>

                                    </span>
                                <?php else: ?>
                                    <?php echo e($phpInfo[$key]); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>

    <div class="about-system__panels">
        <section class="about-system__panel">
            <h2 class="about-system__panel-title">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.database'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.sections.server_info.title')); ?>

            </h2>

            <div class="about-system__grid">
                <?php $__currentLoopData = $serverInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="about-system__grid-item">
                        <div class="about-system__grid-label"><?php echo e(__('admin-about-system.labels.' . $key)); ?></div>
                        <div class="about-system__grid-value"><?php echo e($value); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <section class="about-system__panel">
            <h2 class="about-system__panel-title">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.chart-line-up'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.sections.system_health.title')); ?>

            </h2>

            <div class="about-system__health">
                <div class="about-system__health-item">
                    <div class="about-system__health-label"><?php echo e(__('admin-about-system.labels.memory_usage')); ?></div>
                    <div class="about-system__health-bar">
                        <?php
                            $memoryUsage = memory_get_usage(true);
                            $memoryLimit = ini_get('memory_limit');
                            $memoryLimitBytes = preg_replace('/[^0-9]/', '', $memoryLimit) * 1024 * 1024;
                            $memoryPercentage =
                                $memoryLimitBytes > 0 ? min(100, round(($memoryUsage / $memoryLimitBytes) * 100)) : 0;

                            $statusClass = 'about-system__health-bar-fill--success';
                            if ($memoryPercentage > 70) {
                                $statusClass = 'about-system__health-bar-fill--warning';
                            }
                            if ($memoryPercentage > 85) {
                                $statusClass = 'about-system__health-bar-fill--error';
                            }
                        ?>
                        <div class="about-system__health-bar-fill <?php echo e($statusClass); ?>"
                            style="width: <?php echo e($memoryPercentage); ?>%"></div>
                    </div>
                    <div class="about-system__health-value">
                        <?php echo e(round($memoryUsage / 1024 / 1024, 1)); ?>MB / <?php echo e($memoryLimit); ?>

                    </div>
                </div>

                <div class="about-system__health-item">
                    <div class="about-system__health-label"><?php echo e(__('admin-about-system.labels.disk_usage')); ?></div>
                    <div class="about-system__health-bar">
                        <?php
                            $diskTotal = disk_total_space(__DIR__);
                            $diskFree = disk_free_space(__DIR__);
                            $diskUsed = $diskTotal - $diskFree;
                            $diskPercentage = round(($diskUsed / $diskTotal) * 100);

                            $statusClass = 'about-system__health-bar-fill--success';
                            if ($diskPercentage > 70) {
                                $statusClass = 'about-system__health-bar-fill--warning';
                            }
                            if ($diskPercentage > 85) {
                                $statusClass = 'about-system__health-bar-fill--error';
                            }
                        ?>
                        <div class="about-system__health-bar-fill <?php echo e($statusClass); ?>"
                            style="width: <?php echo e($diskPercentage); ?>%">
                        </div>
                    </div>
                    <div class="about-system__health-value">
                        <?php echo e(round($diskUsed / 1024 / 1024 / 1024, 1)); ?>GB /
                        <?php echo e(round($diskTotal / 1024 / 1024 / 1024, 1)); ?>GB
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="about-system__panels">
        <section class="about-system__panel">
            <h2 class="about-system__panel-title">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.cpu'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.sections.resources.title')); ?>

            </h2>

            <div class="about-system__grid">
                
                <div class="about-system__grid-item">
                    <div class="about-system__grid-label"><?php echo e(__('admin-about-system.labels.cpu_load')); ?></div>
                    <div class="about-system__grid-value">
                        <?php echo e($resourceUsage['cpu_load']['1min']); ?> (1m),
                        <?php echo e($resourceUsage['cpu_load']['5min']); ?> (5m),
                        <?php echo e($resourceUsage['cpu_load']['15min']); ?> (15m)
                    </div>
                </div>

                
                <div class="about-system__grid-item">
                    <div class="about-system__grid-label"><?php echo e(__('admin-about-system.labels.ram_usage')); ?></div>
                    <div class="about-system__grid-value">
                        
                        <?php
                            $ramPct = $resourceUsage['ram']['percent'];
                            $ramBarClass =
                                $ramPct > 85
                                    ? 'about-system__health-bar-fill--error'
                                    : ($ramPct > 70
                                        ? 'about-system__health-bar-fill--warning'
                                        : 'about-system__health-bar-fill--success');
                        ?>
                        <div class="about-system__health-bar">
                            <div class="about-system__health-bar-fill <?php echo e($ramBarClass); ?>"
                                style="width: <?php echo e($ramPct); ?>%">
                            </div>
                        </div>
                        <?php echo e(\Flute\Admin\Packages\AboutSystem\Helpers\AboutSystemHelper::formatBytes($resourceUsage['ram']['used'])); ?>

                        /
                        <?php echo e(\Flute\Admin\Packages\AboutSystem\Helpers\AboutSystemHelper::formatBytes($resourceUsage['ram']['total'])); ?>

                        (<?php echo e($ramPct); ?>%)
                    </div>
                </div>
            </div>
        </section>

        <section class="about-system__panel about-system__panel--full">
            <h2 class="about-system__panel-title">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.plug'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('admin-about-system.sections.requirements.title')); ?>

            </h2>

            <div class="about-system__requirements">
                <?php $__currentLoopData = $requiredExtensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $itemClass = 'about-system__requirements-item';
                        $iconName = 'ph.regular.check-circle';

                        if ($info['required']) {
                            $itemClass .= ' about-system__requirements-item--required';
                        }

                        if ($info['loaded']) {
                            $itemClass .= ' about-system__requirements-item--loaded';
                        } else {
                            $iconName = 'ph.regular.x-circle';
                            $itemClass .= $info['required']
                                ? ' about-system__requirements-item--not-loaded'
                                : ' about-system__requirements-item--warning';
                        }
                    ?>

                    <div class="<?php echo e($itemClass); ?>">
                        <div class="about-system__requirements-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($iconName).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="about-system__requirements-content">
                            <div class="about-system__requirements-name">
                                <?php echo e($extension); ?>

                                <?php if($info['required']): ?>
                                    <span class="about-system__requirements-required"
                                        data-tooltip="<?php echo e(__('admin-about-system.requirements.required_extension')); ?>">
                                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="about-system__requirements-description"><?php echo e($info['description']); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/AboutSystem/Resources/views/index.blade.php ENDPATH**/ ?>