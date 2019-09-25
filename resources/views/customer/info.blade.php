@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Information Customer
                    </div>
                    <div class="card-body">
                        User Name: {{ $customer->customerName }}<br>
                        User Email: {{ $customer->customerPhone }}<br><br>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">List</a>
                        <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
