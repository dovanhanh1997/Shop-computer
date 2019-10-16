<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ secure_asset('css/home.css') }}">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ secure_asset('js/home.js') }}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shopBill.getBill') }}">{{ __('layout_home.MyBill') }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" action="{{ route('home.search') }}" class="form-inline my-2 my-lg-0">
                            @csrf
                            <input name="keySearch" class="form-control mr-sm-2" type="search"
                                   placeholder="{{ __('layout_home.searchHolder') }}" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0"
                                    type="submit">{{ __('layout_home.search') }}</button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('changeLang') }}" method="post"
                              onchange="document.getElementById('lang-form').submit()">
                            @csrf
                            <select name="lang" id="" class="form-control">
                                <option value="">{{ __('layout_home.language') }}</option>
                                <option value="vi">VI</option>
                                <option value="en">EN</option>
                            </select>

                        </form>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carts.index') }}">
                                <span>{{__('layout_home.cart')}} &nbsp;<span>@if(Session::has('cart'))
                                            {{ Session::get('cart')->totalQty }}@endif</span></span>
                        </a>
                        @if(\Illuminate\Support\Facades\Session::has('noProductInCart'))
                            <small>{{ \Illuminate\Support\Facades\Session::get('noProductInCart') }}</small>
                        @endif
                    </li>
                    @if(! Auth::guard('web')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
{{--                        @dd('Not Login')--}}
                    @else
{{--                        @dd(Auth::user()->name)--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('home')
    </main>
</div>
</body>
</html>
