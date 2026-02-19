<div class="weapon-types-modal-content">
    <div class="weapon-types-grid-container">
        <div class="weapon-types-grid">
            <?php if(!empty($weaponTypes)): ?>
                <?php $__currentLoopData = $weaponTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weaponId => $weaponName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $weaponImagePath = app(
                            \Flute\Modules\Skinchanger\Services\SkinchangerManager::class,
                        )->getWeaponImagePath($weaponId);
                    ?>

                    <div class="weapon-type-option" data-handler="weapon-type-option"
                        data-weapon-id="<?php echo e($weaponId); ?>" data-weapon-name="<?php echo e($weaponName); ?>"
                        data-category="<?php echo e($category); ?>" data-team="<?php echo e($team); ?>"
                        data-server-id="<?php echo e($serverId); ?>">
                        <div class="weapon-type-image">
                            <img src="<?php echo e($weaponImagePath); ?>" alt="<?php echo e($weaponName); ?>" loading="lazy">
                        </div>
                        <div class="weapon-type-info">
                            <div class="weapon-type-name"><?php echo e($weaponName); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="no-items-message">
                    <div class="no-items-icon">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.smiley-sad','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <p><?php echo e(__('skinchanger.search.no_weapon_types', 'No weapon types available')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/weapon-types-grid.blade.php ENDPATH**/ ?>