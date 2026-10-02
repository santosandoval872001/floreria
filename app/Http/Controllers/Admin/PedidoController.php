<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {

        $pedidos = Pedido::latest()->get();

        return view('admin.pedidos.index', compact('pedidos'));
    }

    public function mostrar(Pedido $pedido)
    {

        $pedido->load('detalles.flor');

        return view('admin.pedidos.mostrar', compact('pedido'));
    }

    public function actualizarEstado(Request $request, Pedido $pedido)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,confirmado,en_preparacion,entregado,adelanto,cancelado',
        ]);

        $pedido->estado = $request->estado;
        $pedido->save();

        return back()->with('success', 'Estado del pedido actualizado correctamente.');
    }

    public function whatsapp(Pedido $pedido)
    {

        $pedido->load('detalles.flor');

        if ($pedido->estado === 'pendiente') {
            return back()->with(
                'error',
                'Primero debes confirmar el pedido antes de enviar una actualización por WhatsApp.'
            );
        }

        // Mensaje de WhatsApp

        $mensaje = "Hola " . $pedido->nombre_cliente . ".\n\n";

        $estadoTexto = match ($pedido->estado) {
            'pendiente' => 'está pendiente de confirmación',
            'confirmado' => 'ha sido confirmado',
            'en_preparacion' => 'está en preparación',
            'entregado' => 'ha sido entregado',
            'cancelado' => 'ha sido cancelado',
            'default' => 'ha sido actualizado',
        };

        $mensaje .= "Tu pedido #" . $pedido->id . " " . $estadoTexto . ".\n\n";

        $mensaje .= "Productos: \n";

        foreach ($pedido->detalles as $detalle) {

            $mensaje .= "- " . $detalle->flor->nombre .
                " x" . $detalle->cantidad .
                " = $" . number_format($detalle->subtotal, 2) . "\n";
        }

        $mensaje .= "\nRestante: $" . number_format($pedido->tota, 2);

        $mensaje .= "\n\nGracias por tu compra.";

        // Limpiar mensaje 
        $telefono = preg_replace('/\D/', '', $pedido->telefono);

        //Agregar código de México si no lo tiene
        if (!str_starts_with($telefono, '52')) {
            $telefono = '52' . $telefono;
        }

        $urlWhatsApp = "http://wa.me/" . $telefono . "?text=" . urlencode($mensaje);

        return redirect()->away($urlWhatsApp);
    }

    public function actualizarPago(Request $request, Pedido $pedido)
    {

        $request->validate([
            'pago' => 'required|in:pagado,no_pagado',
            'metodo_pago' => 'required|in:efectivo,transferencia,trajeta',
        ]);

        // $pedido->pago = $request->pago;

        // if ($request->pago === 'no_pagado') {
        //     $pedido->metodo_pago = null;
        // } else {
        //     $pedido->metodo_pago = $request->metodo_pago;
        // }

        $pedido->update([
            'pago' => $request->pago,
            'metodo_pago' => $request->pago === 'pagado'
                ? $request->metodo_pago
                : null,

        ]);

        $pedido->save();

        return back()->with('success', 'Información del pago actualizado correctamente.');
    }

    public function eliminar(Pedido $pedido)
    {

        if (!in_array($pedido->estado, ['entregado', 'cancelado'])) {
            return back()->with(
                'error',
                'Solo se puede eliminar pedidos entregados o cancelados',
            );
        }

        $pedido->delete();

        return redirect()
            ->route('admin.pedidos')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}
