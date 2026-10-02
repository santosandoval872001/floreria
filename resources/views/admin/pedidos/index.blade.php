@extends('admin.layouts.app')

@section('contenido')
    <div class="container py-2">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="">
                <h1 class="mb-1">
                    Pedidos
                </h1>
                <p class="text-muted mb-0">
                    Pedidos recibidos de los clientes
                </p>
            </div>

            <span class="badge bg-primary fs-6">
                {{ $pedidos->count() }} pedidos
            </span>

        </div>

        @if ($pedidos->isEmpty())
            <div class="alert alert-info">
                No hay pedidos registrados todavía.
            </div>
        @else
            <div class="card shadow-sm border-0">

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-dark">

                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Teléfono</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Pago</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($pedidos as $pedido)
                                    <tr class="fila-pedido"
                                        onclick="window.location='{{ route('admin.pedidos.mostrar', $pedido) }}'"
                                        style="cursor: pointer;">

                                        <td>
                                            <strong>
                                                #{{ $pedido->id }}
                                            </strong>
                                        </td>

                                        <td>
                                            {{ $pedido->nombre_cliente }}
                                        </td>

                                        <td>
                                            {{ $pedido->telefono }}
                                        </td>

                                        <td>
                                            <strong>
                                                ${{ number_format($pedido->total, 2) }}
                                            </strong>
                                        </td>

                                        <td>

                                            @if ($pedido->estado === 'pendiente')
                                                <span class="badge bg-warning text-dark">
                                                    Pendiente
                                                </span>
                                            @elseif ($pedido->estado === 'confirmado')
                                                <span class="badge bg-primary">
                                                    Confirmado
                                                </span>
                                            @elseif ($pedido->estado === 'en_preparacion')
                                                <span class="badge bg-info text-dark">
                                                    En preparación
                                                </span>
                                            @elseif ($pedido->estado === 'entregado')
                                                <span class="badge bg-success">
                                                    Entregado
                                                </span>
                                            @elseif ($pedido->estado === 'cancelado')
                                                <span class="badge bg-danger">
                                                    Cancelado
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    {{ $pedido->estado }}
                                                </span>
                                            @endif

                                        </td>

                                        <td>

                                            @if ($pedido->pago === 'pagado')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle"></i>
                                                    Pagado
                                                </span>
                                                @if ($pedido->metodo_pago)
                                                    <div class="small text-muted mt-1">
                                                        {{ ucfirst($pedido->metodo_pago) }}
                                                    </div>
                                                @endif
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-clock"></i>
                                                    No pagado
                                                </span>
                                            @endif

                                        </td>

                                        <td>
                                            {{ $pedido->created_at->format('d/m/Y H:i') }}
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.pedidos.mostrar', $pedido) }}"
                                                class="btn btn-sm btn-primary" onclick="event.stopPropagation()">
                                                <i class="bi bi-eye"></i>
                                                Ver pedido
                                            </a>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        @endif

    </div>
@endsection
