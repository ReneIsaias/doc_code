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
                <a class="text-uppercase" href="{{ route('pacientes.index') }}">Nueva consulta</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="text-uppercase">Nueva consulta para el paciente {{ $paciente->name }} {{ $paciente->lastnames }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="unidad_id">Unidad Medica :</label>
                                <select class="form-control @error('unidad_id') is-invalid @enderror" name="unidad_id">
                                    <option value="">--Seleccione la unidad medica--</option>
                                    @foreach($unidades as $unidad)
                                        <option value="{{ $unidad->id }}">
                                            {{ $unidad->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unidad_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="medico_id">Nombre del medico :</label>
                                <select class="form-control @error('medico_id') is-invalid @enderror" name="medico_id">
                                    <option value="">--Seleccione el medico--</option>
                                    @foreach($medicos as $medico)
                                        <option value="{{ $medico->id }}">
                                            {{ $medico->name }} {{ $medico->lastnames }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('medico_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted text-uppercase">Antecedentes</h4>
                        <div class="col-12">
                            @foreach ($antecedentes as $antecedente)
                                <h5 class="text-muted" for="antecedente_id">{{ $antecedente->description }}</h5>
                                <hr>
                                <div class="row">
                                    @foreach ($antecedente->enfermedades as $enfermedad)
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="enfermedades_id_{{ $enfermedad->id }}"
                                                    value="{{$enfermedad->id}}" name="enfermedades[]"
                                                    @if( is_array(old('enfermedades')) && in_array("$enfermedad->id", old('enfermedades')) )
                                                        checked
                                                    @endif
                                                >
                                                <label class="custom-control-label"
                                                    for="enfermedades_id_{{ $enfermedad->id }}">
                                                    {{ $enfermedad->description }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div><br>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted text-uppercase">Interrogratorio por aparatos y sistemas</h4>
                        <div class="col-12">
                            @foreach ($aparatos as $aparato)
                                <label class="text-muted" for="aparato_id">{{ $aparato->description }}</label><br>
                                <input type="text" name="description_aparato[]" class="form-control @error('description_aparato') is-invalid @enderror"
                                    value="{{ old('description_aparato') }}"><br>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted text-uppercase">Exploración Física</h4>
                        <div class="col-12">
                            <div class="row">
                                @foreach ($tipos as $tipo)
                                    <div class="col-lg-3">                                    
                                        <label class="text-muted" for="tipo_id">{{ $tipo->description }}</label><br>
                                        <input type="text" name="description_tipo[]" class="form-control @error('description_tipo') is-invalid @enderror" value="{{ old('description_tipo') }}"><br>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted">Padecimiento actual</h4>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control @error('padecimiento') is-invalid @enderror" name="padecimiento" rows="5"></textarea>
                                @error('padecimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted">Diagnóstico</h4>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control @error('diagnostico') is-invalid @enderror" name="diagnostico" rows="3"></textarea>
                                @error('diagnostico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted">Indicaciones Terapeúticas</h4>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control @error('indicaciones') is-invalid @enderror" name="indicaciones" rows="3"></textarea>
                                @error('indicaciones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted">Tratamiento</h4>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control @error('tratamiento') is-invalid @enderror" name="tratamiento" rows="3"></textarea>
                                @error('tratamiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="text-muted">Pronóstico</h4>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control @error('pronostico') is-invalid @enderror" name="pronostico" rows="3"></textarea>
                                @error('pronostico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="form-group justify-content-start">
                {{-- <div wire:loading wire:loading.class="bg-white">Procesando datos...</div> --}}
            </div>
            <div class="justify-content-end">
                <button type="button" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>

@endsection

@section('js')
    {{--  --}}
@endsection