<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $fillable = [
        'nombre',
        'precio',
        'activo',
    ];

    public function stock(){
        return $this->hasOne(Inventario::class, 'idProducto', 'id');
    }

    public function getEstatus(){
        if($this->activo == 1 ){
            return 'Activo';
        }else{
            return 'Inactivo';
        }
    }
}
