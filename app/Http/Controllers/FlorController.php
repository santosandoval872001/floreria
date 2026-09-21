<?php

namespace App\Http\Controllers;

use App\Models\Flor;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlorController extends Controller
{
    // Index de la pagina principal
    public function index()
    {
        $flores = Flor::all();
        $imagenesGaleria = Galeria::orderBy('orden')->get();

        return view('inicio', compact('flores', 'imagenesGaleria'));
    }

    // Adminitrador
    public function admin()
    {

        $totalFlores = Flor::count();
        $floresDisponibles = Flor::where('disponible', true)->count();
        $floresAgotadas = Flor::where('disponible', false)->count();

        return view('admin.index', compact(
            'totalFlores',
            'floresDisponibles',
            'floresAgotadas'
        ));
    }

    // Direccion para crear una flor
    public function crear()
    {
        return view('admin.flores.crear');
    }

    // Guardar dataos de un flor
    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'required|image|mimes:jpg,jpeg,peng,webp|max:2048',
        ]);

        $datos['disponible'] = $request->has('disponible');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            $nombreImagen = time().'_'.$imagen->getClientOriginalName();

            $imagen->storeAs('flores', $nombreImagen, 'public');

            $datos['imagen'] = 'flores/'.$nombreImagen;
        }

        Flor::create($datos);

        return redirect()
            ->route('admin.flores')
            ->with('success', 'Flor agregada correctamente.');
    }

    // Dirigir a la ruta ediatr flor
    public function editar(Flor $flor)
    {
        return view('admin.flores.editar', compact('flor'));
    }

    // Actualizar datos de una flor
    public function actualizar(Request $request, Flor $flor)
    {
        $datos = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,peng,webp|max:2048',
        ]);

        $datos['disponible'] = $request->has('disponible');

        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');

            $nombreImagen = time().'_'.$imagen->getClientOriginalName();

            $imagen->storeAs('flores', $nombreImagen, 'public');

            $datos['imagen'] = 'flores/'.$nombreImagen;
        }

        $flor->update($datos);

        return redirect()
            ->route('admin.flores')
            ->with('success', 'Flor agregada correctamente.');
    }

    // Elimininar
    public function eliminar(Flor $flor)
    {

        // Eliminar la imagen si pertenece al almacenamiento público
        if (str_starts_with($flor->imagen, 'flores/')) {

            Storage::disk('public')->delete($flor->imagen);

        }

        // Eliminar la flor de la base de datos
        $flor->delete();

        return redirect()
            ->route('admin.flores')
            ->with('success', 'Flor eliminada correctamente.');

    }

    // Disponibilidad
    public function cambiardisponibilidad(Flor $flor)
    {

        $flor->disponible = ! $flor->disponible;
        $flor->save();

        return redirect()
            ->route('admin')
            ->with('success', 'Disponibilidad actualizada correctamente.');

    }

    // Funcion para flores
    public function flores()
    {
        $flores = Flor::all();

        return view('admin.flores.index', compact('flores'));
    }
}
