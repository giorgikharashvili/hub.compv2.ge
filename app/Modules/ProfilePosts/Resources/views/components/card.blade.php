@php
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
@endphp

<article class="wall-post" id="post-{{ $post->id }}" data-post-id="{{ $post->id }}">
    <div class="wall-post__left">
        <a href="{{ url('profile/' . $post->author->getUrl()) }}" class="wall-post__avatar" data-user-card>
            <img src="{{ asset($post->author->avatar) }}" alt="{{ $post->author->name }}" loading="lazy" />
        </a>
        @if ($hasReplies)
            <div class="wall-post__thread-line"></div>
        @endif
    </div>

    <div class="wall-post__body">
        <div class="wall-post__header">
            <div class="wall-post__info">
                <a href="{{ url('profile/' . $post->author->getUrl()) }}" class="wall-post__name" data-user-card>{{ $post->author->name }}</a>
                @if ($isVerified)
                    <span class="wall-post__verified">
                        <x-icon path="ph.fill.seal-check-fill" />
                    </span>
                @endif
                @if ($authorRoleName)
                    <span class="wall-post__role" @if($authorRoleColor) style="--role-color: {{ $authorRoleColor }}" @endif>{{ $authorRoleName }}</span>
                @endif
                <span class="wall-post__time">{{ $timeAgo }}</span>
            </div>
            @if ($canDelete)
                <div class="wall-post__menu-wrap">
                    <button type="button" class="wall-post__menu-btn" data-dropdown-open="post-menu-{{ $post->id }}">
                        <x-icon path="ph.bold.dots-three-bold" />
                    </button>
                    <div class="wall-post__dropdown" data-dropdown="post-menu-{{ $post->id }}">
                        <button type="button" class="wall-post__dropdown-item wall-post__dropdown-item--danger"
                                hx-delete="{{ route('profile_posts.delete', ['id' => $post->id]) }}"
                                hx-target="#post-{{ $post->id }}"
                                hx-swap="outerHTML transition:true"
                                hx-flute-confirm="{{ __('profile_posts.confirm_delete') }}"
                                hx-flute-confirm-type="error"
                                hx-trigger="confirmed">
                            <x-icon path="ph.bold.trash-bold" />
                            <span>{{ __('def.delete') }}</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <div class="wall-post__content">{!! nl2br(e($post->content)) !!}</div>

        @if ($post->image)
            <div class="wall-post__image md-content" data-lightbox-container>
                <img src="{{ asset($post->image) }}" alt="" loading="lazy" />
            </div>
        @endif

        @if ($reactionsEnabled)
            <div class="wall-reactions-row">
                <div class="wall-reactions" data-reactions="post-{{ $post->id }}">
                    @foreach ($reactionCounts as $emojiId => $count)
                        @php 
                            $emoji = $emojiMap[$emojiId] ?? '❓';
                            $hasReaction = in_array($emojiId, $userReactionIds); 
                        @endphp
                        <button type="button" 
                                class="wall-reactions__pill {{ $hasReaction ? 'wall-reactions__pill--active' : '' }} {{ !user()->isLoggedIn() ? 'wall-reactions__pill--disabled' : '' }}"
                                data-reaction-id="{{ $emojiId }}"
                                data-post="{{ $post->id }}"
                                data-target-type="post"
                                @if (!user()->isLoggedIn()) disabled @endif>
                            <span class="wall-reactions__emoji">{{ $emoji }}</span>
                            <span class="wall-reactions__count" data-count>{{ $count }}</span>
                        </button>
                    @endforeach
                </div>
                @if (user()->isLoggedIn())
                    <div class="wall-reaction-picker">
                        <input type="hidden" data-emoji-map value="{{ json_encode($availableEmojis) }}" />
                        <button type="button" class="wall-reaction-picker__toggle" data-picker-toggle="{{ $post->id }}" data-picker-type="post" title="{{ __('profile_posts.add_reaction') }}">
                            <x-icon path="ph.regular.smiley-wink" />
                        </button>
                    </div>
                @endif
            </div>
        @endif

        <div class="wall-post__actions">
            @if ($commentsEnabled)
                <button type="button" class="wall-action-btn" data-toggle-replies="{{ $post->id }}">
                    <x-icon path="ph.regular.chat-circle" />
                    @if ($commentsCount > 0)
                        <span class="wall-action-btn__count">{{ $commentsCount }}</span>
                    @endif
                </button>
            @endif
        </div>

        @if ($commentsEnabled)
            <div class="wall-replies" id="replies-{{ $post->id }}" data-replies-visible="{{ $hasReplies ? '1' : '0' }}">
                @if ($hasReplies)
                    <div class="wall-replies__list">
                        @foreach ($post->comments as $comment)
                            @php
                                $isCommentAuthor = user()->isLoggedIn() && $comment->user->id === user()->id;
                                $canDeleteComment = user()->can('admin.profile_posts') || $isCommentAuthor || $isPostAuthor || $isWallOwner;
                                $commentMainRole = collect($comment->user->roles ?? [])->sortByDesc('priority')->first();
                                $commentRoleName = $commentMainRole ? $commentMainRole->name : null;
                                $commentRoleColor = $commentMainRole ? $commentMainRole->color : null;
                                $commentVerified = $commentMainRole && in_array($commentMainRole->priority ?? 0, [1, 2]);
                                $commentReactionCounts = $comment->getReactionCounts();
                                $commentUserReactionIds = user()->isLoggedIn() ? $comment->getUserReactionIds(user()->id) : [];
                            @endphp
                            <div class="wall-reply" id="comment-{{ $comment->id }}">
                                <a href="{{ url('profile/' . $comment->user->getUrl()) }}" class="wall-reply__avatar" data-user-card>
                                    <img src="{{ asset($comment->user->avatar) }}" alt="{{ $comment->user->name }}" loading="lazy" />
                                </a>
                                <div class="wall-reply__body">
                                    <div class="wall-reply__header">
                                        <a href="{{ url('profile/' . $comment->user->getUrl()) }}" class="wall-reply__name" data-user-card>{{ $comment->user->name }}</a>
                                        @if ($commentVerified)
                                            <span class="wall-reply__verified">
                                                <x-icon path="ph.fill.seal-check-fill" />
                                            </span>
                                        @endif
                                        @if ($commentRoleName)
                                            <span class="wall-reply__role" @if($commentRoleColor) style="--role-color: {{ $commentRoleColor }}" @endif>{{ $commentRoleName }}</span>
                                        @endif
                                        <span class="wall-reply__time">{{ \Carbon\Carbon::instance($comment->createdAt)->diffForHumans(null, true, true) }}</span>
                                    </div>
                                    <p class="wall-reply__text">{{ $comment->content }}</p>
                                    
                                    @if ($reactionsEnabled)
                                        <div class="wall-reactions-row wall-reactions-row--compact">
                                            <div class="wall-reactions wall-reactions--compact" data-reactions="comment-{{ $comment->id }}">
                                                @foreach ($commentReactionCounts as $emojiId => $count)
                                                    @php 
                                                        $emoji = $emojiMap[$emojiId] ?? '❓';
                                                        $hasReaction = in_array($emojiId, $commentUserReactionIds); 
                                                    @endphp
                                                    <button type="button" 
                                                            class="wall-reactions__pill {{ $hasReaction ? 'wall-reactions__pill--active' : '' }} {{ !user()->isLoggedIn() ? 'wall-reactions__pill--disabled' : '' }}"
                                                            data-reaction-id="{{ $emojiId }}"
                                                            data-post="{{ $comment->id }}"
                                                            data-target-type="comment"
                                                            @if (!user()->isLoggedIn()) disabled @endif>
                                                        <span class="wall-reactions__emoji">{{ $emoji }}</span>
                                                        <span class="wall-reactions__count" data-count>{{ $count }}</span>
                                                    </button>
                                                @endforeach
                                            </div>
                                            @if (user()->isLoggedIn())
                                                <div class="wall-reaction-picker wall-reaction-picker--compact">
                                                    <input type="hidden" data-emoji-map value="{{ json_encode($availableEmojis) }}" />
                                                    <button type="button" class="wall-reaction-picker__toggle" data-picker-toggle="{{ $comment->id }}" data-picker-type="comment">
                                                        <x-icon path="ph.regular.smiley" />
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                @if ($canDeleteComment)
                                    <button type="button" class="wall-reply__delete"
                                            hx-delete="{{ route('profile_posts.comment.delete', ['id' => $comment->id]) }}"
                                            hx-target="#post-{{ $post->id }}"
                                            hx-swap="outerHTML transition:true"
                                            hx-flute-confirm="{{ __('profile_posts.confirm_delete_comment') }}"
                                            hx-flute-confirm-type="error"
                                            hx-trigger="confirmed">
                                        <x-icon path="ph.bold.x-bold" />
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                @if (user()->isLoggedIn())
                    <form class="wall-reply-input"
                          hx-post="{{ route('profile_posts.comment', ['id' => $post->id]) }}"
                          hx-target="#post-{{ $post->id }}"
                          hx-swap="outerHTML transition:true">
                        @csrf
                        <img src="{{ asset(user()->avatar) }}" alt="{{ user()->name }}" class="wall-reply-input__avatar" loading="lazy" />
                        <input type="text" 
                               name="content" 
                               class="wall-reply-input__field"
                               placeholder="{{ __('profile_posts.form.reply_placeholder', ['name' => $post->author->name]) }}" 
                               required 
                               autocomplete="off" />
                        <button type="submit" class="wall-reply-input__submit">{{ __('profile_posts.form.submit') }}</button>
                    </form>
                @endif
            </div>
        @endif
    </div>
</article>
