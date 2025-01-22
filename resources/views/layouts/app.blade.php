<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/css/nori.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.partials.nav')

    <main class="container py-4">
        @yield('content')
    </main>

    @vite('resources/js/nori.js')
    @stack('js')
</body>

</html>
