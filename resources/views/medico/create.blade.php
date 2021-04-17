@extends('layouts.app')

@section('title_postfix', 'Medicos')

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
                <a class="text-uppercase" href="{{ route('medicos.index') }}">Medicos</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="text-uppercase">Datos del Medico</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('medicos.store') }}" method="POST">
                @csrf
                <div class="container">
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
                                <label class="text-muted" for="especialidade_id">Especialidad :</label>
                                <select class="form-control @error('especialidade_id') is-invalid @enderror" name="especialidade_id" value="{{ old('especialidade_id') }}">
                                    <option value="">--Seleccione el parentesco--</option>
                                    @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad->id }}">
                                            {{ $especialidad->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('especialidade_id')
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
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Agregar Medico</button>
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