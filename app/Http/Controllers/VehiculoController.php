<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

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
        $request->validate([
            'placa' => 'required|unique:vehiculos|max:10',
            'marca' => 'required',
            'modelo' => 'required',
            'año_fabricacion' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nombre_cliente' => 'required',
            'apellidos_cliente' => 'required',
            'documento_cliente' => 'required',
            'correo_cliente' => 'required|email',
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
            'correo_cliente.required' => 'El correo electrónico del cliente es obligatorio.',
            'correo_cliente.email' => 'El correo electrónico debe ser válido.',
            'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado correctamente.');
    }

    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
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
            'documento_cliente' => 'required',
            'correo_cliente' => 'required|email',
            'telefono_cliente' => 'required',
        ],
    [
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
        'correo_cliente.required' => 'El correo electrónico del cliente es obligatorio.',
        'correo_cliente.email' => 'El correo electrónico debe ser válido.',
        'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
    ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
