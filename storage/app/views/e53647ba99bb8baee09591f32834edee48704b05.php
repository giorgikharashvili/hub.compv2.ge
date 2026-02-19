<?php $__env->startSection('title', __('skinchanger.title')); ?>

<?php $__env->startPush('head'); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/utils.js'), false); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/modal-manager.js'), false); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/filter-manager.js'), false); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/skin-manager.js'), false); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/special-items-manager.js'), false); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/weapon-settings-manager.js'), false); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/Skinchanger/Resources/assets/js/skinchanger-manager.js'), false); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('content'); ?>
    <div class="container skins-container">
        <div class="skins-header">
            
        </div>

        <div class="skins-teams">
            <button class="skins-team-button <?php echo e(request()->input('team', 'ct') === 'ct' ? 'active' : ''); ?>"
                hx-get="<?php echo e(route('skinchanger.index')); ?>?team=ct&server_id=<?php echo e($selectedServerId); ?>" hx-target=".skins-content"
                hx-swap="outerHTML" hx-push-url="true" data-handler="team-button" data-team="ct">
                <?php echo $__env->make('skinchanger::components.team-icon', ['team' => 'ct'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(__('skinchanger.teams.ct', 'CT')); ?>

            </button>
            <button class="skins-team-button <?php echo e(request()->input('team', 'ct') === 't' ? 'active' : ''); ?>"
                hx-get="<?php echo e(route('skinchanger.index')); ?>?team=t&server_id=<?php echo e($selectedServerId); ?>"
                hx-target=".skins-content" hx-push-url="true" hx-swap="outerHTML" data-handler="team-button" data-team="t">
                <?php echo $__env->make('skinchanger::components.team-icon', ['team' => 't'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(__('skinchanger.teams.t', 'T')); ?>

            </button>

            <div class="skins-actions">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','class' => 'skins-copy-button','dataHandler' => 'copy-to-opposite-team','dataTeam' => ''.e(request()->input('team', 'ct')).'','dataServerId' => ''.e($selectedServerId).'','dataTooltip' => ''.e(__('skinchanger.buttons.copy_to_opposite')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'skins-copy-button','data-handler' => 'copy-to-opposite-team','data-team' => ''.e(request()->input('team', 'ct')).'','data-server-id' => ''.e($selectedServerId).'','data-tooltip' => ''.e(__('skinchanger.buttons.copy_to_opposite')).'']); ?>
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.copy','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-error','class' => 'skins-reset-button','dataHandler' => 'reset-all-skins','dataTeam' => ''.e(request()->input('team', 'ct')).'','dataServerId' => ''.e($selectedServerId).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-error','class' => 'skins-reset-button','data-handler' => 'reset-all-skins','data-team' => ''.e(request()->input('team', 'ct')).'','data-server-id' => ''.e($selectedServerId).'']); ?>
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-counter-clockwise','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php echo e(__('skinchanger.buttons.reset_all', 'Reset All')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>

        <?php echo $__env->make('skinchanger::partials.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <script>
        window.skinchangerData = {
            currentTeam: '<?php echo e(request()->input('team', 'ct')); ?>',
            serverId: <?php echo e($selectedServerId); ?>,
            weaponList: <?php echo json_encode($weaponList, 15, 512) ?>,
            qualityList: <?php echo json_encode($qualityList, 15, 512) ?>,
            playerData: <?php echo json_encode($playerData, 15, 512) ?>,
            routes: {
                index: '<?php echo e(route('skinchanger.index')); ?>',
                getItems: '<?php echo e(route('skinchanger.get_items', ['type' => 'PLACEHOLDER'])); ?>',
                getWeaponTypes: '<?php echo e(route('skinchanger.get_weapon_types', ['category' => 'PLACEHOLDER'])); ?>',
                getWeaponSkins: '<?php echo e(route('skinchanger.get_weapon_skins', ['weaponId' => 'PLACEHOLDER'])); ?>',
                saveSkin: '<?php echo e(route('skinchanger.save_skin')); ?>',
                saveItem: '<?php echo e(route('skinchanger.save_item')); ?>',
                removeSkin: '<?php echo e(route('skinchanger.remove_skin')); ?>',
                removeItem: '<?php echo e(route('skinchanger.remove_item')); ?>',
                resetAllSkins: '<?php echo e(route('skinchanger.reset_all_skins')); ?>',
                copyToOppositeTeam: '<?php echo e(route('skinchanger.copy_to_opposite_team')); ?>',
                updateWeaponSetting: '<?php echo e(route('skinchanger.apply_skin_settings')); ?>'
            },
            messages: {
                confirmRemoveSkin: <?php echo json_encode(__('skinchanger.confirm.remove_skin', 'Are you sure you want to remove this skin?'), 512) ?>,
                confirmRemoveItem: <?php echo json_encode(__('skinchanger.confirm.remove_item', 'Are you sure you want to remove this {item}?'), 512) ?>,
                confirmResetAllSkins: <?php echo json_encode(__(
                        'skinchanger.confirm.reset_all_skins', 'Are you sure you want to reset ALL skins for this team? This action cannot be undone.'), 512) ?>,
                confirmCopyToOpposite: <?php echo json_encode(__(
                        'skinchanger.confirm.copy_to_opposite', 'Are you sure you want to copy all skins from {source} to {team}? This will overwrite existing skins on the {team} team.'), 512) ?>,
                skinRemoved: <?php echo json_encode(__('skinchanger.messages.skin_removed', 'Skin removed successfully'), 512) ?>,
                itemRemoved: <?php echo json_encode(__('skinchanger.messages.item_removed', '{item} removed successfully'), 512) ?>,
                allSkinsReset: <?php echo json_encode(__('skinchanger.messages.all_skins_reset', 'All skins reset successfully'), 512) ?>,
                skinsCopied: <?php echo json_encode(__('skinchanger.messages.skins_copied', 'Skins copied to {team} team successfully'), 512) ?>,
                skinEquipped: <?php echo json_encode(__('skinchanger.messages.skin_equipped', 'Equipped {skin}'), 512) ?>,
                itemEquipped: <?php echo json_encode(__('skinchanger.messages.item_equipped', 'Equipped {item}'), 512) ?>,
                appliedToTeam: <?php echo json_encode(__('skinchanger.messages.applied_to_team', 'Applied skin to {team} team'), 512) ?>,
                appliedToBothTeams: <?php echo json_encode(__('skinchanger.messages.applied_to_both_teams', 'Applied skin to both teams'), 512) ?>,
                appliedToOneTeam: <?php echo json_encode(__('skinchanger.messages.applied_to_one_team', 'Applied skin to one team only'), 512) ?>,
                failedToApply: <?php echo json_encode(__('skinchanger.messages.failed_to_apply', 'Failed to apply skin'), 512) ?>,
                failedToRemove: <?php echo json_encode(__('skinchanger.messages.failed_to_remove', 'Failed to remove {item}'), 512) ?>,
                failedToReset: <?php echo json_encode(__('skinchanger.messages.failed_to_reset', 'Failed to reset skins'), 512) ?>,
                failedToCopy: <?php echo json_encode(__('skinchanger.messages.failed_to_copy', 'Failed to copy skins'), 512) ?>,
                failedToSave: <?php echo json_encode(__('skinchanger.messages.failed_to_save', 'Failed to save {item}'), 512) ?>,
                errorOccurred: <?php echo json_encode(__('skinchanger.messages.error_occurred', 'An error occurred'), 512) ?>,
                loadingError: <?php echo json_encode(__('skinchanger.messages.loading_error', 'Failed to load {item}. Please try again.'), 512) ?>,
                noItemsFound: <?php echo json_encode(__('skinchanger.messages.no_items_found', 'No items found'), 512) ?>,
                searchPlaceholder: <?php echo json_encode(__('skinchanger.search.placeholder', 'Search...'), 512) ?>,
                teamCT: <?php echo json_encode(__('skinchanger.teams.ct', 'CT'), 512) ?>,
                teamT: <?php echo json_encode(__('skinchanger.teams.t', 'T'), 512) ?>,
                noWeaponsFound: <?php echo json_encode(__('skinchanger.messages.noWeaponsFound', 'No weapons found matching your search'), 512) ?>,
                weaponSearchPlaceholder: <?php echo json_encode(__('skinchanger.search.weapon_search', 'Search weapons...'), 512) ?>,
                removeStickerConfirm: <?php echo json_encode(__('skinchanger.stickers.remove_confirm', 'Are you sure you want to remove this sticker?'), 512) ?>,
                removeCharmConfirm: <?php echo json_encode(__('skinchanger.charms.remove_confirm', 'Are you sure you want to remove this charm?'), 512) ?>,
                settingsApplied: <?php echo json_encode(__('skinchanger.messages.settings_applied', 'Settings applied successfully'), 512) ?>,
                settingsApplyError: <?php echo json_encode(__('skinchanger.messages.settings_apply_error', 'Failed to apply settings'), 512) ?>
            }
        };
    </script>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'skin-modal','title' => ''.e(__('skinchanger.skins.select', 'Select Skin')).'','size' => 'large']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'skin-modal','title' => ''.e(__('skinchanger.skins.select', 'Select Skin')).'','size' => 'large']); ?>
    <?php echo $__env->make('skinchanger::components.skeletons.skins-modal-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'weapon-modal','title' => ''.e(__('skinchanger.weapons.select', 'Select Weapon Type')).'','size' => 'large']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'weapon-modal','title' => ''.e(__('skinchanger.weapons.select', 'Select Weapon Type')).'','size' => 'large']); ?>
    <?php echo $__env->make('skinchanger::components.skeletons.weapon-modal-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'community-modal','title' => ''.e(__('skinchanger.community.title', 'Community Loadouts')).'','size' => 'large']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'community-modal','title' => ''.e(__('skinchanger.community.title', 'Community Loadouts')).'','size' => 'large']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'special-items-modal','title' => ''.e(__('skinchanger.items.select', 'Select Item')).'','size' => 'large']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'special-items-modal','title' => ''.e(__('skinchanger.items.select', 'Select Item')).'','size' => 'large']); ?>
    <?php echo $__env->make('skinchanger::components.skeletons.default-modal-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'loadout-preview-modal','title' => ''.e(__('skinchanger.loadouts.preview', 'Loadout Preview')).'','size' => 'large']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loadout-preview-modal','title' => ''.e(__('skinchanger.loadouts.preview', 'Loadout Preview')).'','size' => 'large']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'skin-settings-modal','title' => ''.e(__('skinchanger.settings.title', 'Skin Settings')).'','size' => 'medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'skin-settings-modal','title' => ''.e(__('skinchanger.settings.title', 'Skin Settings')).'','size' => 'medium']); ?>
    <?php echo $__env->make('skinchanger::components.skeletons.skin-settings-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php echo $__env->make('flute::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/index.blade.php ENDPATH**/ ?>