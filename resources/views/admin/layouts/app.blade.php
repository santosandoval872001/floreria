<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Panel de administración</title>
</head>

<body>

    <div class="fondo-menu" id="fondoMenu" onclick="cerrarMenu()"></div>

    <div class="d-flex">

        {{--  Sidebar  --}}
        <aside class="sidebar bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">

            <h4 class="text-center mb-4">
                🌷 Florería
            </h4>

            <hr>

            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">

                    <a href="{{ route('admin') }}" class="nav-link text-white">
                        <img src="{{ asset('iconos/home.png') }}" alt="dashboard"> Dashboard
                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.flores') }}" class="nav-link text-white">
                        <img src="{{ asset('iconos/flores.png') }}" alt="flores"> Flores
                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.galeria') }}" class="nav-link text-white">
                        <img src="{{ asset('iconos/galeria.png') }}" alt="Galería"> Galería
                    </a>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link text-white">
                        <img src="{{ asset('iconos/pedidos.png') }}" alt="Pedidos"> Pedidos
                    </a>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link text-white">
                        <img src="{{ asset('iconos/confi.png') }}" alt="Confi"> Configuración
                    </a>

                </li>

            </ul>

            <hr>

            <a href="{{ url('/') }}" class="btn btn-outline-light w-100">
                Ver página
            </a>

        </aside>

        {{--  Contenido  --}}
        <main class="contenido-admin flex-grow-1 bg-light">

            <nav class="navbar bg-white shadow-sm mb-4">

                <div class="container-fluid">

                    <button class="btn btn-dark btn-menu" onclick="abrirMenu()">
                        ☰
                    </button>

                    <span class="navbar-brand mb-0 h1">
                        Panel de administración
                    </span>

                </div>

            </nav>

            <div class="container-fluid p-4">

                @yield('contenido')

            </div>

        </main>

    </div>

</body>

<script src="{{ asset('js/app.js') }}"></script>

</html>
