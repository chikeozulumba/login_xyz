@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-lg-10 col-lg-offset-2">
                    @foreach($user as $u)
                        <div class="panel-body">
                            <p class="text-left">
                                {{$u->first_name}}  {{$u->last_name}} 
                            </p>
                            <p class="text-left">
                                {{$u->email}}  
                            </p>
                            <p class="text-right">
                                {{$u->role}}  
                            </p>
                            @if(Auth::user()->role === "Admin")
                            <span>
                                <a href="{{route('profile.delete','$user->id')}}" class="btn btn-md btn-success">Edit User</a>
                                <a href="{{route('profile.delete', '$user->id')}}" class="btn btn-md btn-danger">Delete User</a>
                            </span>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
