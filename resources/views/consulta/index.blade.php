@extends('layouts.app')

@section('title_postfix', 'Consultas')

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
                <a class="text-uppercase" href="{{ route('consultas.index') }}">Consultas</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Consultas</h4>
                </div>
                <div class="col-4">
                    <a href="{{ route('consultas.create') }}" type="button" class="btn btn-primary float-right">Nueva Consulta</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pacientesTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre medico</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Especialidad</th>
                            {{-- <th scope="colgroup">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicos as $medico)
                            <tr>
                                <td>{{ $medico->name }} {{ $medico->lastnames }}</td>
                                <td>{{ $medico->phone }}</td>
                                <td>
                                    @isset($medico->especialidade)
                                        {{ $medico->especialidade->description }}
                                    @endisset
                                </td>
                                {{-- <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-info">Mostrar</button>
                                        <button type="button" class="btn btn-success">Editar</button>
                                        <button type="button" class="btn btn-danger">Borrar</button>
                                    </div>
                                </td> --}}
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