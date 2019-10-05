<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a href="{{ route('home') }}" class="navbar-brand"><h3>Shop Computer</h3></a>
    <a href="{{ route('shopBill.getBill') }}" class="navbar-brand"><h3>My Bill</h3></a>
    <a href="{{ route('carts.index') }}" style="color: #202326;">
        <div class="d-flex">
            <div class="pr-3">
                    <span>@if(\Illuminate\Support\Facades\Session::has('cart'))
                            {{ \Illuminate\Support\Facades\Session::get('success') }}
                        @endif
            </span></div>
            <div style="background-color: #3CBC8D" class="navbar nav pr-3">
                <img style="background-color: #3CBC8D"
                     src="{{ asset('storage/uploads/cart.png') }}"
                     width="25px"><span style="font-size: 20px;">&nbsp Cart &nbsp</span>
                <span id="cart">@if(\Illuminate\Support\Facades\Session::has('cart'))
                        {{ \Illuminate\Support\Facades\Session::get('cart')->totalQty }}@else {{ 0 }}@endif</span>
            </div>
        </div>
    </a>


</nav>
<div>
    <!--Section: Products v.3-->
    @yield("home")
</div>
</body>
</html>

