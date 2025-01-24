<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="3YJEL3qM5RMzMrxfjcKLNsyOPdDDLwuJkpc1V2RKOuE" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Nonton anime sub Indo dan streaming anime dengan subtitle Indonesia di Nori. Temukan anime favorit Anda dengan mudah dan nikmati pengalaman menonton terbaik secara gratis.">
    <meta name="keywords"
        content="nonton anime sub Indo, streaming anime, anime subtitle Indonesia, anime terbaru, anime populer, Nori, gratis">
    <title>Nori</title>
    @turnstileScripts()
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

    @vite('resources/js/histats.js')
</body>

</html>
