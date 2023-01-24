<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_package/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_package/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_package/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicon_package/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('favicon_package/safari-pinned-tab.svg') }}" color="#9ed774">
        <meta name="msapplication-TileColor" content="#ffc40d">
        <meta name="theme-color" content="#dcd94b">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ config('app.url') . mix('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ config('app.url') . mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
