<?php

namespace App\Models;

use DateTime;
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

    public function inventario(){
        return $this->belongsTo(Inventario::class, 'idInventario');
    }

    public function user(){
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function getFecha(){
        $fecha = new DateTime($this->created_at);
        return $fecha->format('d/m/Y');
    }

    public function getHora(){
        $fecha = new DateTime($this->created_at);
        return $fecha->format('H:i:s');
    }
}
