<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (request()->is('/'))
        <meta name="description"
            content="Nonton anime sub Indo gratis di Nori! Streaming anime terbaru, klasik, dan populer dengan kualitas HD. Update harian, lengkap, dan akses cepat.">
    @else
        @stack('meta_seo')
    @endif
    @if (request()->is('/'))
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Nori.my",
            "url": "https://nori.my",
            "description": "Situs streaming anime sub Indo gratis dengan judul terbaru, klasik, dan populer dalam kualitas HD.",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://nori.my/anime?search={search_term}",
                "query-input": "required name=search_term"
            }
        }
        </script>
    @else
        @stack('schema')
    @endif
    <title>Nonton Anime Sub Indo Gratis | Streaming Terlengkap - Nori.my</title>
    @turnstileScripts()
    @vite(['resources/css/app.css', 'resources/css/nori.css', 'resources/js/app.js'])
    @stack('css')
    <meta name="google-site-verification" content="3YJEL3qM5RMzMrxfjcKLNsyOPdDDLwuJkpc1V2RKOuE" />
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
