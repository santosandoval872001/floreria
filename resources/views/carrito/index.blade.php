@extends('layouts.public')

@section('content')
    @if ($errors->any())
        <div class="container mt-3">
            <div class="alert alert-danger">
                <strong>Hay errores:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="container carrito-container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <h1 class="titulo-carrito">
                    Tu pedido
                </h1>

                <img src="{{ asset('iconos/carrito-de-compras 128px.png') }}" alt="" class="img-fluid"> <br>

                @if (empty($carrito))
                    <div class="alert alert-info">
                        Tu carrito esta vacío.
                    </div>

                    <a href="{{ url('/') }}" class="btn btn-primary">
                        Ver flores
                    </a>
                @else
                    @foreach ($carrito as $id => $item)
                        <div class="card card-carrito shadow-sm mb-3">

                            <div class="card-body">

                                <div class="row align-items-center">

                                    <div class="col-md-2">

                                        <img src="{{ str_starts_with($item['imagen'], 'flores/') ? asset('storage/' . $item['imagen']) : asset('img/' . $item['imagen']) }}"
                                            alt="{{ $item['nombre'] }}" class="img-carrito">

                                    </div>

                                    <div class="col-md-5">

                                        <h5 class="mb-1">
                                            {{ $item['nombre'] }}
                                        </h5>

                                        <p class="text-muted mb-0">
                                            ${{ number_format($item['precio'], 2) }} c/u
                                        </p>

                                    </div>

                                    <div class="col-md-2 text-center">

                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                            <form action="{{ route('carrito.disminuir', $id) }}" method="POST">
                                                @csrf

                                                <button type="submit" class="btn btn-outline-secondary btn-cantidad">
                                                    -
                                                </button>
                                            </form>

                                            <span class="cantidad">
                                                {{ $item['cantidad'] }}
                                            </span>

                                            <form action="{{ route('carrito.aumentar', $id) }}" method="POST">
                                                @csrf

                                                <button type="submit" class="btn btn-outline-secondary btn-cantidad">
                                                    +
                                                </button>
                                            </form>

                                        </div>

                                    </div>

                                    <div class="col-md-3 text-md-end">

                                        <strong>
                                            ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                                        </strong>

                                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                            @csrf

                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <img src="{{ asset('iconos/tacho-de-reciclaje.png') }}" alt="">
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                    <div class="card shadow-sm border-0 mt-4">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <h4 class="mb-0">
                                    Total
                                </h4>

                                <h3 class="mb-0">
                                    ${{ number_format($total, 2) }}
                                </h3>

                            </div> <br>

                            <hr class="my-4"> <br>

                            <form action="{{ route('pedidos.guardar') }}" method="POST">
                                @csrf

                                <h4 class="mb-3">
                                    Datos para tu pedido
                                </h4>

                                <div class="row g-3">

                                    <div class="col-md-6">

                                        <div class="form-label">
                                            Nombre completo
                                        </div>

                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            placeholder="Ej. Juan Perez">

                                    </div>

                                    <div class="col-md-6">

                                        <label for="" class="form-label">
                                            Teléfono
                                        </label>

                                        <input type="tel" name="telefono" id="telefono" class="form-control"
                                            placeholder="Ej. 3312345678">

                                    </div>

                                    <div class="col-12">

                                        <label for="" class="form-label">
                                            Dirección de entrega
                                        </label>

                                        <textarea name="direccion" id="direccion" rows="3" class="form-control"
                                            placeholder="Ej. Calle, número, colonia, ciudad... "></textarea>

                                    </div>

                                    <div class="col-12">

                                        <label for="" class="form-label">
                                            Mensaje adicional
                                            <small class="text-muted">
                                                (opcional)
                                            </small>
                                        </label>

                                        <textarea placeholder="Ej. Entregar despúes de las 5:00 PM" name="mensaje" rows="10" class="form-control"></textarea>

                                    </div>

                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-4">

                                    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-seguir">
                                        <i class="bi bi-arrow-left-circle"></i> Seguir viendo flores
                                    </a>

                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-phone"></i> Confirmar pedido
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>
                @endif

            </div>

        </div>

    </div>

    {{--  <script src="{{ asset('js/validation-car.js') }}"></script>  --}}

    <script>
        const carrito = @json($carrito);
        const totalCarrito = @json($total);
    </script>
@endsection
