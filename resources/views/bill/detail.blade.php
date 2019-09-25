@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #cbd3da">
                    <div class="card-header">
                        Customer Details
                    </div>
                    <div class="card-body">
                        Customer ID: {{ $bill->customer->id }}<br>
                        Customer Name: {{ $bill->customer->customerName }}<br>
                        Customer Phone: {{ $bill->customer->customerPhone }}<br><br>
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
                            </thead>
                            <tbody>
                            @foreach($bill->products as $key => $product)
                               <tr>
                                   <td>{{ ++$key }}</td>
                                   <td>{{ $product->id }}</td>
                                   <td>{{ $product->productName }}</td>
                                   <td>{{ $product->productPrice }}</td>
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
