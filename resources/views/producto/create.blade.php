@extends('adminlte::page')

@section('content')

<h2>CREAR REGISTROS</h2>

<form action="/producto" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="abreviatura" class="form-label">Abreviatura</label>
        <input id="abreviatura" name="abreviatura" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input id="precio" name="precio" type="text" class="form-control" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input id="stock" name="stock" type="text" class="form-control" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input id="marca" name="marca" type="text" class="form-control" tabindex="6">
    </div>
    <div class="mb-3">
        <label for="Pais Origen" class="form-label">Pais Origen</label>
        <input id="Pais_Origen" name="Pais_Origen" type="text" class="form-control" tabindex="7">
    </div>
    <a href="/producto" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>

@endsection