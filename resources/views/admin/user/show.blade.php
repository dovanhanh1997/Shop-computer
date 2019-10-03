@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Information User
                    </div>
                    <div class="card-body">
                        User Name: {{ $user->name }}<br>
                        User Email: {{ $user->email }}<br>
                        User password: {{ $user->password }}<br><br>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">List</a>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
