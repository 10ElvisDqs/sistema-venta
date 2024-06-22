@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h2>CREAR REGISTRO DE PRODUCTO</h2>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/producto" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
            </div>
            <div class="form-group">
                <label for="abreviatura" class="form-label">Abreviatura</label>
                <input id="abreviatura" name="abreviatura" type="text" class="form-control" tabindex="2">
            </div>
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" tabindex="3"></textarea>
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" class="form-control" tabindex="4">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input id="stock" name="stock" type="number" class="form-control" tabindex="5">
            </div>
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" tabindex="6">
            </div>
            <div class="form-group">
                <label for="Pais_Origen" class="form-label">País de Origen</label>
                <input id="Pais_Origen" name="Pais_Origen" type="text" class="form-control" tabindex="7">
            </div>
            <div class="d-flex justify-content-between">
                <a href="/producto" class="btn btn-secondary" tabindex="8">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    {{--  --}}
@stop

@section('js')
    <script> console.log("Formulario de creación de productos cargado."); </script>
@stop
