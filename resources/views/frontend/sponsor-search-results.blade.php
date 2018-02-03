@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
                <div class="card">
                <div class="card-header text-white bg-primary">
                    <i class="fa fa-search"></i> Search Results
                </div>
                <div class="card-body">
                     @foreach ($zipdatas as $zipdata)
                        @foreach ($zipdata->users as $user)
                        <div class="row align-items-center">
                        <div class ="col-sm-3 col-md-2">
                        @if (($user->avatar_location) != null)
                            <img src="{{ URL::to($user->avatar_location) }}" class="user-profile-image">
                        @else    
                            <img src="{{ Gravatar::get( $user->email ) }}">
                        @endif
                    </div>
                    <div class ="col-sm-9 col-md-10">
                        <p class="mb-0"><strong>Username:</strong> {{ $user->username }}</p>
                        <p class="mb-0"><strong>Program:</strong> <span class="badge badge-pill badge-success">{{ $user->program }}</span></p>
                        <p class="mb-0"><strong>Sobriety Date:</strong> {{ $user->sobriety_date }}</p>
                        <p class="mb-0"><strong>Bio:</strong> {{ $user->bio }}</p>
                        <p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                        <p class="mb-0"><strong>ZipCode:</strong> {{ $user->zipcode }}</p>  
                    </div> 
                    </div>   
                    <hr>             
                        @endforeach
                    @endforeach                  
                </div>
            </div><!--card--> 
        </div><!--col-->
    </div><!--row-->
@endsection