<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\MovimientosInventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
    public function entradaProducto(Request $request){
        $inventario = Inventario::find($request->id);
        $cantidad = $inventario->cantidad;
        $request->validate([
            'id' => 'required',
            'cantidad' => ['required','numeric','min:'.$cantidad],
        ]);

        $inventario->update([
            'cantidad' => $request->cantidad
        ]);

        $mi = new MovimientosInventario();
        $mi->idInventario = $inventario->id;
        $mi->cantidadAntes = $cantidad;
        $mi->cantidadDespues = $inventario->cantidad;
        $mi->tipo = 'entrada';
        $mi->idUsuario = Auth::user()->id;
        $mi->save();

        return redirect(route('productos'))->with('informacion','Se registro la entrada del producto');
    }
}
