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
