<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('APP_NAME', 'Vue Clock' )}}</title>

        <!-- Styles -->
        <style>
          
  
        </style>
    </head>
    <body>
        <div id="app">
            <vue-clock-v2></vue-clock-v2>
            <vue-clock-v1></vue-clock-v1>
            <vue-clock></vue-clock>
        </div>
    </body>
     <script src="{{ mix('js/app.js') }}"></script>  
</html>
