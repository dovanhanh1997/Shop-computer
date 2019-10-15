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
    <a href="{{ route('carts.index') }}" style="color: #202326;">
    </a>

</nav>
<div>
    <!--Section: Products v.3-->
    @yield("home")
</div>
</body>
</html>

