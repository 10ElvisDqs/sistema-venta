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
                <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{ old('nombre') }}">
                @if ($errors->has('nombre'))
                <div class="text-danger">{{ $errors->first('nombre') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="abreviatura" class="form-label">Abreviatura</label>
                <input id="abreviatura" name="abreviatura" type="text" class="form-control" tabindex="2" value="{{ old('abreviatura') }}">
                @if ($errors->has('abreviatura'))
                <div class="text-danger">{{ $errors->first('abreviatura') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" tabindex="3">{{ old('descripcion') }}</textarea>
                @if ($errors->has('descripcion'))
                <div class="text-danger">{{ $errors->first('descripcion') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" class="form-control" tabindex="4" value="{{ old('precio') }}">
                @if ($errors->has('precio'))
                <div class="text-danger">{{ $errors->first('precio') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input id="stock" name="stock" type="number" class="form-control" tabindex="5" value="{{ old('stock') }}">
                @if ($errors->has('stock'))
                <div class="text-danger">{{ $errors->first('stock') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" tabindex="6" value="{{ old('marca') }}">
            </div>
            <div class="form-group">
                <label for="Pais_Origen" class="form-label">País de Origen</label>
                <input id="Pais_Origen" name="Pais_Origen" type="text" class="form-control" tabindex="7" value="{{ old('Pais_Origen') }}">
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <a href="/producto" class="btn btn-secondary" tabindex="8">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
{{-- --}}
@stop

@section('js')
<script>
    console.log("Formulario de creación de productos cargado.");
</script>
@stop