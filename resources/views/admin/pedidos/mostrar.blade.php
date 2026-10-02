@extends('admin.layouts.app')

@section('contenido')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="mb-1">
                    Pedido #{{ $pedido->id }}
                </h1>

                <p class="text-muted mb-0">
                    {{ $pedido->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

        </div>


        <div class="row mb-4">
            <div class="col-6">
                <a href="{{ route('admin.pedidos') }}" class="btn btn-outline-secondary">
                    ← Volver a pedidos
                </a>

                <form action="{{ route('admin.pedidos.eliminar', ['pedido' => $pedido->id]) }}" method="POST"
                    class="d-inline"
                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este pedido? Esta acción no se puede deshacer.');">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                        Eliminar pedido
                    </button>

                </form>
            </div>
        </div>


        {{-- DATOS DEL CLIENTE --}}

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header">
                <h5 class="mb-0">
                    Datos del cliente
                </h5>
            </div>

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-6">

                        <strong>Nombre:</strong>

                        <div>
                            {{ $pedido->nombre_cliente }}
                        </div>

                    </div>


                    <div class="col-md-6">

                        <strong>Teléfono:</strong>

                        <div>
                            {{ $pedido->telefono }}
                        </div>

                    </div>


                    <div class="col-12">

                        <strong>Dirección:</strong>

                        <div>
                            {{ $pedido->direccion }}
                        </div>

                    </div>


                    @if ($pedido->mensaje)
                        <div class="col-12">

                            <strong>Mensaje:</strong>

                            <div>
                                {{ $pedido->mensaje }}
                            </div>

                        </div>
                    @endif

                </div>

            </div>

        </div>

        {{--  Estado del pedido  --}}
        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <h5 class="mb-3">
                    Estado del pedido
                </h5>

                <form action="{{ route('admin.pedidos.estado', $pedido) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row align-items-end">

                        <div class="col-md-6">

                            <label for="estado" class="form-label">
                                Estado actual
                            </label>

                            <select name="estado" id="estado" class="form-select">

                                <option value="pendiente" {{ $pedido->estado === 'pendiente' ? 'selected' : '' }}>
                                    Pendiente
                                </option>

                                <option value="confirmado" {{ $pedido->estado === 'confirmado' ? 'selected' : '' }}>
                                    Confirmado
                                </option>

                                <option value="en_preparacion"
                                    {{ $pedido->estado === 'en_preparacion' ? 'selected' : '' }}>
                                    En preparación
                                </option>

                                <option value="entregado" {{ $pedido->estado === 'entregado' ? 'selected' : '' }}>
                                    Entregado
                                </option>

                                <option value="cancelado" {{ $pedido->estado === 'cancelado' ? 'selected' : '' }}>
                                    Cancelado
                                </option>

                            </select>

                        </div>

                        <div class="col-md-3 mt-3 mt-md-0">

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-save"></i>
                                Guardar estado
                            </button>

                        </div>

                    </div>

                </form>

                <div class="mt-3">

                    <a href="{{ route('admin.pedidos.whatsapp', ['pedido' => $pedido->id]) }}" class="btn btn-success"
                        target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        Enviar actualización por WhatsApp
                    </a>

                </div>

            </div>

        </div>

        {{--  Metodo de pago   --}}
        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <h5 class="mb-3">
                    Estado de pago
                </h5>

                <form action="{{ route('admin.pedidos.pago', $pedido) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row align-items-end">

                        <div class="col-md-4">

                            <label for="" class="form-label">
                                Pago
                            </label>

                            <select name="pago" id="pago" class="form-select">

                                <option value="no_pagado" {{ $pedido->pago === 'no_pagado' ? 'selected' : '' }}>
                                    No pagado
                                </option>

                                <option value="pagado" {{ $pedido->pago === 'pagado' ? 'selected' : '' }}>
                                    Pagado
                                </option>

                            </select>

                        </div>

                        <div class="col-md-4">

                            <label for="" class="form-label">
                                Metodo de pago
                            </label>

                            <select name="metodo_pago" id="metodo_pago" class="form-select">

                                <option value="">
                                    Seleccionar
                                </option>

                                <option value="efectivo"{{ $pedido->metodo_pago === 'efectivo' ? 'selected' : '' }}>
                                    Efectivo
                                </option>

                                <option value="transferencia"
                                    {{ $pedido->metodo_pago === 'transferencia' ? 'selected' : '' }}>
                                    Transferencia
                                </option>

                                <option value="tarjeta" {{ $pedido->metodo_pago === 'tarjeta' ? 'selected' : '' }}>
                                    Tarjeta
                                </option>

                            </select>

                        </div>

                        <div class="col-md-4 mt-3 mt-md-0">

                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-credit-card"></i>
                                Guardar pago
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        {{-- PRODUCTOS --}}

        <div class="card shadow-sm border-0">

            <div class="card-header">

                <h5 class="mb-0">
                    Productos del pedido
                </h5>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th>Flor</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($pedido->detalles as $detalle)
                                <tr>

                                    <td>

                                        <img src="{{ asset('storage/' . $detalle->flor->imagen) }}"
                                            alt="{{ $detalle->flor->nombre }}" width="70" height="70"
                                            style="object-fit: cover; border-radius: 12px; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#modalFlor{{ $detalle->id }}">

                                        <strong>
                                            {{ $detalle->flor->nombre }}
                                        </strong>

                                        <div class="modal fade" id="modalFlor{{ $detalle->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h5 class="modal-tittle">
                                                            {{ $detalle->flor->nombre }}
                                                        </h5>

                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>

                                                    </div>

                                                    <div class="modal-body text-center">

                                                        <img src="{{ asset('storage/' . $detalle->flor->imagen) }}"
                                                            alt="{{ $detalle->flor->nombre }}" class="img-fluid"
                                                            style=" max-height: 70vh; object-fit: contain;">

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        {{ $detalle->cantidad }}
                                    </td>

                                    <td>
                                        ${{ number_format($detalle->precio, 2) }}
                                    </td>

                                    <td>

                                        <strong>
                                            ${{ number_format($detalle->subtotal, 2) }}
                                        </strong>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>


                        <tfoot>

                            <tr>

                                <td colspan="3" class="text-end">
                                    <strong>Total:</strong>
                                </td>

                                <td>

                                    <strong class="fs-5">
                                        ${{ number_format($pedido->total, 2) }}
                                    </strong>

                                </td>

                            </tr>

                        </tfoot>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
