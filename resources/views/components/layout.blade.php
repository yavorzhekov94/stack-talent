<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/owl.theme.green.min.css') }}">
    @vite(['resources/scss/app.scss'])
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <x-page-sections.spinner />
        <x-page-sections.navbar />
        {{ $slot }}
        <x-page-sections.footer />
        <x-page-sections.back-to-top />
    </div>
    <script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/js/easing.min.js') }}"></script>
    <script src="{{ asset('vendor/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/js/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
</body>
</html>
