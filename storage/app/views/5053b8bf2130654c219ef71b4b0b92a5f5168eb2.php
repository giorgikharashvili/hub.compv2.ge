<?php
    $phpPath = null;

    if (PHP_SAPI === 'cli' && PHP_BINARY) {
        $phpPath = PHP_BINARY;
    }

    if (!$phpPath && function_exists('shell_exec')) {
        $discoverCommands = ['command -v php 2>/dev/null', 'which php 2>/dev/null'];

        foreach ($discoverCommands as $cmd) {
            $detected = trim((string) @shell_exec($cmd));
            if ($detected && @is_executable($detected)) {
                $phpPath = $detected;
                break;
            }
        }
    }

    if (!$phpPath && defined('PHP_BINDIR')) {
        $bindir = rtrim(PHP_BINDIR, DIRECTORY_SEPARATOR);
        $candidate = $bindir . DIRECTORY_SEPARATOR . (stripos(PHP_OS, 'WIN') === 0 ? 'php.exe' : 'php');
        if (@is_file($candidate) && @is_executable($candidate)) {
            $phpPath = $candidate;
        }
    }

    if (!$phpPath) {
        $fallbacks = [
            '/opt/homebrew/bin/php', // macOS (Apple Silicon) Homebrew
            '/usr/local/bin/php', // common *nix
            '/usr/bin/php',
        ];

        foreach ($fallbacks as $fb) {
            if (@is_executable($fb)) {
                $phpPath = $fb;
                break;
            }
        }
    }

    if (!$phpPath) {
        $phpPath = '/usr/bin/env php';
    }

    $fluteCommand = realpath(BASE_PATH . DIRECTORY_SEPARATOR . 'flute');

    if (!$fluteCommand) {
        $fluteCommand = rtrim(BASE_PATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'flute';
    }

    $phpIsEnv = $phpPath === '/usr/bin/env php';
    $isReliable = false;

    if (!$phpIsEnv && @is_executable($phpPath) && function_exists('shell_exec')) {
        $sapi = @shell_exec(escapeshellarg($phpPath) . ' -r ' . escapeshellarg('echo PHP_SAPI;'));
        if ($sapi !== null && trim($sapi) === 'cli') {
            $isReliable = true;
        }
    }

    $phpCmdPart = $phpIsEnv ? $phpPath : '"' . $phpPath . '"';

    $cronCommand = "* * * * * $phpCmdPart \"$fluteCommand\" cron:run >> /dev/null 2>&1";
?>

<div class="cron-section">
    <div class="cron-section__header">
        <h5 class="cron-section__title">
            <?php echo e(__('admin-main-settings.labels.cron_command')); ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.popover','data' => ['content' => ''.e(__('admin-main-settings.popovers.cron_command')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => ''.e(__('admin-main-settings.popovers.cron_command')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </h5>
    </div>

    <?php if(!$isReliable): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.alert','data' => ['type' => 'warning','onlyBorders' => true,'withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','onlyBorders' => true,'withClose' => 'false']); ?>
            <?php echo e(__('admin-main-settings.messages.cron_cli_warning_text')); ?>

            <br /><?php echo e(__('admin-main-settings.messages.cron_cli_warning_current_label')); ?>

            <code><?php echo e($phpPath); ?></code>
            <br /><?php echo e(__('admin-main-settings.messages.cron_cli_warning_examples_label')); ?> <code>/usr/bin/php</code>,
            <code>/usr/local/bin/php</code>, <code>/opt/homebrew/bin/php</code>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <div class="cron-section__command">
        <pre id="cron-command"><?php echo e($cronCommand); ?></pre>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/MainSettings/Resources/views/cron.blade.php ENDPATH**/ ?>