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

    @livewire('paciente.paciente-component')

@endsection

@section('js')
    <script>
        window.livewire.on('pacienteEventoCrear', ()=>{
            $('#crearPaciente').modal('hide');
        })

        window.livewire.on('pacienteEventoActualizar', ()=>{
            $('#actualizarPaciente').modal('hide');
        })

        window.livewire.on('pacienteEventoMostrar', ()=>{
            $('#mostrarPaciente').modal('hide');
        })

        window.livewire.on('pacienteEventoEliminar', ()=>{
            $('#eliminarPaciente').modal('hide');
        })
    </script>
@endsection