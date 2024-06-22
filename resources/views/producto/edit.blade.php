@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h2>EDITAR PRODUCTO</h2>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/producto/{{ $producto->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{ $producto->nombre }}">
            </div>
            <div class="form-group">
                <label for="abreviatura" class="form-label">Abreviatura</label>
                <input id="abreviatura" name="abreviatura" type="text" class="form-control" tabindex="2" value="{{ $producto->abreviatura }}">
            </div>
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" tabindex="3">{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" class="form-control" tabindex="4" value="{{ $producto->precio }}">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input id="stock" name="stock" type="number" class="form-control" tabindex="5" value="{{ $producto->stock }}">
            </div>
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" tabindex="6" value="{{ $producto->marca }}">
            </div>
            <div class="form-group">
                <label for="Pais_Origen" class="form-label">País de Origen</label>
                <input id="Pais_Origen" name="Pais_Origen" type="text" class="form-control" tabindex="7" value="{{ $producto->Pais_Origen }}">
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
    {{}}
@stop

@section('js')
    {{-- --}}
@stop
