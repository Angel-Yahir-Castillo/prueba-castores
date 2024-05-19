<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::all();
        return view('productos',compact('productos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $producto = new Productos();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->save();

        $inventario = new Inventario();
        $inventario->idProducto = $producto->id;
        $inventario->save();
        return redirect(route('productos'))->with('informacion','Se agregó el nuevo producto al inventario');
    }

    public function cambiarEstatus($id){
        $producto = Productos::find($id);
        if($producto->activo == 1){
            $producto->update([
                'activo' => 0,
            ]);
        }else{
            $producto->update([
                'activo' => 1,
            ]);
        }

        return redirect(route('productos'))->with('informacion','Estatus actualizado con exito');
    }
}
