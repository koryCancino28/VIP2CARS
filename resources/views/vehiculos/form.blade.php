<div class="mb-3">
    <label>Placa:</label>
    <input type="text" name="placa" class="form-control" value="{{ old('placa', $vehiculo->placa ?? '') }}">
</div>
<div class="mb-3">
    <label>Marca:</label>
    <input type="text" name="marca" class="form-control" value="{{ old('marca', $vehiculo->marca ?? '') }}">
</div>
<div class="mb-3">
    <label>Modelo:</label>
    <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $vehiculo->modelo ?? '') }}">
</div>
<div class="mb-3">
    <label>Año de Fabricación:</label>
    <input  type="number" name="año_fabricacion"  class="form-control" value="{{ old('anio_fabricacion', $vehiculo->anio_fabricacion ?? '') }}"
    min="1900" max="{{ date('Y') }}" maxlength="4" placeholder="Ingrese el año de fabricación"/>
</div>
<div class="mb-3">
    <label>Nombre del Cliente:</label>
    <input type="text" name="nombre_cliente" class="form-control" value="{{ old('nombre_cliente', $vehiculo->nombre_cliente ?? '') }}">
</div>
<div class="mb-3">
    <label>Apellidos del Cliente:</label>
    <input type="text" name="apellidos_cliente" class="form-control" value="{{ old('apellidos_cliente', $vehiculo->apellidos_cliente ?? '') }}">
</div>
<div class="mb-3">
    <label>Nro. de Documento:</label>
    <input type="text" name="documento_cliente" class="form-control" value="{{ old('documento_cliente', $vehiculo->documento_cliente ?? '') }}">
</div>
<div class="mb-3">
    <label>Correo:</label>
    <input type="email" name="correo_cliente" class="form-control" value="{{ old('correo_cliente', $vehiculo->correo_cliente ?? '') }}">
</div>
<div class="mb-3">
    <label>Teléfono:</label>
    <input type="text" name="telefono_cliente" class="form-control" value="{{ old('telefono_cliente', $vehiculo->telefono_cliente ?? '') }}">
</div>
