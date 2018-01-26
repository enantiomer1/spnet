@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-search"></i> Search Results
                </div>
                <div class="card-body">
                     @foreach ($zipdatas as $zipdata)
                        @foreach ($zipdata->users as $user)
                            <div class="card mb-4">
                                <div class="card-header">
                                    Userame: <strong>{{ $user->username }}</strong></span>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>Program: <span class="badge badge-pill badge-success">{{ $user->program }}</span></li>
                                        <li>Sobriety Date: <strong>{{ $user->sobriety_date }}</strong></li>
                                        <li>Bio: <strong>{{ $user->bio }}</strong></li>
                                        <li>email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                                        <li>Zipcode: {{ $user->zipcode }}</li>
                                    </ul>
                                </div>
                            </div><!--card-->
                        @endforeach
                    @endforeach
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection

                    <!-- <ul>
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
                    </ul> -->