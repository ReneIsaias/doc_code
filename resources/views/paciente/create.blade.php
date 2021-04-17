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
            <h5 class="text-uppercase">Datos del Paciente</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pacientes.store') }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="curp">Curp :</label>
                                <input type="text" name="curp" class="form-control @error('curp') is-invalid @enderror" value="{{ old('curp') }}">
                                @error('curp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="email">Email :</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="name">Nombre :</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="lastnames">Apellidos :</label>
                                <input type="text" name="lastnames" class="form-control @error('lastnames') is-invalid @enderror" value="{{ old('lastnames') }}">
                                @error('lastnames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="sexo">Sexo :</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sexoHombre" name="sexo" class="custom-control-input" value="hombre" checked>
                                    <label class="custom-control-label" for="sexoHombre">Hombre</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sexoMujer" name="sexo" class="custom-control-input" value="Mujer">
                                    <label class="custom-control-label" for="sexoMujer">Mujer</label>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="birthday">Fecha de nacimiento :</label>
                                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthdaye') }}"
                                        wire:model="birthday" wire:dirty.class="bg-primary">
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="ocupacione_id">Ocupación :</label>
                                <select class="form-control @error('ocupacione_id') is-invalid @enderror" name="ocupacione_id" value="{{ old('ocupacione_id') }}">
                                    <option value="">--Seleccione la ocupación--</option>
                                    @foreach($ocupaciones as $ocupacion)
                                        <option value="{{ $ocupacion->id }}">
                                            {{ $ocupacion->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ocupacione_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="escolaridade_id">Escolaridad :</label>
                                <select class="form-control @error('escolaridade_id') is-invalid @enderror" name="escolaridade_id" value="{{ old('escolaridade_id') }}">
                                    <option value="">--Seleccione la escolaridad--</option>
                                    @foreach($escolaridades as $escolaridad)
                                        <option value="{{ $escolaridad->id }}">
                                            {{ $escolaridad->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('escolaridade_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="estado_id">Estado civil :</label>
                                <select class="form-control @error('estado_id') is-invalid @enderror" name="estado_id">
                                    <option value="">--Seleccione el estado civil--</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->description }}</option>
                                    @endforeach
                                </select>
                                @error('estado_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="grupo_id">Grupo RH :</label>
                                <select class="form-control @error('grupo_id') is-invalid @enderror" name="grupo_id" value="{{ old('grupo_id') }}">
                                    <option value="">--Seleccione el grupo--</option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{ $grupo->id }}">
                                            {{ $grupo->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('grupo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="address">Dirección :</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="3"></textarea value="{{ old('address') }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <h5 class="text-uppercase">Datos Informante</h5>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="nameI">Nombre :</label>
                                <input type="text" name="nameI" class="form-control @error('nameI') is-invalid @enderror" value="{{ old('nameI') }}">
                                @error('nameI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="lastnamesI">Apellidos :</label>
                                <input type="text" name="lastnamesI" class="form-control @error('lastnamesI') is-invalid @enderror" value="{{ old('lastnamesI') }}">
                                @error('lastnamesI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="phone">Teléfono </label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="parentesco_id">Parentesco :</label>
                                <select class="form-control @error('parentesco_id') is-invalid @enderror" name="parentesco_id" value="{{ old('parentesco_id') }}">
                                    <option value="">--Seleccione el parentesco--</option>
                                    @foreach($parentescos as $parentesco)
                                        <option value="{{ $parentesco->id }}">
                                            {{ $parentesco->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parentesco_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Agregar Paciente</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    {{--  --}}
@endsection