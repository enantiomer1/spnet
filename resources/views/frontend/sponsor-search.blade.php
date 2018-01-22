@extends('frontend.layouts.app')

@section('content')
     <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.search.box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.sponsor-search.search'))->open() }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.zipcode'))->for('zipcode') }}

                                    {{ html()->text('zipcode')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.zipcode'))
                                        ->attribute('maxlength', 5)
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.search_radius'))->for('search_radius') }}

                                    {{ html()->text('search_radius')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.search_radius'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group clearfix">
                                    {{ form_submit(__('labels.frontend.search.button'))
                                        ->class ('btn btn-primary') }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                    {{ html()->form()->close() }}

                </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection
