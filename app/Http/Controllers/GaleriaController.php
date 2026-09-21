<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    // indes de galeria
    public function index()
    {
        $imagenes = Galeria::orderBy('orden')->get();

        return view('admin.galeria.index', compact('imagenes'));
    }

    // Guardar Imagen de galeria
    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'imagen' => 'required|image|mimes:png,jpg,jpeg,webp|max:4096',
        ]);

        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');

            $nombreImagen = time().'_'.$imagen->getClientOriginalName();

            $imagen->storeAs(
                'galeria',
                $nombreImagen,
                'public'
            );

            $ultimoOrden = Galeria::max('orden');

            Galeria::create([
                'imagen' => 'galeria/'.$nombreImagen,
                'orden' => ($ultimoOrden ?? -1) + 1,
            ]);
        }

        return redirect()
            ->route('admin.galeria')
            ->with('success', 'Imagen agregada correctamente.');

    }

    // Eliminar imagen de galeria
    public function eliminar(Galeria $galeria)
    {
        Storage::disk('public')->delete($galeria->imagen);

        $galeria->delete();

        //Reordenar las imagenes
        Galeria::orderBy('orden')->get()->each(function ($imagen, $indice) {
            $imagen->update([
                'orden' => $indice
            ]);
        });

        return redirect()
            ->route('admin.galeria')
            ->with('success', 'Imagen eliminada correctamente');
    }

    public function subir(Galeria $galeria)
    {

        $anterior = Galeria::where('orden', '<', $galeria->orden)
            ->orderByDesc('orden')
            ->first();

        if ($anterior) {
            $ordenActual = $galeria->orden;

            $galeria->orden = $anterior->orden;
            $anterior->orden = $ordenActual;

            $galeria->save();
            $anterior->save();

        }

        return redirect()
            ->route('admin.galeria')
            ->with('success', 'Imagen movida hacia arriba.');

    }

    public function bajar(Galeria $galeria)
    {

        $siguiente = Galeria::where('orden', '>', $galeria->orden)
            ->orderByDesc('orden')
            ->first();

        if ($siguiente) {
            $ordenActual = $galeria->orden;

            $galeria->orden = $siguiente->orden;
            $siguiente->orden = $ordenActual;

            $galeria->save();
            $siguiente->save();

        }

        return redirect()
            ->route('admin.galeria')
            ->with('success', 'Imagen movida hacia abajo.');

    }
}
