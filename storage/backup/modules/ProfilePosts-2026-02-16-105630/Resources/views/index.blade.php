<div class="wall-container">
    <div class="wall-header">
        <h2 class="wall-header__title">{{ __('profile_posts.title') }}</h2>
        @if (count($posts) > 0)
            <span class="wall-header__count">{{ count($posts) }}</span>
        @endif
    </div>

    @if (user()->isLoggedIn() && $canPost['allowed'])
        <div class="wall-composer">
            <img src="{{ asset(user()->avatar) }}" alt="{{ user()->name }}" class="wall-composer__avatar" loading="lazy" />
            <form class="wall-composer__form"
                  hx-post="{{ route('profile_posts.create', ['wallUserId' => $wallUser->id]) }}"
                  hx-target="#profile-posts-list"
                  hx-swap="innerHTML transition:true"
                  hx-encoding="multipart/form-data"
                  data-wall-composer>
                @csrf
                <textarea name="content"
                          class="wall-composer__input"
                          placeholder="{{ __('profile_posts.form.placeholder') }}"
                          rows="1"
                          required
                          data-wall-textarea></textarea>
                
                @if (config('profile_posts.images.enabled', true))
                    <div class="wall-composer__preview" style="display: none;" data-image-preview>
                        <img src="" alt="Preview" />
                        <button type="button" class="wall-composer__preview-remove" data-remove-image>
                            <x-icon path="ph.bold.x" />
                        </button>
                    </div>
                @endif

                <div class="wall-composer__actions">
                    @if (config('profile_posts.images.enabled', true))
                        <label class="wall-composer__attach" data-tooltip="{{ __('profile_posts.form.attach_image') }}">
                            <x-icon path="ph.regular.image" />
                            <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp" hidden data-image-input />
                        </label>
                    @else
                        <span></span>
                    @endif
                    <button type="submit" class="wall-composer__submit" disabled data-wall-submit>
                        {{ __('profile_posts.form.submit') }}
                    </button>
                </div>
            </form>
        </div>
    @elseif(user()->isLoggedIn() && !$canPost['allowed'])
        <div class="wall-notice wall-notice--locked">
            <x-icon path="ph.regular.lock-simple" />
            <span>{{ $canPost['reason'] }}</span>
        </div>
    @elseif(!user()->isLoggedIn())
        <div class="wall-notice wall-notice--auth">
            <x-icon path="ph.regular.user-circle" />
            <span>{{ __('profile_posts.form.login_to_post') }}</span>
        </div>
    @endif

    <div id="profile-posts-list" class="wall-feed">
        @include('profile-posts::components.list', [
            'posts' => $posts, 
            'wallUser' => $wallUser, 
            'isWallOwner' => $isWallOwner, 
            'canPost' => $canPost, 
            'hasMore' => $hasMore, 
            'page' => $page
        ])
    </div>
</div>
