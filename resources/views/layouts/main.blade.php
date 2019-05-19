<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('partials.icons')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', "1865 Residenza d'epoca") }}</title>

    @include('partials.css')
    
</head>

<body>
    <div id="app">

        @includeWhen( $viewMenu, 'partials.navbar')

        @includeWhen( $viewCard, 'partials.mainCard')
        
    </div>

    <!-- Scripts -->
    @include('partials.javascript')

</body>

</html>
