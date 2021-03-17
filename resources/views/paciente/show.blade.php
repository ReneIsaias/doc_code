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
                <a class="text-uppercase" href="{{ route('pacientes.index') }}">Historial Medico</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="text-uppercase">{{ $paciente->name }} {{ $paciente->lastnames }}</h4>
            <hr>
            <div class="row">
                <div class="col-3">
                    <label class="text-muted" for="name">Estado :</label>
                    <h5>
                        @isset($paciente->estado)
                            {{$paciente->estado->description}}
                        @endisset
                    </h5>
                </div>
                <div class="col-3">
                    <label class="text-muted" for="name">Escolaridad :</label>
                    <h5>
                        @isset($paciente->escolaridade)
                            {{$paciente->escolaridade->description}}
                        @endisset
                    </h5>
                </div>
                <div class="col-3">
                    <label class="text-muted" for="name">Ocupacion :</label>
                    <h5>
                        @isset($paciente->ocupacione)
                            {{$paciente->ocupacione->description}}
                        @endisset
                    </h5>
                </div>
                <div class="col-3">
                    <label class="text-muted" for="name">Grupo :</label>
                    <h5>
                        @isset($paciente->grupo)
                            {{$paciente->grupo->description}}
                        @endisset
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4>Historial medico</h4><br>
            {{ $pacientes }}
            <div class="table-responsive">
                <table id="pacientesTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Padecimiento</th>
                            <th scope="col">Medico</th>
                            {{-- <th scope="colgroup">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{--  --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js')
    {{--  --}}
@endsection