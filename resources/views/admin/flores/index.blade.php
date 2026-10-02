@extends('admin.layouts.app')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="">

            <h1 class="h3 mb-1">
                @if (request()->has('disponible'))
                    @if (request('disponible') == 1)
                        Flores disponible
                    @else
                        Flores agotadas
                    @endif
                @else
                    Flores
                @endif
            </h1>

            <p class="text-muted mb-0">
                @if (request()->has('disponible'))
                    Mostrando únicamente las flores
                    {{ request('disponible') == 1 ? 'disponible' : 'agotadas' }}
                @else
                    Administrar los arreglos de tu florería.
                @endif
            </p>

        </div>

        @if (request()->has('disponible'))
            <a href="{{ route('admin.flores') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left"></i> Ver todas
            </a>
        @endif

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

        <table class="table table-bordered table-hover align-middle" style="min-width: 900px;">

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

                            <img src="{{ asset('storage/' . $flor->imagen) }}" alt="{{ $flor->nombre }}" width="80"
                                height="90" width="90" class="imagen-flor-admin" {{--  data-bs-toggle="modal"
                                data-bs-target="modalImagenFlor"   --}}
                                data-imagen="{{ asset('storage/' . $flor->imagen) }}"
                                style="object-fit: cover; border-radius:12px; cursor: pointer;">

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

                            <div class="d-flex flex-column gap-2">

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

                                        <button type="submit" class="btn btn-sm btn-outline-success w-100 text-center">
                                            Marcar disponible
                                        </button>

                                    </form>
                                @endif

                            </div>

                        </td>

                        <td>
                            <div class="d-flex flex-column gap-2">

                                <a href="{{ route('admin.flores.editar', $flor) }}" class="btn btn-primary btn-sm">
                                    <img src="{{ asset('iconos/lapiz-editar.png') }}" alt=""> Editar
                                </a>

                                <form action="{{ route('admin.flores.eliminar', $flor) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar esta flor?');">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm w-100" type="submit">
                                        <img src="{{ asset('iconos/tacho-de-reciclaje.png') }}" alt=""> Eliminar
                                    </button>

                                </form>

                            </div>

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

    {{--  Modal para ver la imagen  --}}
    <div class="modal fade" id="modalImagenFlor" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Vista previa
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                    </button>

                </div>

                <div class="modal-body text-center">

                    <img id="imagenModalFlor" src="" alt="Vista previa" class="img-fluid"
                        style="max-height: 70vh; object-fit: contain;">

                </div>

            </div>

        </div>

    </div>

    <script>
        document.querySelectorAll('.imagen-flor-admin').forEach(function(imagen) {

            imagen.addEventListener('click', function() {
                {{--  
                console.log('Imagen seleccionada', this)

                console.log('Ruta de la imagen'.this.dataset.imagen)  --}}

                const imagenModal = document.getElementById('imagenModalFlor');

                const modal = document.getElementById('modalImagenFlor')

                imagenModal.src = this.dataset.imagen;

                const modalBoostrap = new bootstrap.Modal(modal);

                modalBoostrap.show();

            });

        });
    </script>

@endsection()
