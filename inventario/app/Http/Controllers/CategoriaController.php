<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;




class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|string|max:255',

        ]);
        \App\Models\Categoria::create([
            'nombre'=>$request->nombre,
        ]);

        return redirect()->route('categorias.index')->with('success','Categoria creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $categoria = App\Models\Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = \App\Models\Categoria::findOrFail($id);
        return view('categorias.editar', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);
        $categoria = \App\Models\Categoria::findOrFail($id);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = App\Models\Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
