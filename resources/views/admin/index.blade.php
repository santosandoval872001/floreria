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

            <div class="row g-4 mb-4">

                {{--  Total  --}}
                <col-12 class="col-md-4">

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

                </col-12>

                {{--  Disponibles  --}}
                <col-12 class="col-md-4">

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

                </col-12>

                {{--  Agotadas  --}}
                <col-12 class="col-md-4">

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

                </col-12>

            </div>

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
