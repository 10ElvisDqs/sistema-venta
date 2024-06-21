@extends('adminlte::page')

@section('content')

<h1>LISTA DE EMPLEADOS</h1>
<p></p>
    <a href="empleado/create" class="btn btn-primary">CREAR</a>

    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Paterno</th>
                <th scope="col">Materno</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->paterno }}</td>
                <td>{{ $empleado->materno }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->edad }}</td>
                <td>{{ $empleado->sexo }}</td>
                <td>
                    <a href="#" class="btn btn-info">Editar</a>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
