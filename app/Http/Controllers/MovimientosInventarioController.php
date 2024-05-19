<?php

namespace App\Http\Controllers;

use App\Models\MovimientosInventario;
use Illuminate\Http\Request;

class MovimientosInventarioController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->tipo) && $request->tipo != 'todos'){
            $movimientos = MovimientosInventario::where('tipo',$request->tipo)->orderby('created_at','desc')->get();
        }else{
            $movimientos = MovimientosInventario::orderby('created_at','desc')->get();
        }

        return view('historial',compact('movimientos'));
    }


}
