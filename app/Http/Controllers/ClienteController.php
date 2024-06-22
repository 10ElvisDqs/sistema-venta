<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();


        $config = [
            'data' => [],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, null, null, null, null, null, null, ['orderable' => false]],
        ];

        // Añadir los datos de los clientes a la configuración
        foreach ($clientes as $client) {
            $btnEdit = '<a href="'.route('cliente.edit', $client->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>';
            $btnDelete = '<form action="'.route('cliente.destroy', $client->id).'" method="POST" style="display:inline;">
                            '.csrf_field().method_field('DELETE').'
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>';
            $btnDetails = '<a href="'.route('cliente.show', $client->id).'" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>';
            $config['data'][] = [
                $client->id,
                $client->nombre,
                $client->apellido,
                $client->email,
                $client->telefono,
                $client->fecha_nacimiento,
                $client->direccion,
                $client->ciudad,
                $client->pais,
                '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>',
            ];
        }

        return view('cliente.index', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        // Encontrar el cliente por su ID
        $cliente = Cliente::find($id);

        // Verificar si el cliente existe
        if (!$cliente) {
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado.');
        }

        // Actualizar los datos del cliente
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        if ($cliente->email != $request->input('email')) {
            $cliente->email = $request->input('email');
        }
        // $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $cliente->direccion = $request->input('direccion');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->pais = $request->input('pais');

        // Guardar los cambios en la base de datos
        $cliente->save();


        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente eliminado exitosamente.');

    }
}
