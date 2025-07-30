<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'año_fabricacion',
        'nombre_cliente',
        'apellidos_cliente',
        'documento_cliente',
        'correo_cliente',
        'telefono_cliente',
    ];
}
