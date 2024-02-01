<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS и другие стили -->
    @stack('styles')
</head>
<body>
<div id="app">
    @yield('content')
</div>
<!-- JavaScript и другие скрипты -->
@stack('scripts')
</body>
</html>
