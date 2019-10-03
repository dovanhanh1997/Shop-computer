@extends("layouts.home")

@section("home")
    <div class="container" style="background-color: #b9bbbe">
        <div class="row justify-content-center">
            <div class="col-md-8" style="">
                @if(\Illuminate\Support\Facades\Session::has('cart'))

                    @foreach($products as $product)
                        <div class="col" style="border: 1px solid #494f54">
                            <div class="row">
                                <div class="col" style="padding: 20px">
                                    <img src="{{ asset('storage/'.$product['product']->image) }}" alt="" width="100px">
                                </div>
                                <div class="col">
                                    <p>{{ $product['product']->productName }}</p>
                                    <p>Provided <a href="{{ route('home') }}">Shop Computer</a></p>
                                    <p><a href="{{ route('deleteCart',$product['product']->id) }}">Delete</a></p>
                                </div>

                                <div class="col" style="">
                                    <strong>
                                        <h3><p>{{ number_format($product['product']->productPrice).' VND' }}</p></h3>
                                    </strong>
                                    <form action="{{ route('changeCart',$product['product']->id) }}" method="post">
                                        @csrf
                                        <button type="submit" onclick="return decreaseQty({{$product['product']->id}})">-</button>
                                        <span
                                            class="input-group mb-3"
                                            style="display: none;"></span>
                                        <input id="{{$product['product']->id.'qty'}}" type="tel" name="qty" value="{{ $product['qty'] }}"
                                               min="1" max="100" >
                                        <button type="submit" onclick="return increaseQty({{$product['product']->id}})">+</button>
                                    </form>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-7 text-md-left" style="padding: 10px;">
                        Calculate Provisional
                    </div>
                    <div class="col text-md-right" style="padding: 10px">@if(\Illuminate\Support\Facades\Session::has('cart'))
                    <p><strong>{{ number_format($cart->totalPrice).' VND' }}</strong></p>@endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 text-md-left" style="padding: 10px;">
                        Total Qty
                    </div>
                    <div class="col text-md-right" style="padding: 10px">@if(\Illuminate\Support\Facades\Session::has('cart'))
                    <p><strong>{{ $cart->totalQty }}</strong></p>@endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 text-md-left" style="padding: 10px;">
                        Total Price
                    </div>
                    <div class="col text-md-right" style="padding: 10px">@if(\Illuminate\Support\Facades\Session::has('cart'))
                            <p><strong>{{ number_format($cart->totalPrice).' VND' }}</strong></p>@endif</div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-md-2">
                        <a href="{{ route('home.check-out') }}" class="btn btn-danger" style="width: 300px">Check Out</a>                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
