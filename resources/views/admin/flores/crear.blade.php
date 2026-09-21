<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Agregar flor - Administracion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6">

                <h1 class="mb-4">
                    Agregar flor
                </h1>

                <div class="card shadow-sm">

                    <div class="card-body p-4">

                        <form action="{{ route('admin.flores.guardar') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{--  Nombre  --}}
                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Nombre de la flor
                                </label>

                                <input class="form-control" type="text" name="nombre"
                                    placeholder="Ej.Ramo de rosas">

                            </div>

                            {{--  Descripción  --}}
                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Descripción
                                </label>

                                <textarea name="descripcion" class="form-control" rows="4" placeholder="Describe el arreglo floral"></textarea>

                            </div>

                            {{--  Precio  --}}
                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Precio
                                </label>

                                <input type="number" name="precio" step="0.01" class="form-control"
                                    placeholder="Ej. 500">

                            </div>

                            {{--  Imagen  --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Imagen
                                </label>

                                <input type="file" name="imagen" id="" class="form-control"
                                    accept="image/">

                                {{--  <input type="text" name="imagen" class="form-control" placeholder="Ej. rosas.jpg">  --}}

                                <small class="text-muted">
                                    Por ahora escribe el nombre de una imagen existente.
                                </small>

                            </div>

                            {{--  Check-Disponible  --}}
                            <div class="form-check mb-4">

                                <input type="checkbox" name="disponible" value="1" class="form-check-input"
                                    checked>

                                <label for="" class="form-check-label">
                                    Disponible
                                </label>

                            </div>

                            <div class="d-flex gap-2">

                                <a href="{{ route('admin') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button class="btn btn-success" type="submit">
                                    Guardar flor
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
