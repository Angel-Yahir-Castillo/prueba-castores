<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientosInventario extends Model
{
    use HasFactory;

    protected $table = "movimientoInventario";

    protected $fillable = [
        'idInventario',
        'cantidadAntes',
        'cantidadDespues',
        'tipo',
        'idUsuario'
    ];
}
