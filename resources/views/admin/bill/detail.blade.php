@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #cbd3da">
                    <div class="card-header">
                        Customer Details
                    </div>
                    <div class="card-body">
                        Customer ID: {{ $bill->user->id }}<br>
                        Customer Name: {{ $bill->user->name }}<br>
                        Customer Phone: @if($bill->user->profile)
                            {{ $bill->user->profile->profilePhone }}@else{{ 'Update Profile' }}@endif
                        <br><br>
                    </div>
                </div>
                <br>
                <div class="card" style="background-color: #6cb2eb">
                    <div class="card-header">
                        Products Details
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Image</th>
                            </thead>
                            <tbody>
                            @foreach($bill->products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->productName }}</td>
                                    <td>{{ $product->productPrice }}</td>
                                    <td><img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail"
                                             style="width: 100px" alt=""></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('bills.index') }}" class="btn btn-secondary">List</a>
                <a href="{{ route('bills.edit',$bill->id) }}" class="btn btn-primary">Update</a>


            </div>
        </div>
    </div>
@endsection
