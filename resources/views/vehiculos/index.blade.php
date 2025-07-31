@extends('layouts.app')

@section('content')
<div class="container">
    <h1><i class="fas fa-car-side"></i> Vehículos Registrados</h1>
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus mr-2"></i> Registrar Vehículo</a>
    @include('messages')
    <table class="table table-bordered" id="tabla_vehiculos">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->placa }}</td>
                <td class="observaciones">{{ $vehiculo->marca }}</td>
                <td>{{ $vehiculo->modelo }}</td>
                <td class="observaciones">{{ $vehiculo->contacto->nombre }} {{ $vehiculo->contacto->apellido }}</td>
                <td>
                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVehiculo{{ $vehiculo->id }}"><i class="fas fa-eye mr-2"></i> Ver </button> @include('vehiculos.show', ['vehiculo' => $vehiculo])
                    <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-2"></i> Editar</a>
                    <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="form-eliminar" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-eliminar">
        <i class="fas fa-trash mr-2"></i> Eliminar
    </button>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabla = $('#tabla_vehiculos').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            },
            pageLength: 10,
            lengthChange: false, 
            info: false,         
            responsive: true,
            autoWidth: false,
            ordering: true,
            columnDefs: [
                { targets: -1, orderable: false } 
            ],
            dom: '<"original-search"f>rt<"d-flex justify-content-end mt-3"p>'
        });
        $('#buscador-wrapper').html($('.original-search').html());
        $('.original-search').remove(); 
        const forms = document.querySelectorAll('.form-eliminar');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); 
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción no se puede deshacer!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); 
                    }
                });
            });
        });
    });
</script>

@endsection
