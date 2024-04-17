<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/primary.css') }}">
</head>
<body>
    @include('app.layouts.top')
    @yield('conteudo')
</body>
</html>
