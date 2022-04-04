<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSRF対策 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atte</title>
    {{-- font --}}
    <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
    {{-- CSS --}}
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    {{-- JavaScript --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</head>

<body class="body_css">
    @component('components.header')
    @endcomponent
    <main class="main">
        @yield('main')
    </main>
    @component('components.footer')
    @endcomponent
</body>

</html>