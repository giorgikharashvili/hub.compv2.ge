<div
    class="skins-modal-content <?php echo e(($vipOnlyMode ?? false) && !($hasVipAccess ?? false) ? 'skinchanger-vip-only' : ''); ?>">
    <div class="search-container">
        <div class="search-input-wrapper">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['name' => 'search','class' => 'search-input','placeholder' => ''.e(__('skinchanger.search.placeholder', 'Search skins...')).'','value' => '','dataWeapon' => ''.e($weapon ?? '').'','dataTeam' => ''.e($team ?? 'ct').'','dataServerId' => ''.e($serverId ?? '').'','autocomplete' => 'off','autofocus' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','class' => 'search-input','placeholder' => ''.e(__('skinchanger.search.placeholder', 'Search skins...')).'','value' => '','data-weapon' => ''.e($weapon ?? '').'','data-team' => ''.e($team ?? 'ct').'','data-server-id' => ''.e($serverId ?? '').'','autocomplete' => 'off','autofocus' => true]); ?>
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

        <div class="rarity-filters" data-weapon="<?php echo e($weapon ?? ''); ?>" data-team="<?php echo e($team ?? 'ct'); ?>"
            data-server-id="<?php echo e($serverId ?? ''); ?>">
            <?php
                $rarities = [
                    'consumer grade' => __('skinchanger.rarity.consumer_grade', 'Consumer Grade'),
                    'industrial grade' => __('skinchanger.rarity.industrial_grade', 'Industrial Grade'),
                    'mil-spec grade' => __('skinchanger.rarity.mil_spec', 'Mil-Spec Grade'),
                    'restricted' => __('skinchanger.rarity.restricted', 'Restricted'),
                    'classified' => __('skinchanger.rarity.classified', 'Classified'),
                    'covert' => __('skinchanger.rarity.covert', 'Covert'),
                    'contraband' => __('skinchanger.rarity.contraband', 'Contraband'),
                ];
            ?>

            <div class="rarity-badges">
                <?php $__currentLoopData = $rarities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rarityKey => $rarityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $rarityColor = match ($rarityKey) {
                            'contraband' => '#e4ae39',
                            'covert' => '#eb4b4b',
                            'classified' => '#d32ce6',
                            'restricted' => '#8847ff',
                            'mil-spec grade' => '#4b69ff',
                            'industrial grade' => '#5e98d9',
                            'consumer grade' => '#b0c3d9',
                            default => '#b0c3d9',
                        };
                    ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.badge','data' => ['type' => 'outline-primary','class' => 'rarity-badge','dataHandler' => 'rarity-badge','dataRarity' => ''.e($rarityKey).'','dataRarityName' => ''.e($rarityName).'','dataRarityColor' => ''.e($rarityColor).'','style' => 'cursor: pointer;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'rarity-badge','data-handler' => 'rarity-badge','data-rarity' => ''.e($rarityKey).'','data-rarity-name' => ''.e($rarityName).'','data-rarity-color' => ''.e($rarityColor).'','style' => 'cursor: pointer;']); ?>
                        <?php echo e($rarityName); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="skins-grid-container">
        <div class="skins-grid">
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
                <p><?php echo e(__('skinchanger.search.no_skins', ['weapon' => $weapon ?? 'this weapon'])); ?></p>
                <p class="no-items-suggestion">
                    <small class="text-muted">
                        <?php echo e(__('skinchanger.search.try_different', 'Try different search terms or remove filters.')); ?>

                    </small>
                </p>
            </div>

            <?php if(!empty($items)): ?>
                <?php
                    $skinchangerManager = app(\Flute\Modules\Skinchanger\Services\SkinchangerManager::class);
                    $weaponId = $skinchangerManager->getWeaponIdByShortName($weapon) ?? $weapon;
                    $weaponIndex = $skinchangerManager->getWeaponIndexById($weaponId);
                    $weaponImagePath = $skinchangerManager->getWeaponImagePath($weaponId);
                ?>
                <div class="skin-option default-skin has-vip-access" data-handler="skin-option" data-skin-id="0"
                    data-skin-name="<?php echo e(__('skinchanger.skins.default', 'Default')); ?>" data-skin-price="0"
                    data-skin-rarity="consumer grade" data-paint-index="0" data-rarity-color="#b0c3d9">
                    <div class="skin-content">
                        <div class="skin-image">
                            <img src="<?php echo e($weaponImagePath); ?>" class="skin-img" loading="lazy">
                        </div>
                        <div class="skin-info">
                            <div class="skin-name"><?php echo e(__('skinchanger.skins.default', 'Default')); ?></div>
                        </div>
                    </div>
                </div>

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
                        $hasVipAccessClass = $isVipRequired ? 'vip-restricted' : 'has-vip-access';
                    ?>
                    <div class="skin-option <?php echo e($hasVipAccessClass); ?>"
                        <?php if(!$isVipRequired || ($hasVipAccess && $isVipRequired)): ?> data-handler="skin-option" <?php endif; ?>
                        data-skin-id="<?php echo e($skin['id']); ?>" data-skin-name="<?php echo e($skin['name']); ?>"
                        data-paint-index="<?php echo e($skin['id']); ?>" data-rarity-color="<?php echo e($skin['rarity']['color']); ?>"
                        data-skin-rarity="<?php echo e(strtolower($skin['rarity']['name'] ?? 'consumer grade')); ?>"
                        style="--rarity-color: <?php echo e($skin['rarity']['color']); ?>;">

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.vip-tooltip','data' => ['vipOnlyMode' => $vipOnlyMode,'hasVipAccess' => $hasVipAccess]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::vip-tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['vip-only-mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($vipOnlyMode),'has-vip-access' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hasVipAccess)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <span class="rarity-badge" style="color: <?php echo e($skin['rarity']['color']); ?>;"></span>

                        <?php if(isset($category) && $category !== 'agents'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-action-menu','data' => ['index' => $index,'weaponIndex' => $weaponIndex,'skinId' => $skin['id'],'paintIndex' => $skin['id']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-action-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index),'weapon-index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($weaponIndex),'skin-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($skin['id']),'paint-index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($skin['id'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <div class="skin-image">
                            <div class="skin-preview">
                                <?php if($skin['image']): ?>
                                    <img src="<?php echo e($skin['image']); ?>" alt="<?php echo e($skin['name']); ?>" loading="lazy"
                                        onerror="this.parentElement.innerHTML='<span class=\'skin-placeholder\'><?php echo e(addslashes($skin['name'])); ?></span>';">
                                <?php else: ?>
                                    <span class="skin-placeholder"><?php echo e($skin['name']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="skin-info">
                            <div class="skin-name" title="<?php echo e($skin['name']); ?>"><?php echo e($skin['name']); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/skins-grid.blade.php ENDPATH**/ ?>