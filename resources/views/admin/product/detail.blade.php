@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body">
                        Product ID: {{ $product->id }}<br>
                        Product Name: {{ $product->productName }}<br>
                        Product Price: {{ number_format($product->productPrice).' VND' }}<br><br>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">List</a>
                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
