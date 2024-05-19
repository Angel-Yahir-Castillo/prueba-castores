<?php

namespace App\Http\Controllers;

use App\Models\MovimientosInventario;
use Illuminate\Http\Request;

class MovimientosInventarioController extends Controller
{

    public function index()
    {
        $movimientos = MovimientosInventario::all();
        return view('historial',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MovimientosInventario $movimientosInventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovimientosInventario $movimientosInventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovimientosInventario $movimientosInventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovimientosInventario $movimientosInventario)
    {
        //
    }
}
