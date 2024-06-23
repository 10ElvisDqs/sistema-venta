<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0|max:9999999.99', // Numeric to allow decimals, with a realistic max value.
            'stock' => 'required|integer|min:0',
            'marca' => 'nullable|string|max:255',
            'Pais_Origen' => 'nullable|string|max:255',
        ]);

        $productos = new Producto();
        $productos->nombre = $request->get('nombre');
        $productos->abreviatura = $request->get('abreviatura');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio = $request->get('precio');
        $productos->stock = $request->get('stock');
        $productos->marca = $request->get('marca');
        $productos->Pais_Origen = $request->get('Pais_Origen');
        $productos->save();

        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        return view('producto.edit')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->get('nombre');
        $producto->abreviatura = $request->get('abreviatura');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->stock = $request->get('stock');
        $producto->marca = $request->get('marca');
        $producto->Pais_Origen = $request->get('Pais_Origen');
        $producto->save();

        return redirect('/producto')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('/producto')->with('success', 'Producto eliminado exitosamente');
    }
}
