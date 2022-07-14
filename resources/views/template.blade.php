<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- Fonts -->
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"> --> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
      
    </head>
    <body>
       @include('_includes/nav/topnav')
        
          
       @yield('content')

        </body>
</html>