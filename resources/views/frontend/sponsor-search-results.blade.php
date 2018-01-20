@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-home"></i> Search Results
                </div>
                <div class="card-body">
                    <ul>
                         @foreach ($get_coordinates as $coordinate)
                        <li>{{ $coordinate->zipdata }}</li>
                        @endforeach
                    </ul>    
                
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
