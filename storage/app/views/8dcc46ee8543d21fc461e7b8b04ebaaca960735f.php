<?php
    use Flute\Modules\ProfilePosts\database\Entities\ProfilePostReaction;

    $isPostAuthor = user()->isLoggedIn() && $post->author && $post->author->id === user()->id;
    $isWallOwner = user()->isLoggedIn() && $post->wallUser && $post->wallUser->id === user()->id;
    $canDelete = user()->can('admin.profile_posts') || $isPostAuthor || $isWallOwner;
    
    $reactionCounts = $post->getReactionCounts();
    $userReactionIds = user()->isLoggedIn() ? $post->getUserReactionIds(user()->id) : [];
    
    $commentsEnabled = config('profile_posts.comments.enabled', true);
    $reactionsEnabled = config('profile_posts.reactions.enabled', true);
    $availableEmojis = ProfilePostReaction::getAvailableEmojis(); // Returns [id => emoji]
    $emojiMap = ProfilePostReaction::getEmojiMap();
    $commentsCount = count($post->comments);
    $hasReplies = $commentsCount > 0;
    
    // Get main role with color
    $authorMainRole = collect($post->author->roles ?? [])->sortByDesc('priority')->first();
    $authorRoleName = $authorMainRole ? $authorMainRole->name : null;
    $authorRoleColor = $authorMainRole ? $authorMainRole->color : null;
    
    $isVerified = false;
    if ($authorMainRole) {
        $isVerified = in_array($authorMainRole->priority ?? 0, [1, 2]);
    }
    
    $timeAgo = \Carbon\Carbon::instance($post->createdAt)->diffForHumans(null, true, true);
?>

<article class="wall-post" id="post-<?php echo e($post->id); ?>" data-post-id="<?php echo e($post->id); ?>">
    <div class="wall-post__left">
        <a href="<?php echo e(url('profile/' . $post->author->getUrl())); ?>" class="wall-post__avatar" data-user-card>
            <img src="<?php echo e(asset($post->author->avatar)); ?>" alt="<?php echo e($post->author->name); ?>" loading="lazy" />
        </a>
        <?php if($hasReplies): ?>
            <div class="wall-post__thread-line"></div>
        <?php endif; ?>
    </div>

    <div class="wall-post__body">
        <div class="wall-post__header">
            <div class="wall-post__info">
                <a href="<?php echo e(url('profile/' . $post->author->getUrl())); ?>" class="wall-post__name" data-user-card><?php echo e($post->author->name); ?></a>
                <?php if($isVerified): ?>
                    <span class="wall-post__verified">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.fill.seal-check-fill'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </span>
                <?php endif; ?>
                <?php if($authorRoleName): ?>
                    <span class="wall-post__role" <?php if($authorRoleColor): ?> style="--role-color: <?php echo e($authorRoleColor); ?>" <?php endif; ?>><?php echo e($authorRoleName); ?></span>
                <?php endif; ?>
                <span class="wall-post__time"><?php echo e($timeAgo); ?></span>
            </div>
            <?php if($canDelete): ?>
                <div class="wall-post__menu-wrap">
                    <button type="button" class="wall-post__menu-btn" data-dropdown-open="post-menu-<?php echo e($post->id); ?>">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.dots-three-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <div class="wall-post__dropdown" data-dropdown="post-menu-<?php echo e($post->id); ?>">
                        <button type="button" class="wall-post__dropdown-item wall-post__dropdown-item--danger"
                                hx-delete="<?php echo e(route('profile_posts.delete', ['id' => $post->id])); ?>"
                                hx-target="#post-<?php echo e($post->id); ?>"
                                hx-swap="outerHTML transition:true"
                                hx-flute-confirm="<?php echo e(__('profile_posts.confirm_delete')); ?>"
                                hx-flute-confirm-type="error"
                                hx-trigger="confirmed">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.trash-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <span><?php echo e(__('def.delete')); ?></span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="wall-post__content"><?php echo nl2br(e($post->content)); ?></div>

        <?php if($post->image): ?>
            <div class="wall-post__image md-content" data-lightbox-container>
                <img src="<?php echo e(asset($post->image)); ?>" alt="" loading="lazy" />
            </div>
        <?php endif; ?>

        <?php if($reactionsEnabled): ?>
            <div class="wall-reactions-row">
                <div class="wall-reactions" data-reactions="post-<?php echo e($post->id); ?>">
                    <?php $__currentLoopData = $reactionCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emojiId => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $emoji = $emojiMap[$emojiId] ?? '❓';
                            $hasReaction = in_array($emojiId, $userReactionIds); 
                        ?>
                        <button type="button" 
                                class="wall-reactions__pill <?php echo e($hasReaction ? 'wall-reactions__pill--active' : ''); ?> <?php echo e(!user()->isLoggedIn() ? 'wall-reactions__pill--disabled' : ''); ?>"
                                data-reaction-id="<?php echo e($emojiId); ?>"
                                data-post="<?php echo e($post->id); ?>"
                                data-target-type="post"
                                <?php if(!user()->isLoggedIn()): ?> disabled <?php endif; ?>>
                            <span class="wall-reactions__emoji"><?php echo e($emoji); ?></span>
                            <span class="wall-reactions__count" data-count><?php echo e($count); ?></span>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if(user()->isLoggedIn()): ?>
                    <div class="wall-reaction-picker">
                        <input type="hidden" data-emoji-map value="<?php echo e(json_encode($availableEmojis)); ?>" />
                        <button type="button" class="wall-reaction-picker__toggle" data-picker-toggle="<?php echo e($post->id); ?>" data-picker-type="post" title="<?php echo e(__('profile_posts.add_reaction')); ?>">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.smiley-wink'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <?php endif; ?>

        <div class="wall-post__actions">
            <?php if($commentsEnabled): ?>
                <button type="button" class="wall-action-btn" data-toggle-replies="<?php echo e($post->id); ?>">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.chat-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php if($commentsCount > 0): ?>
                        <span class="wall-action-btn__count"><?php echo e($commentsCount); ?></span>
                    <?php endif; ?>
                </button>
            <?php endif; ?>
        </div>

        <?php if($commentsEnabled): ?>
            <div class="wall-replies" id="replies-<?php echo e($post->id); ?>" data-replies-visible="<?php echo e($hasReplies ? '1' : '0'); ?>">
                <?php if($hasReplies): ?>
                    <div class="wall-replies__list">
                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $isCommentAuthor = user()->isLoggedIn() && $comment->user->id === user()->id;
                                $canDeleteComment = user()->can('admin.profile_posts') || $isCommentAuthor || $isPostAuthor || $isWallOwner;
                                $commentMainRole = collect($comment->user->roles ?? [])->sortByDesc('priority')->first();
                                $commentRoleName = $commentMainRole ? $commentMainRole->name : null;
                                $commentRoleColor = $commentMainRole ? $commentMainRole->color : null;
                                $commentVerified = $commentMainRole && in_array($commentMainRole->priority ?? 0, [1, 2]);
                                $commentReactionCounts = $comment->getReactionCounts();
                                $commentUserReactionIds = user()->isLoggedIn() ? $comment->getUserReactionIds(user()->id) : [];
                            ?>
                            <div class="wall-reply" id="comment-<?php echo e($comment->id); ?>">
                                <a href="<?php echo e(url('profile/' . $comment->user->getUrl())); ?>" class="wall-reply__avatar" data-user-card>
                                    <img src="<?php echo e(asset($comment->user->avatar)); ?>" alt="<?php echo e($comment->user->name); ?>" loading="lazy" />
                                </a>
                                <div class="wall-reply__body">
                                    <div class="wall-reply__header">
                                        <a href="<?php echo e(url('profile/' . $comment->user->getUrl())); ?>" class="wall-reply__name" data-user-card><?php echo e($comment->user->name); ?></a>
                                        <?php if($commentVerified): ?>
                                            <span class="wall-reply__verified">
                                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.fill.seal-check-fill'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            </span>
                                        <?php endif; ?>
                                        <?php if($commentRoleName): ?>
                                            <span class="wall-reply__role" <?php if($commentRoleColor): ?> style="--role-color: <?php echo e($commentRoleColor); ?>" <?php endif; ?>><?php echo e($commentRoleName); ?></span>
                                        <?php endif; ?>
                                        <span class="wall-reply__time"><?php echo e(\Carbon\Carbon::instance($comment->createdAt)->diffForHumans(null, true, true)); ?></span>
                                    </div>
                                    <p class="wall-reply__text"><?php echo e($comment->content); ?></p>
                                    
                                    <?php if($reactionsEnabled): ?>
                                        <div class="wall-reactions-row wall-reactions-row--compact">
                                            <div class="wall-reactions wall-reactions--compact" data-reactions="comment-<?php echo e($comment->id); ?>">
                                                <?php $__currentLoopData = $commentReactionCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emojiId => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                        $emoji = $emojiMap[$emojiId] ?? '❓';
                                                        $hasReaction = in_array($emojiId, $commentUserReactionIds); 
                                                    ?>
                                                    <button type="button" 
                                                            class="wall-reactions__pill <?php echo e($hasReaction ? 'wall-reactions__pill--active' : ''); ?> <?php echo e(!user()->isLoggedIn() ? 'wall-reactions__pill--disabled' : ''); ?>"
                                                            data-reaction-id="<?php echo e($emojiId); ?>"
                                                            data-post="<?php echo e($comment->id); ?>"
                                                            data-target-type="comment"
                                                            <?php if(!user()->isLoggedIn()): ?> disabled <?php endif; ?>>
                                                        <span class="wall-reactions__emoji"><?php echo e($emoji); ?></span>
                                                        <span class="wall-reactions__count" data-count><?php echo e($count); ?></span>
                                                    </button>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <?php if(user()->isLoggedIn()): ?>
                                                <div class="wall-reaction-picker wall-reaction-picker--compact">
                                                    <input type="hidden" data-emoji-map value="<?php echo e(json_encode($availableEmojis)); ?>" />
                                                    <button type="button" class="wall-reaction-picker__toggle" data-picker-toggle="<?php echo e($comment->id); ?>" data-picker-type="comment">
                                                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.smiley'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <?php endif; ?>
                                </div>
                                <?php if($canDeleteComment): ?>
                                    <button type="button" class="wall-reply__delete"
                                            hx-delete="<?php echo e(route('profile_posts.comment.delete', ['id' => $comment->id])); ?>"
                                            hx-target="#post-<?php echo e($post->id); ?>"
                                            hx-swap="outerHTML transition:true"
                                            hx-flute-confirm="<?php echo e(__('profile_posts.confirm_delete_comment')); ?>"
                                            hx-flute-confirm-type="error"
                                            hx-trigger="confirmed">
                                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.x-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <?php if(user()->isLoggedIn()): ?>
                    <form class="wall-reply-input"
                          hx-post="<?php echo e(route('profile_posts.comment', ['id' => $post->id])); ?>"
                          hx-target="#post-<?php echo e($post->id); ?>"
                          hx-swap="outerHTML transition:true">
                        <?php echo csrf_field(); ?>
                        <img src="<?php echo e(asset(user()->avatar)); ?>" alt="<?php echo e(user()->name); ?>" class="wall-reply-input__avatar" loading="lazy" />
                        <input type="text" 
                               name="content" 
                               class="wall-reply-input__field"
                               placeholder="<?php echo e(__('profile_posts.form.reply_placeholder', ['name' => $post->author->name])); ?>" 
                               required 
                               autocomplete="off" />
                        <button type="submit" class="wall-reply-input__submit"><?php echo e(__('profile_posts.form.submit')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/ProfilePosts/Resources/views/components/card.blade.php ENDPATH**/ ?>