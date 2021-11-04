<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', \Illuminate\Support\Facades\App::getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config()->get('app.name') | \Illuminate\Support\Facades\Route::currentRouteName()}}</title>

    <link href="{{mix('/css/app.css')}}" rel="stylesheet" type="text/css">
    <script href="{{mix('/js/app.js')}}" rel="script" defer></script>
</head>
<body>
 @yield('content)
</body>
</html>
