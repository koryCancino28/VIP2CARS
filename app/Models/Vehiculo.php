<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model {
    use HasFactory;
    protected $fillable = ['placa', 'marca', 'modelo', 'año_fabricacion'];
    public function contacto() {
    return $this->hasOne(Contacto::class);
}

}
