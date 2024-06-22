@extends('adminlte::page')

@section('title', 'Editar Cliente')
@section('plugins.DateRangePicker', true)
@section('plugins.TempusDominusBs4', true)

@section('content_header')
    <h1>Datos de Cliente :</h1><h2> {{$cliente->nombre }} {{ $cliente->apellido }} </h2>
@stop

@section('content')
<div class="card rounded shadow-sm m-4">
    <div class="card-body">

            <div class="row">
                <div class="col-4">
                    <x-adminlte-input name="nombre" label="Nombre" value="{{ $cliente->nombre }}" placeholder="Nombre" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4">
                    <x-adminlte-input name="apellido" label="Apellido" value="{{ $cliente->apellido }}" placeholder="Apellido" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4">
                    <x-adminlte-input name="email" label="Email" value="{{ $cliente->email }}" placeholder="Email" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-envelope text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-adminlte-input name="telefono" label="Teléfono" value="{{ $cliente->telefono }}" placeholder="Teléfono" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-phone text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-6">
                    <x-adminlte-input-date name="fecha_nacimiento" label="Fecha de Nacimiento" value="{{ $cliente->fecha_nacimiento }}" :config="['format' => 'YYYY-MM-DD']" placeholder="Selecciona una fecha..." label-class="text-lightblue"  disabled>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-calendar text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <x-adminlte-input name="direccion" label="Dirección" value="{{ $cliente->direccion }}" placeholder="Dirección" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-home text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4">
                    <x-adminlte-input name="ciudad" label="Ciudad" value="{{ $cliente->ciudad }}" placeholder="Ciudad" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-city text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4">
                    <x-adminlte-input name="pais" label="País" value="{{ $cliente->pais }}" placeholder="País" label-class="text-lightblue" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-globe text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">

                    <a href="{{ route('cliente.index') }}" class="btn btn-primary">ir a lista de clientes</a>

                </div>
            </div>

    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
