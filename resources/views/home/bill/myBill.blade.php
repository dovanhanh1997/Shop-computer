@extends("layouts.home")
@section("home")
    <div class="container">
        <h1>{{__('my_bills.myBills')}}</h1>

        <div class="row justify-content-center">
            <table class="table">
                <thead class="table-success ">
                <th scope="col">{{__('my_bills.billCode')}}</th>
                <th scope="col">{{__('my_bills.payDate')}}</th>
                <th scope="col">{{__('my_bills.product')}}</th>
                <th scope="col">{{__('my_bills.totalPrice')}}</th>
                <th scope="col">{{__('my_bills.Status')}}</th>
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
