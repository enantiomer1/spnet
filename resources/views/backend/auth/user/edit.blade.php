@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.users.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.users.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.username'))->class('col-md-2 form-control-label')->for('username') }}

                        <div class="col-md-10">
                            {{ html()->text('username')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.username'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.zipcode'))->class('col-md-2 form-control-label')->for('zipcode') }}

                        <div class="col-md-10">
                            {{ html()->text('zipcode')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.zipcode'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                        <div class="table-responsive col-md-10">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                                        <th>{{ __('labels.backend.access.users.table.permissions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if ($roles->count())
                                                @foreach($roles as $role)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox">
                                                                {{ html()->label(
                                                                        html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                              ->class('switch-input')
                                                                              ->id('role-'.$role->id)
                                                                        . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                                    ->class('switch switch-sm switch-3d switch-primary')
                                                                    ->for('role-'.$role->id) }}
                                                                {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            @if ($role->id != 1)
                                                                @if ($role->permissions->count())
                                                                    @foreach ($role->permissions as $permission)
                                                                        <i class="fa fa-dot-circle-o"></i> {{ ucwords($permission->name) }}
                                                                    @endforeach
                                                                @else
                                                                    {{ __('labels.general.none') }}
                                                                @endif
                                                            @else
                                                                {{ __('labels.backend.access.users.all_permissions') }}
                                                            @endif
                                                        </div>
                                                    </div><!--card-->
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkbox">
                                                        {{ html()->label(
                                                                html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)
                                                                      ->class('switch-input')
                                                                      ->id('permission-'.$permission->id)
                                                                . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                            ->class('switch switch-sm switch-3d switch-primary')
                                                            ->for('permission-'.$permission->id) }}
                                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
