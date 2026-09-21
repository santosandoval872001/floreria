@extends('admin.layouts.app')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="">

            <h1 class="h3 mb-1">
                Flores
            </h1>

            <p class="text-muted mb-0">
                Administrar los arreglos de tu florería.
            </p>

        </div>

        <a href="{{ route('admin.flores.crear') }}" class="btn btn-success">
            + Agregar flor
        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($flores as $flor)
                    <tr>

                        <td>

                            <img src="{{ str_starts_with($flor->imagen, 'flores/') ? asset('storage/' . $flor->imagen) : asset('storage/' . $flor->imagen) }}"
                                alt="{{ $flor->nombre }}" width="80" height="80"
                                style="object-fit: cover; border-radius:10px;">

                        </td>

                        <td>
                            {{ $flor->nombre }}
                        </td>

                        <td>
                            {{ $flor->descripcion }}
                        </td>

                        <td>
                            ${{ number_format($flor->precio, 2) }}
                        </td>

                        <td>

                            @if ($flor->disponible)
                                <span class="badge bg-success">
                                    ✓ Disponible
                                </span>

                                <form action="{{ route('admin.flores.disponibilidad', $flor) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Marcar agotado
                                    </button>

                                </form>
                            @else
                                <span class="badge bg-danger">
                                    ✕ Agotado
                                </span>

                                <form action="{{ route('admin.flores.disponibilidad', $flor) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        Marcar disponible
                                    </button>

                                </form>
                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.flores.editar', $flor) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('admin.flores.eliminar', $flor) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta flor?');">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">
                                    Eliminar
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h5 class="card-title mb-4">
                Catálogo flores
            </h5>

            <p>
                Atualmente tienes
                <strong>{{ $flores->count() }}</strong>
                flores registradas.
            </p>

        </div>

    </div>
@endsection()
