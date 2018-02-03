@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    <i class="fa fa-home"></i> {{ __('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div>
                <div class="card-body">
                    <h5>Find a Sponsor Near You - AA, NA, CA, and Others</h5><hr>
                    <p>Sandy B. once said: "finding a sponsor is like finding a parent, how do I know if he/she is going to be the one?"</p>
                    <p>For the newcomer, this can be a difficult task and sometimes keep a new AA member from entering into the program and the steps. We created this site to help facilitate this process.  If you have not found a sponsor yet, or need a new one, search and browse to for local program members near you.  Sponsor profiles include their sobriety date, and a quick bio that may help in deciding to contact someone.</p>
                    <p>The sponsor search requires registration and is designed for your privacy.  We also recommend <strong>not using full names in your username</strong>, so anonymity can be maintained as much as possible.</p>
                <p><a class="btn btn-success mt-2" href="/sponsor-search" role="button">Sponsor Search</a></p>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-primary">
                  <i class="fa fa-search"></i> Instructions
                </div>
                <div class="card-body">
                   <h5>To search:</h5>
                    <p>1. Create your account/register <a class="btn btn-sm btn-success ml-2" href="/register" role="button">Create Account / Register</a></p>
                    <p>2. Go to sponsor the search page and search away...</p>
                    <hr>
                    <h5>To Register as a Sponsor:</h5>
                    <p>1. Create your account/register <a class="btn btn-sm btn-success ml-2" href="/register" role="button">Create Account / Register</a></p>
                    <p>2. Update your profile with your program (AA, NA, CA, Al-Anon, zipcode, sobriety date, and create a Bio (sponsor style, etc.) for searchers to see...</p>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
