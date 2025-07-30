@extends('layouts.app')

@section('content')
<div class="container">
    <h1><i class="fas fa-car-side"></i> Editar Vehículo</h1>
@include('messages')
    <form method="POST" action="{{ route('vehiculos.update', $vehiculo) }}">
        @csrf @method('PUT')
        @include('vehiculos.form', ['vehiculo' => $vehiculo])
        <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Actualizar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
    </form>
</div>
@endsection
