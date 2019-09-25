@extends("layouts.app")
@section("content")
    <div class="container">
        <h3>List Product</h3> <br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product-ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ 'PD-'.$product->id }}</td>
                    <td>{{ $product->productName }}</td>
                    <td>{{ number_format($product->productPrice) }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="pr-2">
                                <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary">Info</a>
                            </div>
                            <div class="pr-2">
                                <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
