<div class="wall-container">
    <div class="wall-header">
        <h2 class="wall-header__title"><?php echo e(__('profile_posts.title')); ?></h2>
        <?php if(count($posts) > 0): ?>
            <span class="wall-header__count"><?php echo e(count($posts)); ?></span>
        <?php endif; ?>
    </div>

    <?php if(user()->isLoggedIn() && $canPost['allowed']): ?>
        <div class="wall-composer">
            <img src="<?php echo e(asset(user()->avatar)); ?>" alt="<?php echo e(user()->name); ?>" class="wall-composer__avatar" loading="lazy" />
            <form class="wall-composer__form"
                  hx-post="<?php echo e(route('profile_posts.create', ['wallUserId' => $wallUser->id])); ?>"
                  hx-target="#profile-posts-list"
                  hx-swap="innerHTML transition:true"
                  hx-encoding="multipart/form-data"
                  data-wall-composer>
                <?php echo csrf_field(); ?>
                <textarea name="content"
                          class="wall-composer__input"
                          placeholder="<?php echo e(__('profile_posts.form.placeholder')); ?>"
                          rows="1"
                          required
                          data-wall-textarea></textarea>
                
                <?php if(config('profile_posts.images.enabled', true)): ?>
                    <div class="wall-composer__preview" style="display: none;" data-image-preview>
                        <img src="" alt="Preview" />
                        <button type="button" class="wall-composer__preview-remove" data-remove-image>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.x'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                <div class="wall-composer__actions">
                    <?php if(config('profile_posts.images.enabled', true)): ?>
                        <label class="wall-composer__attach" data-tooltip="<?php echo e(__('profile_posts.form.attach_image')); ?>">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.image'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp" hidden data-image-input />
                        </label>
                    <?php else: ?>
                        <span></span>
                    <?php endif; ?>
                    <button type="submit" class="wall-composer__submit" disabled data-wall-submit>
                        <?php echo e(__('profile_posts.form.submit')); ?>

                    </button>
                </div>
            </form>
        </div>
    <?php elseif(user()->isLoggedIn() && !$canPost['allowed']): ?>
        <div class="wall-notice wall-notice--locked">
            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.lock-simple'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <span><?php echo e($canPost['reason']); ?></span>
        </div>
    <?php elseif(!user()->isLoggedIn()): ?>
        <div class="wall-notice wall-notice--auth">
            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.user-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <span><?php echo e(__('profile_posts.form.login_to_post')); ?></span>
        </div>
    <?php endif; ?>

    <div id="profile-posts-list" class="wall-feed">
        <?php echo $__env->make('profile-posts::components.list', [
            'posts' => $posts, 
            'wallUser' => $wallUser, 
            'isWallOwner' => $isWallOwner, 
            'canPost' => $canPost, 
            'hasMore' => $hasMore, 
            'page' => $page
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/ProfilePosts/Resources/views/index.blade.php ENDPATH**/ ?>