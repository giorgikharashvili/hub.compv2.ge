@if (count($posts) > 0)
    @foreach ($posts as $post)
        @include('profile-posts::components.card', ['post' => $post, 'isWallOwner' => $isWallOwner, 'canPost' => $canPost])
    @endforeach

    @if ($hasMore ?? false)
        <div class="wall-load-more">
            <button type="button"
                    class="wall-load-more__btn"
                    hx-get="{{ route('profile_posts.list', ['wallUserId' => $wallUser->id]) }}?page={{ ($page ?? 1) + 1 }}"
                    hx-target="#profile-posts-list"
                    hx-swap="innerHTML transition:true">
                <x-icon path="ph.regular.arrow-down" />
                <span>{{ __('profile_posts.load_more') }}</span>
            </button>
        </div>
    @endif
@else
    <div class="wall-empty">
        <div class="wall-empty__visual">
            <x-icon path="ph.regular.chats-circle" class="wall-empty__icon" />
        </div>
        <h3 class="wall-empty__title">{{ __('profile_posts.empty.title') }}</h3>
        <p class="wall-empty__text">
            @if ($isWallOwner)
                {{ __('profile_posts.empty.owner_text') }}
            @else
                {{ __('profile_posts.empty.text') }}
            @endif
        </p>
    </div>
@endif
