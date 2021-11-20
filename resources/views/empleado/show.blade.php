@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleado.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo electronico:</strong>
                            {{ $empleado->email }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $empleado->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Area Id:</strong>
                            {{ $empleado->area_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del area:</strong>
                            {{ $empleado->area->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Boletin:</strong>
                            {{ $empleado->boletin }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $empleado->descripcion }}
                        </div>

                        <div class="form-group">
                            <strong>Roles:</strong>
                            {{ $empleado->empleadoRols}}

                </div>
            </div>
        </div>
    </section>
@endsection
