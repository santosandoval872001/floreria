@extends('admin.layouts.app')

@section('contenido')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="">
                <h1 class="h3 mb-1">
                    Configuración
                </h1>
                <p>
                    Personaliza el mensaje principal de tu página.
                </p>
            </div>

        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <form action="{{ route('admin.configuracion.actualizar') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label for="titulo_hero" class="form-labek">
                            Título principal
                        </label>

                        <input type="text" name="titulo_hero" id="titulo_hero" class="form-control"
                            value="{{ old('titulo_hero', $configuracion->titulo_hero) }}" required>

                        @error('titulo_hero')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="descripcion_hero" class="form-label">
                            Descripción
                        </label>

                        <textarea name="descripcion_hero" id="descripcion_hero" class="form-control" rows="4" required>{{ old('descripcion_hero', $configuracion->descripcion_hero) }}
                        </textarea>

                        @error('descripcion_hero')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <img src="{{ asset('iconos/guardar.png') }}" alt=""> Guardar cambios
                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
