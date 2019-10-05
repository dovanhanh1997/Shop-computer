@extends("layouts.home")
@section("home")
    <div class="container">
        <h1>My list Bill</h1>

        <div class="row justify-content-center">
            <table class="table">
                <thead class="table-success ">
                <th scope="col">Bill Code</th>
                <th scope="col">Pay Date</th>
                <th scope="col">Product</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr>
                        <td><a href="{{ route('shopBill.billDetail',$bill->id) }}">{{ $bill->id }}</a></td>
                        <td>{{ $bill->payDate }}</td>
                        <td>
                            @foreach($bill->products as $product)
                                <small>{{ $product->productName }}</small><br>
                                @endforeach
                        </td>
                        <td>{{ number_format($bill->billPrice).' VND' }}</td>
                        <td>{{ 'Success' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
