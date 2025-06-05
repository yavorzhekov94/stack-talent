<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <x-page-sections.spinner />
        <x-page-sections.navbar />
        {{ $slot }}
        <x-page-sections.footer />
        <x-page-sections.back-to-top />
    </div>
</body>
</html>
