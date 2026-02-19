<div class="logs-viewer">
    <!-- Compact Filters -->
    <div class="logs-filters">
        <div class="filter-group">
            <label class="filter-label"><?php echo e(__('admin-logs.labels.log_file')); ?></label>
            <div class="filter-select">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.fields.select','data' => ['name' => 'logger','options' => collect($loggers)
                    ->mapWithKeys(function ($info, $name) {
                        return [$name => $name . ' (' . $info['size'] . ')'];
                    })
                    ->toArray(),'value' => ''.e($selectedLogger).'','yoyo' => true,'allowEmpty' => true,'placeholder' => ''.e(__('admin-logs.labels.select_file')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'logger','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(collect($loggers)
                    ->mapWithKeys(function ($info, $name) {
                        return [$name => $name . ' (' . $info['size'] . ')'];
                    })
                    ->toArray()),'value' => ''.e($selectedLogger).'','yoyo' => true,'allowEmpty' => true,'placeholder' => ''.e(__('admin-logs.labels.select_file')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>

        <?php if(!empty($loggers[$selectedLogger])): ?>
            <div class="filter-group">
                <label class="filter-label"><?php echo e(__('admin-logs.labels.level')); ?></label>
                <div class="filter-select">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.fields.select','data' => ['name' => 'level','options' => $levels,'value' => ''.e($selectedLevel).'','yoyo:change' => 'filterByLevel($event.target.value)','yoyo' => true,'allowEmpty' => true,'placeholder' => ''.e(__('admin-logs.labels.filter_by_level')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'level','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($levels),'value' => ''.e($selectedLevel).'','yoyo:change' => 'filterByLevel($event.target.value)','yoyo' => true,'allowEmpty' => true,'placeholder' => ''.e(__('admin-logs.labels.filter_by_level')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            <div class="logs-meta">
                <div class="meta-item">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.file-text'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                    <span><?php echo e(basename($loggers[$selectedLogger]['path'])); ?></span>
                </div>
                <div class="meta-item">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.database'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                    <span><?php echo e($loggers[$selectedLogger]['size']); ?></span>
                </div>
                <?php if(!empty($logContent)): ?>
                    <div class="meta-item">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.list-bullets'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                        <span><?php echo e(count($logContent)); ?> записей</span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Smart Logs Content -->
    <div class="logs-content">
        <?php if(empty($logContent)): ?>
            <div class="logs-empty">
                <div class="empty-icon">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.file-x'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '40']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                </div>
                <h5><?php echo e(__('admin-logs.labels.no_logs')); ?></h5>
                <p><?php echo e(__('admin-logs.labels.no_logs_description')); ?></p>
            </div>
        <?php else: ?>
            <div class="logs-list">
                <?php $__currentLoopData = $logContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $fileInfo = $entry['file_info'] ?? [];
                        $codeContext = $entry['code_context'] ?? [];
                        $contextData = json_decode($entry['context'] ?? '{}', true) ?? [];
                        $hasException = isset($contextData['exception']);
                        $hasStackTrace = strpos($entry['full_message'], 'Stack trace:') !== false;
                        $hasDetails = $hasException || $hasStackTrace || !empty($contextData) || !empty($codeContext);
                        
                        $errorType = '';
                        if (preg_match('/^([A-Z][a-zA-Z]+(?:Error|Exception|Warning))/', $entry['message'], $matches)) {
                            $errorType = $matches[1];
                        }
                        
                        $cleanMessage = preg_replace('/Stack trace:.*$/s', '', $entry['message']);
                        $cleanMessage = preg_replace('/in\s+.+\.php\s+on\s+line\s+\d+/', '', $cleanMessage);
                        $cleanMessage = trim($cleanMessage);
                    ?>

                    <div class="log-entry <?php echo e($entry['level']); ?>-level">
                        <!-- Log Header with Key Info -->
                        <div class="log-header">
                            <div class="log-meta">
                                <span class="level-badge level-<?php echo e($entry['level']); ?>">
                                    <?php echo e(strtoupper($entry['level'])); ?>

                                </span>
                                <span class="log-time"><?php echo e(date('d.m H:i:s', strtotime($entry['datetime']))); ?></span>
                                <span class="log-channel"><?php echo e($entry['channel']); ?></span>
                            </div>
                            
                            <?php if($hasDetails): ?>
                                <div class="log-actions">
                                    <button class="toggle-details" onclick="toggleDetails('<?php echo e($index); ?>')">
                                        <span class="show-text">Подробнее</span>
                                        <span class="hide-text hidden">Скрыть</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Log Body with Smart Info -->
                        <div class="log-body">
                            <div class="log-message">
                                <div class="message-preview">
                                    <?php if($errorType): ?>
                                        <span class="error-highlight"><?php echo e($errorType); ?></span>
                                    <?php endif; ?>
                                    <?php echo e($cleanMessage); ?>

                                </div>
                            </div>
                        </div>

                        <!-- Expandable Details -->
                        <?php if($hasDetails): ?>
                            <div id="details-<?php echo e($index); ?>" class="log-details hidden">
                                <div class="details-content">
                                    <?php if($hasStackTrace): ?>
                                        <div class="stack-trace"><?php echo e($entry['full_message']); ?></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($contextData)): ?>
                                        <div class="context-data">
                                            <div class="context-title">Дополнительные данные</div>
                                            <div class="context-json"><?php echo e(json_encode($contextData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($codeContext)): ?>
                                        <div class="code-context">
                                            <div class="code-header">
                                                <?php if(!empty($fileInfo['relative_path'])): ?>
                                                    <?php echo e($fileInfo['relative_path']); ?>:<?php echo e($fileInfo['line_number']); ?>

                                                <?php else: ?>
                                                    Контекст кода
                                                <?php endif; ?>
                                            </div>
                                            <div class="code-content">
                                                <?php $__currentLoopData = $codeContext; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="line <?php echo e($line['is_error_line'] ? 'error-line' : ''); ?>">
                                                        <span class="line-num"><?php echo e($line['line_number']); ?></span><?php echo e(htmlspecialchars($line['content'])); ?>

                                                    </span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer Actions -->
    <?php if(!empty($selectedLogger) && !empty($logContent)): ?>
        <div class="logs-footer">
            <div class="footer-info">
                <span><?php echo e(count($logContent)); ?> записей загружено</span>
            </div>
            <div class="footer-actions">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.button','data' => ['type' => 'outline-danger','size' => 'small','icon' => 'ph.regular.trash','confirm' => ''.e(__('admin-logs.clear_confirm')).'','yoyo:post' => 'handleClearLog']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-danger','size' => 'small','icon' => 'ph.regular.trash','confirm' => ''.e(__('admin-logs.clear_confirm')).'','yoyo:post' => 'handleClearLog']); ?>
                    <?php echo e(__('admin-logs.clear_log')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    function toggleDetails(id) {
        const detailsEl = document.getElementById('details-' + id);
        if (!detailsEl) return;

        const isHidden = detailsEl.classList.contains('hidden');
        detailsEl.classList.toggle('hidden');

        const button = document.querySelector(`[onclick=\"toggleDetails('${id}')\"]`);
        if (button) {
            const showText = button.querySelector('.show-text');
            const hideText = button.querySelector('.hide-text');
            if (showText) showText.classList.toggle('hidden', isHidden);
            if (hideText) hideText.classList.toggle('hidden', !isHidden);
        }
    }
</script>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Logs/Resources/views/layouts/logs-layout.blade.php ENDPATH**/ ?>