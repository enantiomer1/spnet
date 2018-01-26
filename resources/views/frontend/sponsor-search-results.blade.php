@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
                <div class="card">
                <div class="card-header">
                    <i class="fa fa-search"></i> Search Results
                </div>
                <div class="card-body">
                    <ul>
                     @foreach ($zipdatas as $zipdata)
                        @foreach ($zipdata->users as $user)
                            <li>{{ $user->username }}</li>
                            <li>{{ $user->program }}</li>
                            <li>{{ $user->sobriety_date }}</li>
                            <li>{{ $user->bio }}</li>
                            <li><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                            <li>{{ $user->zipcode }}</li>
                            <hr>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            </div><!--card--> 
        </div><!--col-->
    </div><!--row-->

@endsection
