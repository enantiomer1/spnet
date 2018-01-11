<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>{{ __('labels.frontend.user.profile.avatar') }}</th>
            <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.username') }}</th>
            <td>{{ $logged_in_user->username }}</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.email') }}</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.sobriety_date') }}</th>
            <td>{{ $logged_in_user->sobriety_date }} </td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.bio') }}</th>
            <td>{{ $logged_in_user->bio }}</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.zipcode') }}</th>
            <td>{{ $logged_in_user->zipcode }}</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.created_at') }}</th>
            <td>{{ $logged_in_user->created_at->format('Y-m-d') }} </td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.last_updated') }}</th>
            <td>{{ $logged_in_user->updated_at->format('Y-m-d') }} </td>
        </tr>
    </table>
</div>