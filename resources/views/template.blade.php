<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
         <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>


        <!-- Fonts -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
       
      
    </head>
    <body>
       @include('_includes/nav/topnav')
        
          
       @yield('content')
       @yield('scripts')

        </body>
</html>