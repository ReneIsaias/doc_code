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

    @livewire('medico.medico-component')

@endsection

@section('js')
    <script>
        window.livewire.on('medicoEventoCrear', ()=>{
            $('#crearMedico').modal('hide');
        })

        window.livewire.on('medicoEventoActualizar', ()=>{
            $('#actualizarMedico').modal('hide');
        })

        window.livewire.on('medicoEventoMostrar', ()=>{
            $('#mostrarMedico').modal('hide');
        })

        window.livewire.on('medicoEventoEliminar', ()=>{
            $('#eliminarMedico').modal('hide');
        })
    </script>
@endsection