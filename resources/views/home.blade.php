@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Send friend requests
                   @foreach($users as $user)
                   <!-- {{dump($users)}} -->
                    <div class="card">
                        <img src="asset('storage/app/public/images/{{$user->profilepic}}')">
                        <h1>{{$user->name}}</h1>
                        <p class="title">{{$user->email}}</p>
                        <p>{{$user->gender}}</p>
                        <p><button class='add_friend' data-id="{{$user->id}}">
                        <span class="req-btn-name" id='{{$user->id}}'>Add friend</span>
                        </button></p>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
