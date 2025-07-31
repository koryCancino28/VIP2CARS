@php
    $contacto = $vehiculo->contacto ?? null;
@endphp

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="placa" class="form-label fw-bold text-danger text-uppercase">Placa</label>
            <input type="text" id="placa" name="placa" class="form-control border-danger" 
                value="{{ old('placa', $vehiculo->placa ?? '') }}" 
                placeholder="Ej: ABC123" required>
            @error('placa')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="marca" class="form-label fw-bold text-danger text-uppercase">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control border-danger" 
                value="{{ old('marca', $vehiculo->marca ?? '') }}" 
                placeholder="Ej: Toyota" required>
            @error('marca')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="modelo" class="form-label fw-bold text-danger text-uppercase">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control border-danger" 
                value="{{ old('modelo', $vehiculo->modelo ?? '') }}" 
                placeholder="Ej: Corolla" required>
            @error('modelo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="año_fabricacion" class="form-label fw-bold text-danger text-uppercase">Año de fabricación</label>
            <input type="number" id="año_fabricacion" name="año_fabricacion" 
                class="form-control border-danger" 
                value="{{ old('año_fabricacion', $vehiculo->año_fabricacion ?? '') }}" 
                min="1900" max="{{ date('Y') }}" placeholder="Ej: 2020" required>
            @error('año_fabricacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <hr class="my-4 border-danger">

    <h4 class="text-center text-danger fw-bold text-uppercase mb-4">Datos del Cliente</h4>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="nombre_cliente" class="form-label fw-bold text-danger">Nombre(s)</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control border-danger" 
                value="{{ old('nombre_cliente', $contacto->nombre ?? '') }}" 
                placeholder="Ingrese nombre(s)" required>
            @error('nombre_cliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="apellidos_cliente" class="form-label fw-bold text-danger">Apellidos</label>
            <input type="text" id="apellidos_cliente" name="apellidos_cliente" class="form-control border-danger" 
                value="{{ old('apellidos_cliente', $contacto->apellido ?? '') }}" 
                placeholder="Ingrese apellidos" required>
            @error('apellidos_cliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="documento_cliente" class="form-label fw-bold text-danger">Nro. de Documento</label>
            <input type="text" id="documento_cliente" name="documento_cliente" class="form-control border-danger" 
                value="{{ old('documento_cliente', $contacto->DNI ?? '') }}" 
                placeholder="Ej: 12345678" required pattern="\d+">
            @error('documento_cliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="correo_cliente" class="form-label fw-bold text-danger">Correo</label>
            <input type="email" id="correo_cliente" name="correo_cliente" class="form-control border-danger" 
                value="{{ old('correo_cliente', $contacto->email ?? '') }}" 
                placeholder="ejemplo@correo.com" required>
            @error('correo_cliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="telefono_cliente" class="form-label fw-bold text-danger">Teléfono</label>
            <input type="tel" id="telefono_cliente" name="telefono_cliente" class="form-control border-danger" 
                value="{{ old('telefono_cliente', $contacto->telefono ?? '') }}" 
                placeholder="Ej: 987654321" required pattern="[0-9]{7,15}" 
                title="Solo números, entre 7 y 15 dígitos" 
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
            @error('telefono_cliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

