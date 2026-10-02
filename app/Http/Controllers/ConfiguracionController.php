<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function editar()
    {
        $configuracion = Configuracion::first();

        return view('admin.configuracion', compact('configuracion'));
    }

    public function actualizar(Request $request)
    {

        $request->validate([
            'titulo_hero' => 'required|string|max:255',
            'descripcion_hero' => 'required|string',
        ]);

        $configuracion = Configuracion::first();

        $configuracion->update([
            'titulo_hero' => $request->titulo_hero,
            'descripcion_hero' => $request->descripcion_hero,
        ]);

        return redirect()->route('admin.configuracion')->with('success', 'Configuración actualizada correctamente.');

    }
}
