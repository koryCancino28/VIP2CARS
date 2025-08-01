<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model {
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'telefono', 'DNI', 'email', 'vehiculo_id'];
    public function vehiculo() {
        return $this->belongsTo(Vehiculo::class);
    }
}
