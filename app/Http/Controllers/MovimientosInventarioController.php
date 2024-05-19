<?php

namespace App\Http\Controllers;

use App\Models\MovimientosInventario;
use Illuminate\Http\Request;

class MovimientosInventarioController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->tipo) && $request->tipo != 'todos'){
            $movimientos = MovimientosInventario::where('tipo',$request->tipo)->get();
        }else{
            $movimientos = MovimientosInventario::all();
        }

        return view('historial',compact('movimientos'));
    }


}
