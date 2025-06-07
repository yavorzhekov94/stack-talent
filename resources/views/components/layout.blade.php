<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stack Talents</title>
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
