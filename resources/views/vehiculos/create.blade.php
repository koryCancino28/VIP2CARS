@extends('layouts.app')

@section('content')
<div class="container">
    <h1><i class="fas fa-car-side"></i> Registrar Vehículo</h1>
@include('messages')

    <form method="POST" action="{{ route('vehiculos.store') }}">
        @csrf
        @include('vehiculos.form')
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
    </form>
</div>
@endsection
