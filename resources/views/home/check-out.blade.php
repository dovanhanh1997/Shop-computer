@extends("layouts.check-out")
@section("home")
    <div class="container">
        <div class="py-5 text-center">
            <h2>{{__('check_out.checkOut')}}</h2>
        </div>
        <form method="post" action="{{ route('shopBill.storeBill') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">{{__('check_out.yourCart')}}</span>
                        <span
                            class="badge badge-secondary badge-pill">{{ \Illuminate\Support\Facades\Session::get('cart')->totalQty }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach($products as $product)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $product['product']->productName }}</h6>
                                    <small class="text-muted">{{__('check_out.quantity')}} &nbsp {{$product['qty']}} </small>
                                </div>
                                <div class="">
                                    <span
                                        class="text-muted">{{ number_format($product['product']->productPrice) }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{__('check_out.promoCode')}}" name="promo" id="promo">
                        <div class="input-group-append">
                            <input class="btn btn-danger" type="button" onclick="checkPromo()" value="{{__('check_out.promo')}}">
                        </div>
                    </div>
                    <div class=""><span id="promoMessage"></span>
                    </div>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">{{__('check_out.shippingAddress')}}</h4>

                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <div class="row">
                    </div>
                    <div class="mb-3">
                        <label for="address">{{__('check_out.address')}}</label>
                        <input name="billAddress" type="text" class="form-control" id="address"
                               placeholder="1234 Main St">

                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="distric">{{__('check_out.district')}}</label>
                            <select name="billDistric" class="custom-select d-block w-100" id="distric">
                                <option value="">{{__('check_out.choose')}}...</option>
                                <option value="United States">United States</option>
                            </select>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city">City</label>
                            <select name="billCity" class="custom-select d-block w-100" id="city">
                                <option value="">{{__('check_out.choose')}}</option>
                                <option name="california">California</option>
                            </select>

                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">{{__('check_out.popup')}}</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">{{__('check_out.payment')}}</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input value="0" id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                   checked=""
                                   onclick="location.reload()" required="">
                            <label class="custom-control-label" for="credit">{{__('check_out.creditCard')}}</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input value="1" id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                   onclick="location.reload()" required="">
                            <label class="custom-control-label" for="debit">{{__('check_out.debitCard')}}</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input value="2" id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                   onclick="hideForm()" required="">
                            <label class="custom-control-label" for="paypal">{{__('check_out.postpay')}}</label>
                        </div>
                    </div>

                    <span id="hideForm">
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">{{__('check_out.nameOnCard')}}</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">{{__('check_out.popup2')}}</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">{{__('check_out.numberCard')}}</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">{{__('check_out.expiration')}}</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>

                    </span>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">{{__('check_out.continueCheckOut')}}</button>
                </div>
            </div>
        </form>
    </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>
@endsection


<script>
    function hideForm() {
        document.getElementById('hideForm').innerHTML = '';
        return loacation.reload();
    }

    function checkPromo() {
        let promoArray = ['Hello', 'Hi',];
        let promo = document.getElementById('promo').value;
        for (let i = 0; i < promoArray.length; i++) {
            if (promo === promoArray[i]) {
                return document.getElementById('promoMessage').innerHTML = 'Valid Code'
            }
        }
        return document.getElementById('promoMessage').innerHTML = 'Invalid Code';
    }
</script>


