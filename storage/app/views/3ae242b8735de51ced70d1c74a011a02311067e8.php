<div class="skins-modal-content <?php echo e(($vipOnlyMode ?? false) && !($hasVipAccess ?? false) ? 'skinchanger-vip-only' : ''); ?>">
    <div class="search-container">
        <div class="search-input-wrapper">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['name' => 'search','class' => 'search-input','placeholder' => ''.e(__('skinchanger.search.placeholder', 'Search items...')).'','value' => '','dataCategory' => ''.e($category ?? '').'','dataTeam' => ''.e($team ?? 'ct').'','dataServerId' => ''.e($serverId ?? '').'','autocomplete' => 'off']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','class' => 'search-input','placeholder' => ''.e(__('skinchanger.search.placeholder', 'Search items...')).'','value' => '','data-category' => ''.e($category ?? '').'','data-team' => ''.e($team ?? 'ct').'','data-server-id' => ''.e($serverId ?? '').'','autocomplete' => 'off']); ?>
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

        <?php if($category === 'coins'): ?>
            <div class="rarity-filters" data-category="<?php echo e($category ?? ''); ?>" data-team="<?php echo e($team ?? 'ct'); ?>"
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
        <?php endif; ?>
    </div>

    <div class="special-items-grid-container">
        <div class="special-items-grid">
            <div class="no-items-message" style="display: <?php echo e(empty($items) ? 'flex' : 'none'); ?>;">
                <div class="no-items-icon">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.package','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <p><?php echo e(__('skinchanger.items.no_items', ['category' => $category ?? 'items'])); ?></p>
                <p class="no-items-suggestion">
                    <small class="text-muted">
                        <?php echo e(__('skinchanger.search.try_different', 'Try different search terms or remove filters.')); ?>

                    </small>
                </p>
            </div>

            <?php if(!empty($items)): ?>
                <div class="special-item-option default-item has-vip-access" data-handler="special-item-option" data-item-id="0"
                    data-item-name="<?php echo e(__('skinchanger.items.default', 'Default')); ?>" data-item-price="0"
                    data-item-type="<?php echo e($category); ?>" data-team="<?php echo e($team); ?>"
                    data-server-id="<?php echo e($serverId); ?>">
                    <div class="item-image">
                        <div class="item-preview">
                            <div class="default-item-content">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.minus-circle','class' => 'default-icon h3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                    </div>
                    <div class="item-details">
                        <div class="item-name"><?php echo e(__('skinchanger.items.default', 'Default')); ?></div>
                    </div>
                </div>

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $itemId = app('Flute\Modules\Skinchanger\Services\CS2DataService')->getItemId($item, $category);
                        $itemRarityColor = $item['rarity']['color'] ?? '#b0c3d9';
                        $itemRarityName = strtolower($item['rarity']['name'] ?? 'common');
                        $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
                        $hasVipAccessClass = $isVipRequired ? 'vip-restricted' : 'has-vip-access';
                    ?>
                    <div class="special-item-option <?php echo e($hasVipAccessClass); ?>" 
                        <?php if(!$isVipRequired || ($hasVipAccess && $isVipRequired)): ?>
                            data-handler="special-item-option"
                        <?php endif; ?>
                        data-item-id="<?php echo e($itemId); ?>" data-item-name="<?php echo e($item['name']); ?>" data-item-price="0"
                        data-item-type="<?php echo e($category); ?>" data-item-rarity-color="<?php echo e($itemRarityColor); ?>"
                        data-item-rarity="<?php echo e($itemRarityName); ?>"
                        data-weapon-id="<?php echo e($item['weapon']['id'] ?? ''); ?>"
                        data-paint-index="<?php echo e($item['paint_index'] ?? ''); ?>" data-team="<?php echo e($team); ?>"
                        data-server-id="<?php echo e($serverId); ?>" style="--rarity-color: <?php echo e($itemRarityColor); ?>;">

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

                        <?php if($category !== 'agents'): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-action-menu','data' => ['index' => $index,'itemId' => $itemId,'itemType' => $category]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-action-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index),'item-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemId),'item-type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php
                                $agentTeamRestriction = null;
                                if ($team === 'ct') {
                                    $agentTeamRestriction = 'ct';
                                } elseif ($team === 't') {
                                    $agentTeamRestriction = 't';
                                }
                            ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-action-menu','data' => ['index' => $index,'itemId' => $itemId,'itemType' => $category,'teamRestriction' => $agentTeamRestriction]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-action-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index),'item-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemId),'item-type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category),'team-restriction' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($agentTeamRestriction)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <span class="rarity-badge" style="color: <?php echo e($itemRarityColor); ?>;"></span>

                        <div class="item-image">
                            <div class="item-preview">
                                <?php if($item['image']): ?>
                                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>" loading="lazy"
                                        onerror="this.parentElement.innerHTML='<span class=\'item-placeholder\'><?php echo e(addslashes($item['name'])); ?></span>';">
                                <?php else: ?>
                                    <span class="item-placeholder"><?php echo e($item['name']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item-details">
                            <div class="item-name" title="<?php echo e($item['name']); ?>"><?php echo e($item['name']); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/items-grid.blade.php ENDPATH**/ ?>