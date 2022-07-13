<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
       <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    </head>
    <body>
       @include('_includes/nav/topnav')
        
          
       @yield('content')

        </body>
</html>