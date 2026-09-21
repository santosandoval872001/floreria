@extends('admin.layouts.app')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="">

            <h1 class="h3 mb-1">
                Galería
            </h1>

            <p class="text-muted mb-0">
                Administra las fotografías de tu florería.
            </p>

        </div>

    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        {{--  Formuario para subir imagen  --}}
        <div class="col-12 col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        Agregar fotografia
                    </h5>

                    <p class="text-muted">
                        Selecciona una imagen para agregarla a la gelería.
                    </p>

                    <form action="{{ route('admin.galeria.guardar') }}" method="POSt" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">

                            <label for="" class="form-label">
                                Fotografía
                            </label>

                            <input type="file" name="imagen" id="imagenGaleria" class="form-control" accept="image/*"
                                required>

                            <div class="mt-3 text-center">
                                <img id="vistaPrevia" src="" alt="Vista previa" class="img-fluid rounded"
                                    style="display: none; max-height: 250px; object-fit: cover;">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <img src="{{ asset('iconos/camara.png') }}" alt=""> Agregar fotografia
                        </button>

                    </form>

                </div>

            </div>

        </div>

        {{--  Galeria  --}}
        <div class="col-12 col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title mb-4">
                        Fotografías
                    </h5>

                    <div class="row g-3">

                        @forelse ($imagenes as $imagen)
                            <div class="col-6 col-md-4">

                                <div class="card border-0 shadow-sm">

                                    <img src="{{ asset('storage/' . $imagen->imagen) }}" alt="Fotografía de la galería"
                                        class="card-img-top" style="height: 180px; object-fit: cover">

                                    <div class="card-body text-center">

                                        <p class="text-muted text-center">
                                            Posicíon: {{ $imagen->orden + 1 }}
                                        </p>

                                    </div>

                                    <div class="d-flex justify-content-center gap-2">

                                        @if ($imagen->orden > 0)
                                            <form action="{{ route('admin.galeria.subir', $imagen->id) }}" method="POST">

                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn btn-outline-primary"
                                                    title="Mover hacia arriba">
                                                    ↑
                                                </button>

                                            </form>
                                        @endif

                                        @if ($imagen->orden < $imagenes->count() - 1)
                                            <form action="{{ route('admin.galeria.bajar', $imagen->id) }}" method="POST">

                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn btn-outline-primary"
                                                    title="Mover hacia abajo">
                                                    ↓
                                                </button>

                                            </form>
                                        @endif


                                        <form action="{{ route('admin.galeria.eliminar', $imagen->id) }}" method="POST"
                                            onsubmit="return confirm('¿Eliminar esta fotografía?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                                <img src="{{ asset('iconos/tacho-de-reciclaje.png') }}"
                                                    alt="">Eliminar
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>
                        @empty

                            <div class="col-12">

                                <div class="alert alert-secondary">
                                    Todavía no hay fotografías en la galería.
                                </div>

                            </div>
                        @endforelse


                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
