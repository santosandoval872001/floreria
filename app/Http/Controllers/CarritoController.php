<?php

namespace App\Http\Controllers;

use App\Models\Flor;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Request $request, Flor $flor)
    {

        if (! $flor->disponible) {
            return back()->with('error', 'Esta flor no está disponible');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$flor->id])) {

            $carrito[$flor->id]['cantidad']++;

        } else {

            $carrito[$flor->id] = [
                'nombre' => $flor->nombre,
                'precio' => $flor->precio,
                'imagen' => $flor->imagen,
                'cantidad' => 1,
            ];

        }

        session()->put('carrito', $carrito);

        return back()->with('success', 'Flor agregada al carrito. ');

    }

    public function eliminar($id)
    {

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
        }

        session()->put('carrito', $carrito);

        return back()->with('success', 'Producto eliminado del carrito.');

    }

    public function index()
    {

        $carrito = session()->get('carrito', []);

        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito.index', compact('carrito', 'total'));

    }

    public function aumentar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        }

        session()->put('carrito', $carrito);

        return back();
    }

    public function disminuir($id)
    {

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {

            $carrito[$id]['cantidad']--;

            if ($carrito[$id]['cantidad'] <= 0) {
                unset($carrito[$id]);
            }

        }

        session()->put('carrito', $carrito);

        return back();

    }
}
