@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <h1 class="card-header">Display of info from contact page!</h1>
        <div class="card-body">
            <h5>
                <p class="card-text">Email address: {{$contact_msg}}</p>
                <p class="card-text">Subject: {{$contact_msg}}</p>
                <p class="card-text">Message Body: {{$contact_msg}}</p>
            </h5><br>
            <a href="{{route('home')}}" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
@endsection