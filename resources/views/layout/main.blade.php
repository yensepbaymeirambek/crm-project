<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:600&display=swap')}}" rel="stylesheet">
        <script src="{{asset('https://kit.fontawesome.com/a81368914c.js')}}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @include('shared.nav')
        @include('shared.header')
        @yield('content')
    </body>
</html>
