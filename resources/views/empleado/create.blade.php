@extends('adminlte::page')

@section('content')

<h2>CREAR REGISTROS DE EMPLEADO</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/empleado" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label for="paterno" class="form-label">Paterno</label>
        <input id="paterno" name="paterno" type="text" class="form-control" tabindex="2" value="{{ old('paterno') }}">
    </div>
    <div class="mb-3">
        <label for="materno" class="form-label">Materno</label>
        <input id="materno" name="materno" type="text" class="form-control" tabindex="3" value="{{ old('materno') }}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="4" value="{{ old('telefono') }}">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="5" value="{{ old('direccion') }}">
    </div>
    <div class="mb-3">
        <label for="edad" class="form-label">Edad</label>
        <input id="edad" name="edad" type="text" class="form-control" tabindex="6" value="{{ old('edad') }}">
    </div>
    <div class="mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <input id="sexo" name="sexo" type="text" class="form-control" tabindex="7" value="{{ old('sexo') }}">
    </div>
    <a href="/empleado" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>

@endsection
