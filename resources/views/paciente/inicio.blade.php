@extends('layouts.app')

@section('title_postfix', 'Pacientes')

@section('css')
    {{--  --}}
@endsection

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Home</a>
                /
                <link class="fas fa-fw fa-list-ol" rel="icon">
                <a class="text-uppercase" href="{{ route('pacientes.index') }}">Pacientes</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Pacientes</h4>
                </div>
                <div class="col-4">
                    <a href="{{ route('pacientes.create') }}" type="button" class="btn btn-primary float-right">Agregar Paciente</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pacientesTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre paciente</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Escolaridad</th>
                            <th scope="col">Ocupación</th>
                            <th scope="col">Estado civil</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->name }} {{ $paciente->lastnames }}</td>
                                <td>{{ $paciente->age }}</td>
                                <td>{{ $paciente->sexo }}</td>
                                <td>
                                    @isset($paciente->grupo)
                                        {{ $paciente->grupo->description }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($paciente->escolaridade)
                                        {{ $paciente->escolaridade->description }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($paciente->ocupacione)
                                        {{ $paciente->ocupacione->description }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($paciente->estado)
                                        {{ $paciente->estado->description }}
                                    @endisset
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('pacientes.show', $paciente->id) }}" type="button" class="btn btn-info">Historial</a>
                                        <a href="{{ route('pacientes.edit', $paciente->id) }}" type="button" class="btn btn-success">Consulta</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js')
    {{--  --}}
@endsection