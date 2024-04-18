<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/primary.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
    <section class="container">
        <a href="{{route('products.list')}}" class="logo">WebMais</a>
    </section>
    </nav>
    @yield('content')
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
