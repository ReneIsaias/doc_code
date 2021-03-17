{{-- Extendemos del layout principal --}}
@extends('layouts.app')

{{-- Le asignamos en sufijo al titlo de la pagina --}}
@section('title_postfix', 'Home')

{{-- Agregamos un header arriba del contente --}}
@section('content_header')
    <div class="card">
        pagina
    </div>
@endsection

{{-- En esta section va nuestro content --}}
@section('content')

    <div class="card">
        Welcome
    </div>
    <hr>
    {{ $message }}

@endsection