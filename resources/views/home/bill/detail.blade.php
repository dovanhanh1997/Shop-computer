@extends("layouts.home")
@section("home")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-md-6">
                                <img src="http://via.placeholder.com/400x90?text=logo">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">{{__('detail_bill.billID')}}: {{ $bill->id }}</p>
                                <p class="text-muted">{{__('detail_bill.payDate')}}: {{ $bill->payDate }}</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">{{__('detail_bill.clientInformation')}}</p>
                                <p class="mb-1">{{__('detail_bill.name')}}: {{ $bill->user->name }}</p>
                                <p>{{__('detail_bill.phone')}}: @if($bill->user->profile)
                                        {{ $bill->user->profile->profilePhone }}@else{{ 'Update Profile' }}@endif</p>
                                <p class="mb-1">{{__('detail_bill.address')}}: Coming Soon</p>
                                <p class="mb-1">6781 45P</p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">{{__('detail_bill.paymentDetail')}}</p>
                                <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                                <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                                <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">{{__('detail_bill.productId')}}</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">{{__('detail_bill.item')}}</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">{{__('detail_bill.description')}}</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">{{__('detail_bill.quantity')}}</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">{{__('detail_bill.unitCost')}}</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">{{__('detail_bill.total')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bill->products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->productName }}</td>
                                            <td>Coming Soon</td>
                                            @foreach($billProducts as $billProduct)
                                                @if($billProduct->product_id == $product->id)
                                                    <td>{{ $billProduct->quantity }}</td>
                                                    <td>{{ number_format($product->productPrice ).' VND'}}</td>
                                                    <td>{{ number_format($product->productPrice*$billProduct->quantity ).' VND'}}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">{{__('detail_bill.grandTotal')}}</div>
                                <div class="h2 font-weight-light">{{ number_format(($bill->billPrice)-($bill->billPrice * 10 / 100)).' VND' }}</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">{{__('detail_bill.discount')}}</div>
                                <div class="h2 font-weight-light">10%</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">{{__('detail_bill.subTotal')}}</div>
                                <div class="h2 font-weight-light">{{ number_format($bill->billPrice).' VND' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank"
                                                                    href="http://totoprayogo.com">totoprayogo.com</a>
        </div>

    </div>

@endsection
