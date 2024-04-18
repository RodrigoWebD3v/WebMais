<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/primary.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('app.layouts.top')
    @yield('conteudo')
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
