<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado.index')->with('empleados', $empleados);
    }


    public function create()
    {
        return view('empleado.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string|max:10',
        ]);

        $empleados = new Empleado();
        $empleados->nombre = $request->get('nombre');
        $empleados->paterno = $request->get('paterno');
        $empleados->materno = $request->get('materno');
        $empleados->telefono = $request->get('telefono');
        $empleados->direccion = $request->get('direccion');
        $empleados->edad = $request->get('edad');
        $empleados->sexo = $request->get('sexo');

        $empleados->save();

        return redirect('/empleado')->with('success', 'Empleado creado exitosamente');
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.edit')->with('empleado', $empleado);
    }


    public function update(Request $request, string $id)
    {
        $empleados = Empleado::find($id);

        $empleados->nombre = $request->get('nombre');
        $empleados->paterno = $request->get('paterno');
        $empleados->materno = $request->get('materno');
        $empleados->telefono = $request->get('telefono');
        $empleados->direccion = $request->get('direccion');
        $empleados->edad = $request->get('edad');
        $empleados->sexo = $request->get('sexo');

        $empleados->save();

        return redirect('/empleado')->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect('/empleado')->with('success', 'Empleado eliminado exitosamente');
    }
}
