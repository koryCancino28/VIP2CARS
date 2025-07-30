<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'placa' => 'required|unique:vehiculos|max:10',
        'marca' => 'required',
        'modelo' => 'required',
        'año_fabricacion' => 'required|digits:4|integer|min:1900|max:' . date('Y'),

        'nombre_cliente' => 'required',
        'apellidos_cliente' => 'required',
        'documento_cliente' => 'required|unique:contactos,DNI',
        'correo_cliente' => 'required|email|unique:contactos,email',
        'telefono_cliente' => 'required',
    ], [
        'placa.required' => 'La placa es obligatoria.',
        'placa.unique' => 'La placa ya está registrada.',
        'placa.max' => 'La placa no puede tener más de 10 caracteres.',
        'marca.required' => 'La marca es obligatoria.',
        'modelo.required' => 'El modelo es obligatorio.',
        'año_fabricacion.required' => 'El año de fabricación es obligatorio.',
        'año_fabricacion.digits' => 'El año de fabricación debe tener 4 dígitos.',
        'año_fabricacion.integer' => 'El año de fabricación debe ser un número entero.',
        'año_fabricacion.min' => 'El año de fabricación no puede ser anterior a 1900.',
        'año_fabricacion.max' => 'El año de fabricación no puede ser mayor al año actual.',

        'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
        'apellidos_cliente.required' => 'Los apellidos del cliente son obligatorios.',
        'documento_cliente.required' => 'El documento del cliente es obligatorio.',
        'documento_cliente.unique' => 'El documento ya está registrado.',
        'correo_cliente.required' => 'El correo electrónico del cliente es obligatorio.',
        'correo_cliente.email' => 'El correo electrónico debe ser válido.',
        'correo_cliente.unique' => 'El correo ya está registrado.',
        'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
    ]);

    DB::beginTransaction();

    try {
        // Crear el vehículo
        $vehiculo = Vehiculo::create([
            'placa' => $validated['placa'],
            'marca' => $validated['marca'],
            'modelo' => $validated['modelo'],
            'año_fabricacion' => $validated['año_fabricacion'],
        ]);

        // Crear el contacto asociado al vehículo
        Contacto::create([
            'nombre' => $validated['nombre_cliente'],
            'apellido' => $validated['apellidos_cliente'],
            'telefono' => $validated['telefono_cliente'],
            'email' => $validated['correo_cliente'],
            'DNI' => $validated['documento_cliente'],
            'vehiculo_id' => $vehiculo->id,
        ]);

        DB::commit();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo y contacto registrados correctamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Ocurrió un error: ' . $e->getMessage())->withInput();
    }
}


    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit($id) {
        $vehiculo = Vehiculo::with('contacto')->findOrFail($id);
        return view('vehiculos.edit', compact('vehiculo'));
    }
    public function update(Request $request, Vehiculo $vehiculo)
{
    $request->validate([
        'placa' => 'required|max:10|unique:vehiculos,placa,' . $vehiculo->id,
        'marca' => 'required',
        'modelo' => 'required',
        'año_fabricacion' => 'required|digits:4|integer|min:1900|max:' . date('Y'),

        'nombre_cliente' => 'required',
        'apellidos_cliente' => 'required',
        'documento_cliente' => 'required|unique:contactos,DNI,' . $vehiculo->contacto->id,
        'correo_cliente' => 'required|email|unique:contactos,email,' . $vehiculo->contacto->id,
        'telefono_cliente' => 'required',
    ], [
        'placa.required' => 'La placa es obligatoria.',
        'placa.unique' => 'La placa ya está registrada.',
        'placa.max' => 'La placa no puede tener más de 10 caracteres.',
        'marca.required' => 'La marca es obligatoria.',
        'modelo.required' => 'El modelo es obligatorio.',
        'año_fabricacion.required' => 'El año de fabricación es obligatorio.',
        'año_fabricacion.digits' => 'El año de fabricación debe tener 4 dígitos.',
        'año_fabricacion.integer' => 'El año de fabricación debe ser un número entero.',
        'año_fabricacion.min' => 'El año de fabricación no puede ser anterior a 1900.',
        'año_fabricacion.max' => 'El año de fabricación no puede ser mayor al año actual.',

        'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
        'apellidos_cliente.required' => 'Los apellidos del cliente son obligatorios.',
        'documento_cliente.required' => 'El documento del cliente es obligatorio.',
        'documento_cliente.unique' => 'El documento ya está registrado.',
        'correo_cliente.required' => 'El correo electrónico del cliente es obligatorio.',
        'correo_cliente.email' => 'El correo electrónico debe ser válido.',
        'correo_cliente.unique' => 'El correo electrónico ya está registrado.',
        'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
    ]);

    DB::beginTransaction();

    try {
        // Actualizar vehículo
        $vehiculo->update([
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'año_fabricacion' => $request->año_fabricacion,
        ]);

        // Actualizar contacto asociado
        $vehiculo->contacto->update([
            'nombre' => $request->nombre_cliente,
            'apellido' => $request->apellidos_cliente,
            'DNI' => $request->documento_cliente,
            'email' => $request->correo_cliente,
            'telefono' => $request->telefono_cliente,
        ]);

        DB::commit();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo y contacto actualizados correctamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Error al actualizar: ' . $e->getMessage())->withInput();
    }
}

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
