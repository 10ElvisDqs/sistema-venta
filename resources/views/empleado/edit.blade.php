@extends('adminlte::page')

@section('content')
<h2>EDITAR REGISTROS</h2>
<form action="/empleado/{{$empleado->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control"  value="{{$empleado->nombre}}">
    </div>
    <div class="mb-3">
        <label for="paterno" class="form-label">Paterno</label>
        <input id="paterno" name="paterno" type="text" class="form-control"  value="{{$empleado->paterno}}">
    </div>
    <div class="mb-3">
        <label for="materno" class="form-label">Materno</label>
        <input id="materno" name="materno" type="text" class="form-control" value="{{$empleado->materno}}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control"  value="{{$empleado->telefono}}">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control"  value="{{$empleado->direccion}}">
    </div>
    <div class="mb-3">
        <label for="edad" class="form-label">Edad</label>
        <input id="edad" name="edad" type="text" class="form-control"  value="{{$empleado->edad}}">
    </div>
    <div class="mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <input id="sexo" name="sexo" type="text" class="form-control"  value="{{$empleado->sexo}}">
    </div>
    <a href="/empleado" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>

@endsection