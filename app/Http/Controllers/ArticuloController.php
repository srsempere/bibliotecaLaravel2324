<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Articulo::class, 'articulo');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articulos.index', [
            'articulos' => Articulo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create',[
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validar($request);
        $articulo = new Articulo($validated);
        $articulo->save();
        session()->flash('success', 'El libro se ha creado correctamente');
        return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show', [
            'articulo' => $articulo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }

    public function cambiar_imagen(Articulo $articulo)
    {
        return view('articulos.cambiar_imagen', [
            'articulo' => $articulo,
        ]);
    }

    public function guardar_imagen(Articulo $articulo, Request $request)
    {
        $request->validate([
            'imagen' => 'required|mimes:png',
        ]);

        $imagen = $request->file('imagen');
        $nombreImagen = $articulo->id . '.png';
        $rutaImagen = $imagen->storeAs('uploads', $nombreImagen, 'public');

        // Actualizar la ruta en la base de datos
        $articulo->ruta_imagen = $rutaImagen;
        $articulo->save();
        return redirect()->route('articulos.index');
    }

    private function validar(REQUEST $request)
    {
        return $request->validate([
            'nombre' => 'required|string|max:50',
            'autor' => 'required|string|max:50',
            'precio' => 'required|decimal:2|between:-9999.99,9999.99',
            'categoria_id' => 'required|integer|exists:categorias,id'
        ]);
    }
}
