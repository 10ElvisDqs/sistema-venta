@extends('adminlte::page')

@section('title', 'Lista de Empleados')
@section('plugins.DatatablesPlugin', true)
@section('content_header')
    <h1>Lista de Empleados</h1>
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
<a href="{{ route('empleado.create') }}" class="btn btn-primary">Crear Nuevo Empleado</a>

@php
$config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
                  <"row" <"col-12" tr> >
                  <"row" <"col-sm-12 d-flex justify-content-start" f> >';
$config['paging'] = false;
$config["lengthMenu"] = [ 10, 50, 100, 500 ];
@endphp
{{-- Configuración de la tabla para datatables --}}
<div class="card rounded shadow-sm m-4">
    <div class="card-body">
        <x-adminlte-datatable id="employeeTable" :heads="[
        'ID',
        'Nombre',
        'Paterno',
        'Materno',
        'Teléfono',
        'Dirección',
        'Edad',
        'Sexo',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5]
    ]" head-theme="dark" class="bg-teal" :config="$config" striped hoverable with-buttons beautify>
        @foreach($empleados as $empleado)
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
                    <a href="/empleado/{{ $empleado->id }}/edit" class="btn btn-info">Editar</a>
                    <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
