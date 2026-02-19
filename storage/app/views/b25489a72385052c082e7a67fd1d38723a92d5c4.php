<?php
    $skinchangerManager = app(\Flute\Modules\Skinchanger\Services\SkinchangerManager::class);
    $vipOnlyMode = $vipOnlyMode ?? false;
    $hasVipAccess = $hasVipAccess ?? false;

    $isVipRequired = ($vipOnlyMode ?? false) && !($hasVipAccess ?? false);
?>

<div class="skins-content">
    <div class="skins-sidebar">
        <div class="sidebar-section agent-section">
            <div class="agent-container">
                <?php
                    $currentTeam = request()->input('team', 'ct');
                    $teamData = $playerData[$currentTeam === 'ct' ? 'ct' : 't'];
                    $currentAgent = $teamData['items']['agent'] ?? null;

                    $defaultAgentName =
                        $currentTeam === 'ct'
                            ? __('skinchanger.defaults.ct_agent')
                            : __('skinchanger.defaults.t_agent');

                    $agentName = is_array($currentAgent)
                        ? $currentAgent['name'] ?? $defaultAgentName
                        : $defaultAgentName;
                    $agentImage = is_array($currentAgent) ? $currentAgent['image'] ?? null : null;
                ?>

                <div class="agent-card" data-handler="agent-card" data-item-type="agents" data-team="<?php echo e($currentTeam); ?>"
                    data-server-id="<?php echo e($selectedServerId); ?>">
                    <div class="agent-image">
                        <div class="agent-background-map">
                            <?php if($currentTeam === 'ct'): ?>
                                <img src="<?php echo e(asset('assets/img/maps/730/de_nuke.webp')); ?>" alt="Agent Background"
                                    class="agent-background-img" loading="lazy">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/img/maps/730/de_mirage.webp')); ?>" alt="Agent Background"
                                    class="agent-background-img" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <?php if($agentImage): ?>
                            <img src="<?php echo e($agentImage); ?>" alt="<?php echo e($agentName); ?>" class="agent-img" loading="lazy">
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.user','class' => 'agent-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        
                    </div>
                    <div class="agent-details">
                        <?php
                            $currentTeam = request()->input('team', 'ct');
                            $teamData = $playerData[$currentTeam === 'ct' ? 'ct' : 't'];
                            $currentAgent = $teamData['items']['agent'] ?? null;

                            $defaultAgentName =
                                $currentTeam === 'ct'
                                    ? __('skinchanger.defaults.ct_agent')
                                    : __('skinchanger.defaults.t_agent');
                        ?>
                        <div class="agent-name">
                            <?php echo e($currentAgent ? $currentAgent['name'] ?? $defaultAgentName : $defaultAgentName); ?>

                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','size' => 'small','class' => 'change-agent-btn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','size' => 'small','class' => 'change-agent-btn']); ?>
                            <?php echo e(__('skinchanger.buttons.change_agent', 'Change Agent')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-section special-items-section">
            <div class="special-items-cards">
                <?php
                    $currentCoin = $teamData['items']['coin'] ?? null;
                    $currentMusic = $teamData['items']['music'] ?? null;
                    $currentGloves = $teamData['items']['glove'] ?? null;
                    $currentKnife = $teamData['items']['knife'] ?? null;

                    $glovesName = __('skinchanger.defaults.default_gloves');
                    $glovesImage = null;
                    $glovesRarityColor = '#b0c3d9';
                    $hasGlovesSkin = false;

                    if ($currentGloves && is_array($currentGloves)) {
                        $glovesName = $skinchangerManager->normaliseName($currentGloves['name'] ?? $glovesName);
                        $glovesImage = $currentGloves['image'] ?? null;
                        $glovesRarityColor = $currentGloves['rarity_color'] ?? '#b0c3d9';
                        $hasGlovesSkin = $currentGloves['has_skin'] ?? false;
                    }

                    $knifeName = __('skinchanger.defaults.default_knife');
                    $knifeImage = null;
                    $knifeRarityColor = '#b0c3d9';
                    $hasKnifeSkin = false;

                    if ($currentKnife && is_array($currentKnife)) {
                        $knifeName = $skinchangerManager->normaliseName($currentKnife['name'] ?? $knifeName);
                        $knifeImage = $currentKnife['image'] ?? null;

                        if (!$knifeImage && isset($currentKnife['id'])) {
                            $knifeImage = $skinchangerManager->getWeaponImagePath($currentKnife['id']);
                        }
                    } else {
                        $knifeImage = null;
                    }

                    $coinName = $skinchangerManager->normaliseName(
                        $currentCoin
                            ? $currentCoin['name'] ?? __('skinchanger.defaults.no_coin')
                            : __('skinchanger.defaults.no_coin'),
                    );
                    $coinImage = is_array($currentCoin) ? $currentCoin['image'] ?? null : null;

                    $musicName = $skinchangerManager->normaliseName(
                        $currentMusic
                            ? $currentMusic['name'] ?? __('skinchanger.defaults.default_music')
                            : __('skinchanger.defaults.default_music'),
                    );
                    $musicImage = is_array($currentMusic) ? $currentMusic['image'] ?? null : null;
                ?>

                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'special-item-card',
                    'has-image' => $glovesImage !== null,
                    'has-skin' => $hasGlovesSkin,
                ]) ?>" data-handler="special-item-card" data-item-type="gloves"
                    data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>"
                    style="--rarity-color: <?php echo e($glovesRarityColor); ?>;">

                    <?php if($hasGlovesSkin): ?>
                        <span class="rarity-badge" style="background: <?php echo e($glovesRarityColor); ?>;"></span>
                    <?php endif; ?>

                    <div class="item-icon">
                        <?php if($glovesImage): ?>
                            <img src="<?php echo e($glovesImage); ?>" alt="<?php echo e($glovesName); ?>" class="item-image"
                                loading="lazy">
                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/weapons/' . $currentTeam . '_gloves.webp')); ?>"
                                alt="<?php echo e($glovesName); ?>" class="item-image" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="item-name"><?php echo e($glovesName); ?></div>
                    <?php if($currentGloves && (is_array($currentGloves) && $currentGloves['id'] !== '0')): ?>
                        <div class="item-actions">
                            <?php if(!$isVipRequired || ($hasVipAccess && $isVipRequired)): ?>
                                <button class="item-action-btn settings-btn" data-handler="weapon-settings"
                                    data-weapon-id="<?php echo e($currentGloves['id'] ?? 'gloves'); ?>"
                                    data-weapon-name="<?php echo e($glovesName); ?>"
                                    data-skin-id="<?php echo e($currentGloves['skin_id'] ?? '0'); ?>"
                                    data-skin-name="<?php echo e($glovesName); ?>" data-rarity-color="<?php echo e($glovesRarityColor); ?>"
                                    data-skin-image="<?php echo e($glovesImage); ?>"
                                    data-current-wear="<?php echo e($currentGloves['quality'] ?? 0); ?>"
                                    data-current-stattrack="<?php echo e(isset($currentKnife['stattrack']) && $currentKnife['stattrack'] ? 'true' : 'false'); ?>"
                                    data-current-float="<?php echo e($currentGloves['float'] ?? '0.0'); ?>"
                                    data-current-pattern="<?php echo e($currentGloves['pattern'] ?? '0'); ?>"
                                    data-current-nametag="<?php echo e($currentGloves['nametag'] ?? ''); ?>"
                                    title="<?php echo e(__('skinchanger.buttons.settings', 'Settings')); ?>">
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.gear','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                </button>
                            <?php endif; ?>
                            <button class="item-action-btn remove-btn" data-handler="remove-item" data-item-type="glove"
                                data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>"
                                title="<?php echo e(__('skinchanger.buttons.remove_item', 'Remove Item')); ?>">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.trash','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'special-item-card',
                    'has-image' => $knifeImage !== null,
                    'has-skin' => $hasKnifeSkin,
                ]) ?>" data-handler="special-item-card" data-item-type="knives"
                    data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>"
                    style="--rarity-color: <?php echo e($knifeRarityColor); ?>;">

                    <div class="item-icon">
                        <?php if($knifeImage): ?>
                            <img src="<?php echo e($knifeImage); ?>" alt="<?php echo e($knifeName); ?>" class="item-image"
                                loading="lazy">
                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/weapons/weapon_knife' . ($currentTeam === 'ct' ? '' : '_t') . '.webp')); ?>"
                                alt="<?php echo e($knifeName); ?>" class="item-image" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="item-name"><?php echo e($knifeName); ?></div>
                    <?php if($currentKnife && (is_array($currentKnife) && $currentKnife['id'] !== '0') && !$hasKnifeSkin): ?>
                        <div class="item-actions">
                            <?php if(!$isVipRequired || ($hasVipAccess && $isVipRequired)): ?>
                                <button class="item-action-btn settings-btn" data-handler="weapon-settings"
                                    data-weapon-id="<?php echo e($currentKnife['id'] ?? 'knife'); ?>"
                                    data-weapon-name="<?php echo e($knifeName); ?>"
                                    data-skin-id="<?php echo e($currentKnife['skin_id'] ?? '0'); ?>"
                                    data-skin-name="<?php echo e($knifeName); ?>" data-rarity-color="<?php echo e($knifeRarityColor); ?>"
                                    data-skin-image="<?php echo e($knifeImage); ?>"
                                    data-current-wear="<?php echo e($currentKnife['quality'] ?? 0); ?>"
                                    data-current-stattrack="<?php echo e(isset($currentKnife['stattrack']) && $currentKnife['stattrack'] ? 'true' : 'false'); ?>"
                                    data-current-float="<?php echo e($currentKnife['float'] ?? '0.0'); ?>"
                                    data-current-pattern="<?php echo e($currentKnife['pattern'] ?? '0'); ?>"
                                    data-current-nametag="<?php echo e($currentKnife['nametag'] ?? ''); ?>"
                                    title="<?php echo e(__('skinchanger.buttons.settings', 'Settings')); ?>">
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.gear','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                </button>
                            <?php endif; ?>
                            <button class="item-action-btn remove-btn" data-handler="remove-item" data-item-type="knife"
                                data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>"
                                title="<?php echo e(__('skinchanger.buttons.remove_item', 'Remove Item')); ?>">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.trash','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['special-item-card', 'has-image' => $coinImage !== null]) ?>" data-handler="special-item-card" data-item-type="coins"
                    data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>">
                    <div class="item-icon">
                        <?php if($coinImage): ?>
                            <img src="<?php echo e($coinImage); ?>" alt="<?php echo e($coinName); ?>" class="item-image"
                                loading="lazy">
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.coin','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </div>
                    <div class="item-name"><?php echo e($coinName); ?></div>
                    <?php if($currentCoin && $coinImage): ?>
                        <div class="item-actions">
                            <button class="item-action-btn remove-btn" data-handler="remove-item"
                                data-item-type="coin" data-team="<?php echo e($currentTeam); ?>"
                                data-server-id="<?php echo e($selectedServerId); ?>"
                                title="<?php echo e(__('skinchanger.buttons.remove_item', 'Remove Item')); ?>">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.trash','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['special-item-card', 'has-image' => $musicImage !== null]) ?>" data-handler="special-item-card" data-item-type="music"
                    data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>">
                    <div class="item-icon">
                        <?php if($musicImage): ?>
                            <img src="<?php echo e($musicImage); ?>" alt="<?php echo e($musicName); ?>" class="item-image"
                                loading="lazy">
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.music-note','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </div>
                    <div class="item-name"><?php echo e($musicName); ?></div>
                    <?php if($currentMusic && $musicImage): ?>
                        <div class="item-actions">
                            <button class="item-action-btn remove-btn" data-handler="remove-item"
                                data-item-type="music" data-team="<?php echo e($currentTeam); ?>"
                                data-server-id="<?php echo e($selectedServerId); ?>"
                                title="<?php echo e(__('skinchanger.buttons.remove_item', 'Remove Item')); ?>">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.trash','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="sidebar-section community-section">
            <h3 class="section-title"><?php echo e(__('skinchanger.community.title', 'Community Loadouts')); ?></h3>
            <div class="community-loadouts">
                <div class="coming-soon-notice">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.clock','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <span><?php echo e(__('skinchanger.loadouts.coming_soon', 'Coming soon')); ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="skins-main">
        <div class="weapons-search-container">
            <div class="search-input-wrapper">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'text','name' => 'weapon_search','class' => 'weapon-search-input','placeholder' => ''.e(__('skinchanger.search.weapon_search', 'Search weapons...')).'','dataHandler' => 'weapon-search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'weapon_search','class' => 'weapon-search-input','placeholder' => ''.e(__('skinchanger.search.weapon_search', 'Search weapons...')).'','data-handler' => 'weapon-search']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.magnifying-glass','class' => 'search-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <button class="clear-search-btn" data-handler="clear-weapon-search" style="display: none;">
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
                </button>
            </div>
        </div>

        <div class="weapons-grid" id="weapons-grid">
            <?php
                $teamIndex = $currentTeam === 'ct' ? 0 : 1;
                $playerSkins = $teamData['skins'] ?? [];
                $allWeapons = $weaponList;

                $weaponCategories = [
                    'pistol' => [1, 2, 3, 4, 30, 31, 32, 36, 61, 63, 64],
                    'rifle' => [7, 8, 10, 13, 16, 39, 60],
                    'sniper' => [9, 11, 38, 40],
                    'smg' => [17, 19, 24, 26, 33, 34],
                    'shotgun' => [25, 27, 29, 35],
                    'lmg' => [14, 28],
                    'grenade' => [43, 44, 45, 46, 47, 48],
                    'knife' => [42, 59, 500, 503, 505, 506, 507, 508, 509, 512, 514, 515, 516, 517, 518, 519, 520, 521],
                    'gloves' => [5027, 5028, 5029, 5030, 5031, 5032, 5033, 5034],
                ];

                $categoryNames = [
                    'pistol' => __('skinchanger.categories.pistols', 'Pistols'),
                    'rifle' => __('skinchanger.categories.rifles', 'Rifles'),
                    'sniper' => __('skinchanger.categories.snipers', 'Sniper Rifles'),
                    'smg' => __('skinchanger.categories.smgs', 'SMGs'),
                    'shotgun' => __('skinchanger.categories.shotguns', 'Shotguns'),
                    'lmg' => __('skinchanger.categories.lmgs', 'Machine Guns'),
                    'grenade' => __('skinchanger.categories.grenades', 'Grenades'),
                ];

                function getWeaponCategory($weaponIndex, $weaponCategories)
                {
                    foreach ($weaponCategories as $category => $indexes) {
                        if (in_array($weaponIndex, $indexes)) {
                            return $category;
                        }
                    }
                    return 'rifle';
                }

                $weaponsByCategory = [];
                foreach ($allWeapons as $weaponIndex => $weaponId) {
                    $category = getWeaponCategory($weaponIndex, $weaponCategories);
                    if (!in_array($category, ['knife', 'gloves'])) {
                        $weaponsByCategory[$category][] = ['index' => $weaponIndex, 'id' => $weaponId];
                    }
                }

                $categoryOrder = ['rifle', 'pistol', 'sniper', 'smg', 'shotgun', 'lmg', 'grenade'];
                $sortedCategories = [];
                foreach ($categoryOrder as $cat) {
                    if (isset($weaponsByCategory[$cat])) {
                        $sortedCategories[$cat] = $weaponsByCategory[$cat];
                    }
                }
            ?>

            <?php $__currentLoopData = $sortedCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $weapons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="weapon-category-section" data-category="<?php echo e($category); ?>">
                    <div class="category-header">
                        <h3 class="category-title"><?php echo e($categoryNames[$category] ?? ucfirst($category)); ?></h3>
                        <div class="category-divider"></div>
                    </div>

                    <div class="category-weapons">
                        <?php $__currentLoopData = $weapons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weapon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $weaponIndex = $weapon['index'];
                                $weaponId = $weapon['id'];
                                $weaponSkin = $playerSkins[$weaponIndex] ?? null;
                                $hasCustomSkin =
                                    $weaponSkin && isset($weaponSkin['skin_id']) && $weaponSkin['skin_id'] > 0;

                                $weaponImagePath = $skinchangerManager->getWeaponImagePath($weaponId);
                                $weaponDisplayName = $skinchangerManager->getWeaponDisplayName($weaponId);
                                $weaponShortName = $skinchangerManager->getWeaponShortName($weaponId);

                                $displaySkinName = 'Default';
                                $skinImagePath = $weaponImagePath;
                                if ($hasCustomSkin) {
                                    $displaySkinName = $skinchangerManager->normaliseName(
                                        $weaponSkin['skin_name'] ?? 'Unknown Skin',
                                    );
                                    $skinImagePath = $weaponSkin['skin_image'] ?? $weaponImagePath;
                                }

                                $qualityClass = 'factory-new';
                                if ($hasCustomSkin && isset($weaponSkin['quality'])) {
                                    $qualityNames = [
                                        'factory-new',
                                        'minimal-wear',
                                        'field-tested',
                                        'well-worn',
                                        'battle-scarred',
                                    ];
                                    $qualityClass = $qualityNames[$weaponSkin['quality']] ?? 'factory-new';
                                }

                                $rarityColor = '#b0c3d9'; // default
                                if ($hasCustomSkin && isset($weaponSkin['skin_rarity_col'])) {
                                    $rarityColor = $weaponSkin['skin_rarity_col'];
                                }
                            ?>

                            <div class="weapon-card <?php echo e($hasCustomSkin ? 'has-skin' : ''); ?>"
                                data-handler="weapon-card" data-weapon-id="<?php echo e($weaponIndex); ?>"
                                data-weapon-name="<?php echo e($weaponShortName); ?>" data-category="<?php echo e($category); ?>"
                                data-team="<?php echo e($currentTeam); ?>" data-server-id="<?php echo e($selectedServerId); ?>"
                                data-has-skin="<?php echo e($hasCustomSkin ? 'true' : 'false'); ?>"
                                data-skin-id="<?php echo e($hasCustomSkin ? $weaponSkin['skin_id'] ?? '0' : '0'); ?>"
                                data-skin-name="<?php echo e($hasCustomSkin ? $displaySkinName : ''); ?>"
                                style="--rarity-color: <?php echo e($rarityColor); ?>;">

                                <?php if($hasCustomSkin): ?>
                                    <span class="rarity-badge" style="background: <?php echo e($rarityColor); ?>;"></span>

                                    <div class="weapon-actions">
                                        <?php if(!$isVipRequired || ($hasVipAccess && $isVipRequired)): ?>
                                            <button class="weapon-action-btn settings-btn"
                                                data-handler="weapon-settings" data-weapon-id="<?php echo e($weaponIndex); ?>"
                                                data-weapon-name="<?php echo e($weaponShortName); ?>"
                                                data-skin-id="<?php echo e($weaponSkin['skin_id'] ?? '0'); ?>"
                                                data-skin-name="<?php echo e($displaySkinName); ?>"
                                                data-rarity-color="<?php echo e($rarityColor); ?>"
                                                data-skin-image="<?php echo e($skinImagePath); ?>"
                                                data-current-wear="<?php echo e($weaponSkin['quality'] ?? 0); ?>"
                                                data-current-stattrack="<?php echo e(isset($weaponSkin['stattrack']) && $weaponSkin['stattrack'] ? 'true' : 'false'); ?>"
                                                data-current-float="<?php echo e($weaponSkin['float'] ?? '0.0'); ?>"
                                                data-current-pattern="<?php echo e($weaponSkin['pattern'] ?? '0'); ?>"
                                                data-current-nametag="<?php echo e($weaponSkin['nametag'] ?? ''); ?>"
                                                title="<?php echo e(__('skinchanger.buttons.settings', 'Settings')); ?>">
                                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.gear','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            </button>
                                        <?php endif; ?>
                                        <button class="weapon-action-btn remove-btn" data-handler="remove-weapon-skin"
                                            data-weapon-id="<?php echo e($weaponIndex); ?>"
                                            data-server-id="<?php echo e($selectedServerId); ?>"
                                            data-team="<?php echo e($currentTeam === 'ct' ? 0 : 1); ?>"
                                            title="<?php echo e(__('skinchanger.buttons.remove_skin', 'Remove Skin')); ?>">
                                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.trash','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <div class="weapon-content">
                                    <div class="weapon-image">
                                        <img src="<?php echo e($skinImagePath); ?>" alt="<?php echo e($weaponDisplayName); ?>"
                                            class="weapon-img" loading="lazy">
                                    </div>
                                    <div class="weapon-info">
                                        <?php if($hasCustomSkin): ?>
                                            <div class="weapon-name"><?php echo e($weaponDisplayName); ?></div>
                                            <div class="skin-name">
                                                <?php echo e($displaySkinName); ?>

                                            </div>
                                            
                                        <?php else: ?>
                                            <div class="add-skin-text">
                                                <?php echo e(__('skinchanger.weapon.add_skin', ['weapon' => $weaponDisplayName])); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if($hasCustomSkin): ?>
                                    <div class="weapon-attachments">
                                        
                                        <?php if(isset($weaponSkin['stickers_data']) && !empty($weaponSkin['stickers_data'])): ?>
                                            <div class="weapon-stickers-preview">
                                                <?php $__currentLoopData = $weaponSkin['stickers_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot => $stickerData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="weapon-sticker-mini"
                                                        title="<?php echo e($stickerData['name'] ?? 'Unknown Sticker'); ?>">
                                                        <?php if(isset($stickerData['image']) && $stickerData['image']): ?>
                                                            <img src="<?php echo e($stickerData['image']); ?>"
                                                                alt="<?php echo e($stickerData['name']); ?>" loading="lazy">
                                                        <?php else: ?>
                                                            <div class="sticker-placeholder">S</div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <?php if(isset($weaponSkin['keychain_data']) && $weaponSkin['keychain_data']): ?>
                                            <div class="weapon-keychain-preview"
                                                title="<?php echo e($weaponSkin['keychain_data']['name'] ?? 'Unknown Keychain'); ?>">
                                                <?php if(isset($weaponSkin['keychain_data']['image']) && $weaponSkin['keychain_data']['image']): ?>
                                                    <img src="<?php echo e($weaponSkin['keychain_data']['image']); ?>"
                                                        alt="<?php echo e($weaponSkin['keychain_data']['name']); ?>"
                                                        loading="lazy">
                                                <?php else: ?>
                                                    <div class="keychain-placeholder">K</div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <div class="weapon-badges">
                                            <?php if(isset($weaponSkin['stattrack']) && $weaponSkin['stattrack']): ?>
                                                <div class="weapon-badge stattrack-badge" title="StatTrak™">ST</div>
                                            <?php endif; ?>
                                            
                                            <?php if(isset($weaponSkin['float']) && $weaponSkin['float'] !== '0.0'): ?>
                                                <?php
                                                    $float = (float) $weaponSkin['float'];
                                                    $floatClass = '';
                                                    if ($float <= 0.07) {
                                                        $floatClass = 'fn';
                                                    } elseif ($float <= 0.15) {
                                                        $floatClass = 'mw';
                                                    } elseif ($float <= 0.38) {
                                                        $floatClass = 'ft';
                                                    } elseif ($float <= 0.45) {
                                                        $floatClass = 'ww';
                                                    } else {
                                                        $floatClass = 'bs';
                                                    }
                                                ?>
                                                <div class="weapon-badge float-badge <?php echo e($floatClass); ?>"
                                                    title="Float: <?php echo e(number_format($float, 4)); ?>">
                                                    <?php echo e($floatClass); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(!$hasCustomSkin): ?>
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.plus','class' => 'add-skin-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/partials/content.blade.php ENDPATH**/ ?>