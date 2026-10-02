<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Administracion - florería</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @extends('admin.layouts.app')

    @section('contenido')
        <div class="container py-5">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="mb-4">
                Panel de administración
            </h1>

            {{--  Estadisticas  --}}
            <div class="row g-4 mb-4">

                {{--  Total  --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <a href="{{ route('admin.flores') }}" class="text-decoration-none text-dark">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <p class="text-muted mb-1">
                                    Total de flores
                                </p>

                                <h2 class="fw-bold mb-0 text-center">
                                    {{ $totalFlores }}
                                </h2>

                                <small class="text-muted">
                                    Flores registradas
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

                {{--  Disponibles  --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <a href="{{ route('admin.flores', ['disponible' => 1]) }}" class="text-decoration-none text-dark">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <p class="text-muted mb-1">
                                    Disponibles
                                </p>

                                <h2 class="fw-bold mb-0 text-center text-success">
                                    {{ $floresDisponibles }}
                                </h2>

                                <small class="text-muted">
                                    Flores disponibles para venta
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

                {{--  Agotadas  --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <a href="{{ route('admin.flores', ['disponible' => 0]) }}" class="text-decoration-none text-dark">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <p class="text-muted mb-1">
                                    Agotadas
                                </p>

                                <h2 class="fw-bold mb-0 text-center text-danger">
                                    {{ $floresAgotadas }}
                                </h2>

                                <small class="text-muted">
                                    Flores actualmente agotadas
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

                {{--  Gelería  --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <a href="{{ route('admin.galeria') }}" class="text-decoration-none text-dark">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <p class="text-muted mb-1">
                                    Galería
                                </p>

                                <h2 class="fw-bold mb-0 text-center">
                                    {{ $totalGaleria }}
                                </h2>

                                <small class="text-muted">
                                    Imágenes en galería
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

            </div>

            {{--  Acciones  --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2>Florería</h2>

                <a href="{{ route('admin.flores.crear') }}" class="btn btn-success">
                    + Agregar flor
                </a>

            </div>

        </div>
    @endsection

</body>

</html>
