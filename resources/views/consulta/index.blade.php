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

    @livewire('consulta.consulta-component')

@endsection

@section('js')
    <script>
        window.livewire.on('consultaEventoCrear', ()=>{
            $('#crearConsulta').modal('hide');
        })

        window.livewire.on('consultaEventoActualizar', ()=>{
            $('#actualizarConsulta').modal('hide');
        })

        window.livewire.on('consultaEventoMostrar', ()=>{
            $('#mostrarConsulta').modal('hide');
        })

        window.livewire.on('consultaEventoEliminar', ()=>{
            $('#eliminarConsulta').modal('hide');
        })
    </script>
@endsection