<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'weaponId',
    'weaponName',
    'skinId',
    'skinName',
    'skinImage',
    'rarityColor',
    'rarityName',
    'serverId',
    'currentTeam',
    'currentWear' => 0,
    'currentStatTrak' => false,
    'currentFloat' => '0.0',
    'currentPattern' => '0',
    'currentNametag' => '',
    'currentStickers' => [],
    'currentCharms' => [],
    'isSpecialItem' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'weaponId',
    'weaponName',
    'skinId',
    'skinName',
    'skinImage',
    'rarityColor',
    'rarityName',
    'serverId',
    'currentTeam',
    'currentWear' => 0,
    'currentStatTrak' => false,
    'currentFloat' => '0.0',
    'currentPattern' => '0',
    'currentNametag' => '',
    'currentStickers' => [],
    'currentCharms' => [],
    'isSpecialItem' => false,
]); ?>
<?php foreach (array_filter(([
    'weaponId',
    'weaponName',
    'skinId',
    'skinName',
    'skinImage',
    'rarityColor',
    'rarityName',
    'serverId',
    'currentTeam',
    'currentWear' => 0,
    'currentStatTrak' => false,
    'currentFloat' => '0.0',
    'currentPattern' => '0',
    'currentNametag' => '',
    'currentStickers' => [],
    'currentCharms' => [],
    'isSpecialItem' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="skin-settings-modal-content">
    <div class="weapon-preview-section">
        <div class="weapon-showcase">
            <div class="weapon-image">
                <img src="<?php echo e($skinImage); ?>" alt="<?php echo e($skinName); ?>" loading="lazy">
                <div class="rarity-glow" style="--rarity-color: <?php echo e($rarityColor); ?>;"></div>
            </div>
        </div>

        <div class="weapon-attachments">
            <?php if(!$isSpecialItem): ?>
                <div class="attachment-section">
                    <div class="section-label"><?php echo e(__('skinchanger.settings.stickers_label')); ?></div>
                    <div class="stickers-preview">
                        <?php for($i = 0; $i < 4; $i++): ?>
                            <?php
                                $slotKey = 'slot' . ($i + 1);
                                $currentSticker = $currentStickers[$slotKey] ?? null;
                                $hasSticker = !empty($currentSticker) && isset($currentSticker['image']);
                            ?>
                            <div class="sticker-mini <?php echo e($hasSticker ? 'has-sticker' : 'empty-sticker'); ?>"
                                data-handler="open-sticker-sidebar" data-slot="<?php echo e($i); ?>"
                                data-weapon-index="<?php echo e($weaponId); ?>" data-skin-id="<?php echo e($skinId); ?>"
                                data-server-id="<?php echo e($serverId); ?>" data-team="<?php echo e($currentTeam); ?>">
                                <?php if($hasSticker): ?>
                                    <img src="<?php echo e($currentSticker['image'] ?? ''); ?>"
                                        alt="<?php echo e($currentSticker['name'] ?? ''); ?>" loading="lazy">
                                    <div class="remove-sticker" data-handler="remove-sticker-temp"
                                        data-slot="<?php echo e($i); ?>">×</div>
                                <?php else: ?>
                                    <span class="add-icon">+</span>
                                <?php endif; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="attachment-section">
                    <div class="section-label"><?php echo e(__('skinchanger.settings.charm_label')); ?></div>
                    <div class="charm-preview">
                        <?php
                            $currentCharm = $currentCharms[0] ?? null;
                            $hasCharm = !empty($currentCharm);
                        ?>
                        <div class="charm-mini <?php echo e($hasCharm ? 'has-charm' : 'empty-charm'); ?>"
                            data-handler="open-charm-sidebar" data-weapon-index="<?php echo e($weaponId); ?>"
                            data-skin-id="<?php echo e($skinId); ?>" data-server-id="<?php echo e($serverId); ?>"
                            data-team="<?php echo e($currentTeam); ?>">
                            <?php if($hasCharm): ?>
                                <img src="<?php echo e($currentCharm['image'] ?? ''); ?>" alt="<?php echo e($currentCharm['name'] ?? ''); ?>"
                                    loading="lazy">
                                <div class="remove-charm" data-handler="remove-charm-temp">×</div>
                            <?php else: ?>
                                <span class="add-icon">+</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="settings-panel">
        <div class="setting-section">
            <div class="setting-content">
                <div class="float-control">
                    <div class="float-visual-picker" data-handler="float-picker">
                        <div class="float-track">
                            <div class="float-thumb" style="left: <?php echo e($currentFloat * 100); ?>%;"
                                data-handler="float-thumb"></div>
                        </div>
                        <div class="float-labels">
                            <div class="float-label">
                                <span class="label-text">FN</span>
                                <span class="label-range">0.00-0.07</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">MW</span>
                                <span class="label-range">0.07-0.15</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">FT</span>
                                <span class="label-range">0.15-0.38</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">WW</span>
                                <span class="label-range">0.38-0.45</span>
                            </div>
                            <div class="float-label">
                                <span class="label-text">BS</span>
                                <span class="label-range">0.45-1.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-input-group">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'number','step' => '0.001','min' => '0','max' => '1','value' => ''.e($currentFloat).'','name' => 'float','class' => 'skin-setting-input']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '0.001','min' => '0','max' => '1','value' => ''.e($currentFloat).'','name' => 'float','class' => 'skin-setting-input']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <div class="current-quality">
                            <?php
                                $qualities = [
                                    __('skinchanger.quality.factory_new'),
                                    __('skinchanger.quality.minimal_wear'),
                                    __('skinchanger.quality.field_tested'),
                                    __('skinchanger.quality.well_worn'),
                                    __('skinchanger.quality.battle_scarred'),
                                ];
                                echo $qualities[$currentWear] ?? 'Unknown';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="setting-section">
            <div class="section-title"><?php echo e(__('skinchanger.settings.nametag')); ?></div>
            <div class="nametag-control">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'text','name' => 'nametag','maxlength' => '20','value' => ''.e($currentNametag).'','placeholder' => ''.e(__('skinchanger.settings.nametag_placeholder')).'','class' => 'skin-setting-input']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'nametag','maxlength' => '20','value' => ''.e($currentNametag).'','placeholder' => ''.e(__('skinchanger.settings.nametag_placeholder')).'','class' => 'skin-setting-input']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="settings-section">
            <div class="setting-section">
                <div class="section-title"><?php echo e(__('skinchanger.settings.pattern')); ?></div>
                <div class="pattern-control">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'number','name' => 'pattern','min' => '0','max' => '999','value' => ''.e($currentPattern).'','placeholder' => '0','class' => 'skin-setting-input']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'pattern','min' => '0','max' => '999','value' => ''.e($currentPattern).'','placeholder' => '0','class' => 'skin-setting-input']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            <div class="setting-section">
                <div class="section-title"><?php echo e(__('skinchanger.settings.stattrack')); ?></div>
                <div class="stattrack-control">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.toggle','data' => ['name' => 'stattrack','checked' => ''.e($currentStatTrak).'','class' => 'skin-setting-input']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'stattrack','checked' => ''.e($currentStatTrak).'','class' => 'skin-setting-input']); ?>
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
</div>

<div class="modal__footer skin-settings-modal-footer">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['dataModalClose' => 'skin-settings-modal','type' => 'outline-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-modal-close' => 'skin-settings-modal','type' => 'outline-primary']); ?>
        <?php echo e(__('skinchanger.buttons.close')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['dataHandler' => 'apply-skin-settings','dataWeaponIndex' => ''.e($weaponId).'','dataSkinId' => ''.e($skinId).'','dataServerId' => ''.e($serverId).'','dataTeam' => ''.e($currentTeam).'','type' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-handler' => 'apply-skin-settings','data-weapon-index' => ''.e($weaponId).'','data-skin-id' => ''.e($skinId).'','data-server-id' => ''.e($serverId).'','data-team' => ''.e($currentTeam).'','type' => 'primary']); ?>
        <?php echo e(__('skinchanger.buttons.apply')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>

<div class="skin-settings-data" style="display: none;">
    <input type="hidden" name="temp_sticker_slot_0" value="<?php echo e($currentStickers['slot1']['id'] ?? 0); ?>">
    <input type="hidden" name="temp_sticker_slot_1" value="<?php echo e($currentStickers['slot2']['id'] ?? 0); ?>">
    <input type="hidden" name="temp_sticker_slot_2" value="<?php echo e($currentStickers['slot3']['id'] ?? 0); ?>">
    <input type="hidden" name="temp_sticker_slot_3" value="<?php echo e($currentStickers['slot4']['id'] ?? 0); ?>">
    <input type="hidden" name="temp_charm" value="<?php echo e($currentCharms[0]['id'] ?? 0); ?>">
    <input type="hidden" name="temp_quality" value="<?php echo e($currentWear); ?>">
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/skin-settings.blade.php ENDPATH**/ ?>