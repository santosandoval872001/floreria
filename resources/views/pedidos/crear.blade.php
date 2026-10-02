@extends('layouts.app')

@section('contenido')
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        <h2 class="mb-4">
                            Realizar pedido
                        </h2>

                        <div class="d-flex align-items-center gap-3 mb-4">

                            <img src="{{ asset('storage' . $flor->imagen) }}" alt="{{ $flor->nombre }}" width="100"
                                height="100" style="object-fit: civer; border-radius: 15px; ">

                            <div class="">

                                <h4 class="mb-1">
                                    {{ $flor->nombre }}
                                </h4>

                                <p class="mb-0 text-muted">
                                    ${{ number_format($flor->precio, 2) }}
                                </p>

                            </div>

                        </div>

                        <form action="">

                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Nombre completo
                                </label>

                                <input type="text" class="form-control" placeholder="Escribe el nombre">

                            </div>

                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Telefono
                                </label>

                                <input type="email" name="" id="" class="form-control"
                                    placeholder="correo@ejemplo.com">

                            </div>

                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Dirección de entrega
                                </label>

                                <textarea name="" id="" rows="3" class="form-control" placeholder="Calle, colonia..."></textarea>

                            </div>

                            <div class="mb-3">

                                <label for="" class="form-label">
                                    Cantidad
                                </label>

                                <input type="number" value="1" min="1" class="form-control">

                            </div>

                            <div class="mb-4">

                                <label for="" class="form-label">
                                    Mensaje o dedicatoria
                                </label>

                                <textarea name="" id="" rows="3" class="form-control" placeholder="Ejemplo: Feliz cumpleaños..."></textarea>

                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <img src="{{ asset('iconos/flor-de-cerezo.png') }}" alt=""> Conituar con el pedido
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
