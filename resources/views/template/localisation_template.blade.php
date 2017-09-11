<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>SacOff</title>

        <link rel="stylesheet" href="{{url('css/app.css')}}">
    </head>
    <body>
            @include('pages.utilisateur.partials.nav_localisation')
            
            @yield('content')
       

    <script src="{{url('js/app.js')}}"></script>

    @stack('script', '')
    </body>
</html>