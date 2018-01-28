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
                        <div class="row align-items-center">
                        <div class ="col-sm-3 col-md-2">
                        @if (($user->avatar_location) != null)
                            <img src="{{ URL::to($user->avatar_location) }}" class="user-profile-image">
                        @else    
                            <img src="{{ Gravatar::get( $user->email ) }}">
                        @endif
                    </div>
                    <div class ="col-sm-9 col-md-10">
                        <li>{{ $user->username }}</li>
                        <li><span class="badge badge-pill badge-success">{{ $user->program }}</span></li>
                        <li>{{ $user->sobriety_date }}</li>
                        <li>{{ $user->bio }}</li>
                        <li><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                        <li>{{ $user->zipcode }}</li>     
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