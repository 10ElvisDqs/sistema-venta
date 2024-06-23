@extends('adminlte::page')

@section('title', 'Lista de Cliente')
@section('plugins.DatatablesPlugin', true)
@section('content_header')
<h1>Lista de Clientes</h1>
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
<a href="{{ route('cliente.create') }}" class="btn btn-primary">Crear Nuevo Cliente</a>

@php
$config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
        <"row" <"col-12" tr> >
            <"row" <"col-sm-12 d-flex justify-content-start" f> >';
                $config['paging'] = false;
                $config["lengthMenu"] = [ 10, 50, 100, 500];
                @endphp
                {{-- Setup data for datatables --}}
                <div class="card rounded shadow-sm m-4">
                    <div class="card-body">
                        <x-adminlte-datatable id="table8" :heads="[
        'ID',
        'Nombre',
        'Apellido',
        'Email',
        'Teléfono',
        'Fecha de Nacimiento',
        'Dirección',
        'Ciudad',
        'País',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5]
    ]
        " head-theme="dark" class="bg-teal" :config="$config" striped hoverable with-buttons beautify>
                            @foreach($config['data'] as $row)
                            <tr>
                                @foreach($row as $cell)
                                <td>{!! $cell !!}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                </div>





                @stop

                @section('css')
                {{-- Add here extra stylesheets --}}
                {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
                @stop

                @section('js')
                <script>
                    console.log("Hi, I'm using the Laravel-AdminLTE package!");
                </script>
                @stop