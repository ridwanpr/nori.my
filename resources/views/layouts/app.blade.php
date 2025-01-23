<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nori</title>
    @vite(['resources/css/app.css', 'resources/css/nori.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body>
    @include('layouts.partials.nav')

    <main class="container py-4">
        @yield('content')
    </main>

    @vite('resources/js/nori.js')

    @if ($errors->any())
        <script>
            window.LaravelErrors = @json($errors->all());
        </script>
    @endif

    @if (session('success'))
        <script>
            window.LaravelSuccessMessage = @json(session('success'));
        </script>
    @endif

    @stack('js')
</body>

</html>
