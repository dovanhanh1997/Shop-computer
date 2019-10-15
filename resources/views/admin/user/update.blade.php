@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #cbd3da">
                    <div class="card-header">
                        Update User
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update' ,$id) }}" method="post">
                            @method("put")
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control">
                                    @if($errors->has('name'))
                                        <span class="text-md-left text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Email
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control">
                                    @if($errors->has('email'))
                                        <span class="text-md-left text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Password
                                </label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control">
                                    @if($errors->has('password'))
                                        <span class="text-md-left text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-success" type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
