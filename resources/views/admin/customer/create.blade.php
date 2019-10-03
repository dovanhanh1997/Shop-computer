@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #cbd3da">
                    <div class="card-header">
                        Register Customer
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="customerName" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Phone
                                </label>
                                <div class="col-md-6">
                                    <input type="number" name="customerPhone" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">
                                        Register
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
