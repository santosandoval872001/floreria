<?php

namespace App\Http\Controllers;

use App\Models\Flor;
use App\Models\Pedido;
use App\Models\PedidosDetalle;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function crear(Flor $flor)
    {

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()
                ->route('carrito.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('pedidos.crear', compact('flor'));
    }

    public function guardar(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'direccion' => 'required|string',
            'mensaje' => 'nullable|string',
        ]);

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()
                ->route('carrito.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $pedido = Pedido::create([
            'nombre_cliente' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'mensaje' => $request->mensaje,
            'total' => $total,
            'estado' => 'pendiente',
        ]);

        foreach ($carrito as $florId => $item) {

            PedidosDetalle::create([
                'pedido_id' => $pedido->id,
                'flor_id' => $florId,
                'cantidad' => $item['cantidad'],
                'precio' => $item['precio'],
                'subtotal' => $item['precio'] * $item['cantidad'],
            ]);
        }

        session()->forget('carrito');

        $mensaje = "*NUEVO PEDIDO  - FLORERÍA*\n";

        $mensaje .= "\n--------------\n";
        $mensaje .= "Datos del cliente\n\n";
        $mensaje .= "*Cliente: " . $pedido->nombre_cliente . "\n";
        $mensaje .= "*Teléfono: " . $pedido->telefono . "\n";
        $mensaje .= "*Dirección: " . $pedido->direccion . "\n";
        $mensaje .= "--------------\n";

        if ($pedido->mensaje) {
            $mensaje .= "*Mensaje: " . $pedido->mensaje . "\n";
            $mensaje .= "--------------\n";
        }

        $mensaje .= "\n* PRODUCTOS *\n";

        foreach ($pedido->detalles as $detalle) {
            $mensaje .= "- " . $detalle->flor->nombre .
                " x" . $detalle->cantidad .
                " = $" . number_format($detalle->subtotal, 2) . "\n";
        }

        $mensaje .= "\n--------------\n";
        $mensaje .= "*TOTAL: $" . number_format($pedido->total, 2);
        $mensaje .= "\n--------------\n";

        $mensaje .= "Gracias por su preferencia.";

        $telefonoWhatsApp = "523751112113";

        $urlWhatsApp = "http://wa.me/" . $telefonoWhatsApp .
            "?text=" . urlencode($mensaje);

        session()->forget('carrito');

        return redirect()->away($urlWhatsApp);
    }
}
