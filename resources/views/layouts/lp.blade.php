<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-majalengka.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <meta name="googlebot" content="index, follow" />
        <meta name="googlebot-news" content="index, follow" />

        @yield('meta')
    </head>
    <body class="top: 0px; position: fixed; width: 100%; height: 100%; overflow-y: scroll; overscroll-behavior: contain;">
        @include('components.layout.navbar')

        @include('components.layout.side-panel')

        @yield('content')

        @include('components.layout.footer')

    </body>
    @stack('scripts')

</html>
