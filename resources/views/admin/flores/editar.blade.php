<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Editar flor - Administracion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6">

                <h1 class="mb-4">
                    Editar flor
                </h1>

                <div class="card shadow-sm">

                    <div class="card-body p-4">

                        <form action="{{ route('admin.flores.actualizar', $flor) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{--  Nombre  --}}
                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Nombre de la flor
                                </label>

                                <input class="form-control" type="text" name="nombre" value="{{ $flor->nombre }}">

                            </div>

                            {{--  Descripción  --}}
                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Descripción
                                </label>

                                <textarea name="descripcion" class="form-control" rows="4">
                                  {{ $flor->descripcion }}
                                </textarea>

                            </div>

                            {{--  Precio  --}}
                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Precio
                                </label>

                                <input type="number" name="precio" step="0.01" class="form-control"
                                    value="{{ $flor->precio }}">

                            </div>

                            {{--  Imagen  --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Imagen actual
                                </label>

                                <div class="mb-3 text-center">

                                    <img src="{{ asset('storage/' . $flor->imagen) }}" alt="{{ $flor->nombre }}"
                                        width="150" height="150" style="object-fit: cover; border-radius: 15px;">

                                </div>

                                <label for="" class="form-label">
                                    Cambiar imagen
                                </label>

                                <input type="file" class="form-control" name="imagen" accept="image/*">

                                <small class="text-muted">
                                    Si no seleccionas una imagen, se conservará la actual.
                                </small>

                            </div>

                            {{--  Check-Disponible  --}}
                            <div class="form-check mb-4">

                                <input type="checkbox" name="disponible" value="1" class="form-check-input"
                                    {{ $flor->disponible ? 'checked' : '' }}>

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
