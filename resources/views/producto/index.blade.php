@extends('adminlte::page')

@section('title', 'Lista de Productos')
@section('plugins.DatatablesPlugin', true)
@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert" id="success-alert">
        {{ session('success') }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(() => {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 5000); // 5000 ms = 5 segundos
        });
    </script>
@endif
<a href="{{ route('producto.create') }}" class="btn btn-primary">CREAR</a>

@php
$config = [
    'dom' => '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
              <"row" <"col-12" tr> >
              <"row" <"col-sm-12 d-flex justify-content-start" f> >',
    'paging' => false,
    'lengthMenu' => [10, 50, 100, 500],
];
@endphp
{{-- Configuración de la tabla para datatables --}}
<div class="card rounded shadow-sm m-4">
    <div class="card-body">
        <x-adminlte-datatable id="productTable" :heads="[
        'ID',
        'Nombre',
        'Abreviatura',
        'Descripción',
        'Precio',
        'Stock',
        'Marca',
        'País Origen',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5]
    ]" head-theme="dark" class="bg-teal" :config="$config" striped hoverable with-buttons beautify>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->abreviatura }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->marca }}</td>
                <td>{{ $producto->Pais_Origen }}</td>
                <td>
                    <a href="/producto/{{ $producto->id }}/edit" class="btn btn-info btn-sm" title="Editar">
                        <i class="fas fa-edit"></i> <!-- Icono de editar -->
                    </a>
                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i> <!-- Icono de eliminar -->
                        </button>
                    </form>
                </td>   
                
            </tr>
        @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@stop

@section('css')
    {{--  --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hola, ¡estoy usando el paquete Laravel-AdminLTE!"); </script>
@stop
