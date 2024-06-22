@extends('adminlte::page')

@section('content')

<h1>LISTA DE EMPLEADOS</h1>
<p></p>
    <a href="empleado/create" class="btn btn-primary">CREAR</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   

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
                    <form action="{{ route ('empleado.destroy',$empleado->id)}}" method="POST">
                    <a href="/empleado/{{ $empleado->id}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
