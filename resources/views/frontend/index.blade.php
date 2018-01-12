@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-home"></i> {{ __('navs.general.home') }}
                </div>
                <div class="card-body">
                    <h3>{{ __('strings.frontend.welcome_to', ['place' => app_name()]) }}</h3>
                    <p>Sandy B. once said: "finding a sponsor is like finding a parent, how do I know if he/she is going to be the one?"  For the newcomer, this can be a difficult task and sometimes keep a new AA member from entering into the program and the steps. We created this site to help facilitate this process.  If you have not found a sponsor yet, or need a new one, search and browse to for local AA members near you.  Sponsor profiles include their sobriety date, and a quick bio that may help in deciding to contact someone.  The sponsor search requires registration and is designed for your privacy.  We also recommend not using full names in your username, so anonymity can be maintained as much as possible.</p>
                <p><a class="btn btn-outline-primary mt-2" href="/sponsor-search" role="button">Sponsor Search</a></p>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <example-component></example-component>
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-fort-awesome"></i> Font Awesome {{ __('strings.frontend.test') }}
                </div>
                <div class="card-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
