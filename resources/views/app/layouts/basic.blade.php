<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/primary.css') }}">

    <link rel="stylesheet" href="">
</head>
<body>
    @include('app.layouts.top')
    @yield('conteudo')
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
