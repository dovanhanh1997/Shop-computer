<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="stylesheet" href="{{ asset('css/home.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a href="{{ route('home') }}" class="navbar-brand"><h3>Shop Computer</h3></a>
        <a href="" style="color: #202326;">
            <div style="background-color: #3CBC8D" class="navbar nav ">
                <img style="background-color: #3CBC8D"
                     src="{{ asset('storage/uploads/cart.png') }}"
                     width="25px"><span style="font-size: 20px;">&nbsp Cart &nbsp</span>
                <span id="cart">0</span>
            </div>
        </a>

    </nav>
    <!--Section: Products v.3-->
    @yield("content")
</div>
</body>
</html>
<style>
    #cart {
        background-color: #fde300;
        height: 20px;
        border-radius: 2px;
        width: 25px;
        font-weight: 700;
        font-size: 14px;
        text-align: center
    }
</style>
