{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }}

                <div>
                    <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
                    <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> Upload

                    @foreach ($logged_in_user->providers as $provider)
                        @if (strlen($provider->avatar))
                            <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                        @endif
                    @endforeach
                </div>
            </div><!--form-group-->

            <div class="form-group hidden" id="avatar_location">
                {{ html()->file('avatar_location')->class('form-control') }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.username'))->for('username') }}

                {{ html()->text('username')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.username'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.program'))->for('program') }}

                {{ html()->text('program')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.program'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.sobriety_date'))->for('sobriety_date') }}

                {{ html()->text('sobriety_date')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.sobriety_date'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

     <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.zipcode'))->for('zipcode') }}

                {{ html()->text('zipcode')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.zipcode'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.bio'))->for('bio') }}

                {{ html()->textarea('bio')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.bio'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    @if ($logged_in_user->canChangeEmail())
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> {{  __('strings.frontend.user.change_email_notice') }}
                </div>

                <div class="form-group">
                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                    {{ html()->email('email')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.email'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    @endif

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
                {{ form_submit(__('labels.general.buttons.update')) }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
{{ html()->closeModelForm() }}

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush