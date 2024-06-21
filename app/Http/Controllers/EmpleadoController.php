<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{

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
        $empleados = new Empleado();
        $empleados->nombre =$request->get('nombre');
        $empleados->paterno =$request->get('paterno');
        $empleados->materno =$request->get('materno');
        $empleados->telefono =$request->get('telefono');
        $empleados->direccion =$request->get('direccion');
        $empleados->edad =$request->get('edad');
        $empleados->sexo =$request->get('sexo');

        $empleados->save();

        return redirect('/empleado');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

        public function destroy(string $id)
    {
        //
    }
}
