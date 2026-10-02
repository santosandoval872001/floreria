<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Florería') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{--  Navbar publica   --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a href="{{ url('/') }}" class="navbar-brand">
                🌸 Florería
            </a>

            <div class="ms-auto">

                <a href="{{ url('/') }}" class="btn btn-outline-light me-2">
                    🌸 Flores
                </a>

                <a href="{{ route('carrito.index') }}" class="btn btn-light" target="Carrito">
                    <img src="{{ asset('iconos/carrito-de-compras.png') }}" alt="">
                </a>

            </div>

        </div>

    </nav>

    {{--  Mensaje   --}}

    <div class="container mt-3">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    </div>

    {{--  Contenido de la página  --}}
    @yield('content')

</body>

</html>
