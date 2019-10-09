<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailProduct.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Shop Laptop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shopBill.getBill')}}">{{ __('layout_home.MyBill') }}</a>
            </li>
            <form id="lang-form" action="{{ route('changeLang') }}" method="post"
                  onchange="document.getElementById('lang-form').submit()">
                @csrf

                <select name="lang" id="" >
                    <option value="">{{ __('layout_home.language') }}</option>
                    <option value="vi">VI</option>
                    <option value="en">EN</option>
                </select>

            </form>

        </ul>
        <form method="post" action="{{ route('home.search') }}" class="form-inline my-2 my-lg-0">
            @csrf
            <input name="keySearch" class="form-control mr-sm-2" type="search" placeholder="{{ __('layout_home.searchHolder') }}" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('layout_home.search') }}</button>
        </form>
        <div class="collapse navbar-collapse">
            <a href="{{ route('carts.index') }}">
                <ul class="navbar-nav mr-auto">{{__('layout_home.cart')}} &nbsp;<span>@if(\Illuminate\Support\Facades\Session::has('cart'))
                            {{ \Illuminate\Support\Facades\Session::get('cart')->totalQty }}@endif</span></ul>
            </a>
        </div>

    </div>


</nav>

<div>
    <!--Section: Products v.3-->
    @yield("home")
</div>
</body>
</html>

