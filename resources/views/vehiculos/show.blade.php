<!-- Modal -->
<div class="modal fade" id="modalVehiculo{{ $vehiculo->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $vehiculo->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background-color: #FFF5F5;">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="modalLabel{{ $vehiculo->id }}"><i class="fas fa-car"></i>
                Detalles del Vehículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-dark" style="max-height: 70vh; overflow-y: auto;">
                <div class="row g-3"> 
                    <div class="col-md-6 col-12">
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-id-card"></i> Placa:
                        </strong> {{ $vehiculo->placa }}
                    </p>
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-car-side"></i> Marca:
                        </strong> {{ $vehiculo->marca }}
                    </p>
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-car"></i> Modelo:
                        </strong> {{ $vehiculo->modelo }}
                    </p>
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-calendar-alt"></i> Año de fabricación:
                        </strong> {{ $vehiculo->año_fabricacion }}
                    </p>
                    </div>
                    <div class="col-md-6 col-12">
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-user"></i> Cliente:
                        </strong> {{ $vehiculo->contacto->nombre }} {{ $vehiculo->contacto->apellido }}
                    </p>
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-file-alt"></i> Documento:
                        </strong> {{ $vehiculo->contacto->DNI }}
                    </p>
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-envelope"></i> Correo:
                        </strong> {{ $vehiculo->contacto->email }}
                    </p>
                    <p style="word-break: break-word; white-space: normal;">
                        <strong style="color: #C00000;">
                        <i class="fas fa-phone"></i> Teléfono:
                        </strong> {{ $vehiculo->contacto->telefono }}
                    </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<style>
    h1, h2, h3 {
    text-align: center;
    color: #C00000;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 20px;
    border-bottom: 2px solid #C00000;
    padding-bottom: 5px;
}

/* === Etiquetas === */
label {
    color: #C00000;
    font-weight: bold;
    display: block;
    margin-bottom: 6px;
}
</style>