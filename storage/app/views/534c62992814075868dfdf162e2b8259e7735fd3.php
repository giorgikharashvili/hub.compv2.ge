<div
    class="weapon-skins-modal-content <?php echo e(($vipOnlyMode ?? false) && !($hasVipAccess ?? false) ? 'skinchanger-vip-only' : ''); ?>">
    <div class="search-container">
        <div class="back-to-types">
            <button class="back-button" data-handler="back-to-weapon-types">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-left','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php echo e(__('skinchanger.buttons.back_to_types', 'Back to Types')); ?>

            </button>
        </div>

        <div class="search-input-wrapper">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['name' => 'search','class' => 'search-input','placeholder' => ''.e(__('skinchanger.search.placeholder', 'Search skins...')).'','value' => '','dataWeapon' => ''.e($weaponId).'','dataTeam' => ''.e($team).'','dataServerId' => ''.e($serverId).'','autofocus' => true,'autocomplete' => 'off']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','class' => 'search-input','placeholder' => ''.e(__('skinchanger.search.placeholder', 'Search skins...')).'','value' => '','data-weapon' => ''.e($weaponId).'','data-team' => ''.e($team).'','data-server-id' => ''.e($serverId).'','autofocus' => true,'autocomplete' => 'off']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','class' => 'clear-filters-button','dataHandler' => 'clear-filters']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'clear-filters-button','data-handler' => 'clear-filters']); ?>
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.x','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

    <div class="weapon-skins-grid-container">
        <div class="weapon-skins-grid">
            <div class="no-items-message" style="display: <?php echo e(empty($items) ? 'flex' : 'none'); ?>;">
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
                <p><?php echo e(__('skinchanger.search.no_skins', ['weapon' => $weaponName])); ?></p>
                <p class="no-items-suggestion">
                    <small class="text-muted">
                        <?php echo e(__('skinchanger.search.try_different', 'Try different search terms or remove filters.')); ?>

                    </small>
                </p>
            </div>

            <?php if(!empty($items)): ?>
                <?php
                    $skinchangerManager = app(\Flute\Modules\Skinchanger\Services\SkinchangerManager::class);
                    $weaponIndex = $skinchangerManager->getWeaponIndexById($weaponId);
                    $weaponImagePath = $skinchangerManager->getWeaponImagePath($weaponId);

                    // Determine item type based on weapon ID
                    $itemType = null;
                    if (
                        str_contains($weaponId, 'knife') ||
                        str_contains($weaponId, 'bayonet') ||
                        str_contains($weaponId, 'karambit')
                    ) {
                        $itemType = 'knife';
                    } elseif (str_contains($weaponId, 'gloves') || str_contains($weaponId, 'handwraps')) {
                        $itemType = 'glove';
                    }
                ?>

                <?php if(!str_contains($weaponId, 'gloves') && !str_contains($weaponId, 'handwraps')): ?>
                    <div class="weapon-skin-option default-skin has-vip-access" data-handler="weapon-skin-option"
                        data-skin-id="0" data-skin-name="<?php echo e(__('skinchanger.skins.default', 'Default')); ?>"
                        data-skin-price="0" data-skin-rarity="consumer grade" data-paint-index="0"
                        data-rarity-color="#b0c3d9" data-weapon-id="<?php echo e($weaponId); ?>">
                        <div class="skin-content">
                            <div class="skin-image">
                                <img src="<?php echo e($weaponImagePath); ?>" class="skin-img" loading="lazy">
                            </div>
                            <div class="skin-info">
                                <div class="skin-name"><?php echo e(__('skinchanger.skins.default', 'Default')); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $skinName = $skin['name'] ?? __('skinchanger.skins.unknown', 'Unknown Skin');
                        $skinName = preg_replace('/\([^()]*\)/', '', $skinName);
                        $paintIndex = $skin['paint_index'] ?? $index + 1;
                        $rarity = strtolower($skin['rarity']['name'] ?? 'common');
                        $rarityColor = $skin['rarity']['color'] ?? '#b0c3d9';
                        $skinImage = $skin['image'] ?? null;
                        $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
                        $hasVipAccessClass = $isVipRequired ? 'vip-restricted' : 'has-vip-access';
                    ?>

                    <div class="weapon-skin-option <?php echo e($hasVipAccessClass); ?>"
                        <?php if(!$isVipRequired || ($hasVipAccess && $isVipRequired)): ?> data-handler="weapon-skin-option" <?php endif; ?>
                        data-skin-id="<?php echo e($paintIndex); ?>" data-skin-name="<?php echo e($skinName); ?>"
                        data-paint-index="<?php echo e($paintIndex); ?>" data-rarity-color="<?php echo e($rarityColor); ?>"
                        data-rarity="<?php echo e($rarity); ?>" data-weapon-id="<?php echo e($weaponId); ?>"
                        style="--rarity-color: <?php echo e($rarityColor); ?>;">

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.vip-tooltip','data' => ['hasVipAccess' => $hasVipAccess,'vipOnlyMode' => $vipOnlyMode]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::vip-tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-vip-access' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hasVipAccess),'vip-only-mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($vipOnlyMode)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <span class="rarity-badge" style="color: <?php echo e($rarityColor); ?>;"></span>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-action-menu','data' => ['index' => $index,'weaponIndex' => ''.e($weaponIndex).'','weaponId' => ''.e($weaponId).'','skinId' => ''.e($paintIndex).'','paintIndex' => ''.e($paintIndex).'','itemType' => ''.e($itemType).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-action-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index),'weapon-index' => ''.e($weaponIndex).'','weapon-id' => ''.e($weaponId).'','skin-id' => ''.e($paintIndex).'','paint-index' => ''.e($paintIndex).'','item-type' => ''.e($itemType).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <div class="skin-image">
                            <div class="skin-preview">
                                <?php if($skinImage): ?>
                                    <img src="<?php echo e($skinImage); ?>" alt="<?php echo e($skinName); ?>" loading="lazy"
                                        onerror="this.parentElement.innerHTML='<span class=\'skin-placeholder\'><?php echo e(addslashes($skinName)); ?></span>';">
                                <?php else: ?>
                                    <span class="skin-placeholder"><?php echo e($skinName); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="skin-info">
                            <div class="skin-name" title="<?php echo e($skinName); ?>"><?php echo e($skinName); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/weapon-skins-grid.blade.php ENDPATH**/ ?>