<div class="steam-friends-container" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true">
    @if (isset($friends) && count($friends) > 0)
        <div class="steam-friends-list">
            @foreach ($friends as $friend)
                <a href="{{ url('profile/' . $friend['user']->getUrl()) }}" class="steam-friends-card" data-user-card>
                    <div
                        class="steam-friends-avatar {{ $friend['user']->isOnline() ? 'steam-friends-avatar--online' : '' }}">
                        <img src="{{ asset($friend['user']->avatar) }}" alt="{{ $friend['user']->name }}">
                    </div>
                    <div class="steam-friends-info">
                        <h3 class="steam-friends-name">{{ $friend['user']->name }}</h3>
                        <div class="steam-friends-status">
                            @if(method_exists($friend['user'], 'getLastLoggedPhrase'))
                                {{ $friend['user']->isOnline() ? __('steamfriends.online') : $friend['user']->getLastLoggedPhrase() }}
                            @else
                                {{ $friend['user']->isOnline() ? __('steamfriends.online') : __($friend['user']->last_logged ? 'profile.was_online' : 'def.not_online', [':date' => carbon($friend['user']->last_logged)->diffForHumans()]) }}
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="steam-friends-empty">
            {{ __('steamfriends.no_friends') }}
        </div>
    @endif
</div>
