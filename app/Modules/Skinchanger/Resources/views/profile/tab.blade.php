@if($user)
    <div class="profile-weapons-tab">
        @yoyo('weapons-profile', ['userId' => $user->id])
    </div>
@else
    <div class="alert alert-danger">
        {{ __('skinchanger.errors.user_not_found') }}
    </div>
@endif 