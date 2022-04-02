<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSRF対策 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atte</title>
    {{-- CSS --}}
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    {{-- Pagination. Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- font --}}
    <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
    {{-- JavaScript --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="container">
    @component('components.header')
    @endcomponent
    <main class="main">
        @yield('main')
    </main>
    @component('components.footer')
    @endcomponent
</body>

</html>