@extends("layouts.check-out")
@section("home")
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span
                        class="badge badge-secondary badge-pill">{{ \Illuminate\Support\Facades\Session::get('cart')->totalQty }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($products as $product)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $product['product']->productName }}</h6>
                                <small class="text-muted">Quantity &nbsp {{$product['qty']}} </small>
                            </div>
                            <div class="">
                                <span class="text-muted">{{ number_format($product['product']->productPrice) }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Shipping address</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="distric">Distric</label>
                            <select class="custom-select d-block w-100" id="distric" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city">City</label>
                            <select class="custom-select d-block w-100" id="city" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                                   onclick="showForm()" required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                   onclick="showForm()" required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                   onclick="location.reload()" required="">
                            <label class="custom-control-label" for="paypal">Postpay</label>
                        </div>
                    </div>

                    <span id="showForm"></span>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
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
    function showForm() {
        document.getElementById('showForm').innerHTML = '<div class="ex1">\n' +
            '    <div class="row">\n' +
            '        <div class="col-md-6 mb-3">\n' +
            '            <label for="cc-name">Name on card</label>\n' +
            '            <input type="text" class="form-control" id="cc-name" placeholder="" required="">\n' +
            '            <small class="text-muted">Full name as displayed on card</small>\n' +
            '            <div class="invalid-feedback">\n' +
            '                Name on card is required\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="col-md-6 mb-3">\n' +
            '            <label for="cc-number">Credit card number</label>\n' +
            '            <input type="text" class="form-control" id="cc-number" placeholder="" required="">\n' +
            '            <div class="invalid-feedback">\n' +
            '                Credit card number is required\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '    <div class="row">\n' +
            '        <div class="col-md-3 mb-3">\n' +
            '            <label for="cc-expiration">Expiration</label>\n' +
            '            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">\n' +
            '            <div class="invalid-feedback">\n' +
            '                Expiration date required\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="col-md-3 mb-3">\n' +
            '            <label for="cc-expiration">CVV</label>\n' +
            '            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">\n' +
            '            <div class="invalid-feedback">\n' +
            '                Security code required\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>';

        return loacation.reload();
    }




</script>
