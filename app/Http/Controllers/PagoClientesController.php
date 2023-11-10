<?php

namespace App\Http\Controllers;

use App\Models\PagoClientes;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $user_id)
    {
        $v = $request->get('busqueda');
        $idu = $user_id;
        return view('pclient.index',compact('idu'));
    }
    /**
     * buacaddor
     */
    public function buscador(Request $request){
        $v = $request->busqueda;
        $user_id = $request->id;
        $client = Db::table('clientes')
                    ->where('user_id','=',$user_id)
                    ->where('Nombre','like', "%$v%")
                    ->orwhere('ApPaterno','like', "%$v%")
                    ->orWhere('ApMaterno','like', "%$v%")
                    ->paginate(10);
        $tp = Db::table('tipo_pagos')->get();
        return view('pclient.buscador',compact('client','user_id'),['tp'=>$tp]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PagoClientes  $pagoClientes
     * @return \Illuminate\Http\Response
     */
    public function show(PagoClientes $pagoClientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PagoClientes  $pagoClientes
     * @return \Illuminate\Http\Response
     */
    public function edit(PagoClientes $pagoClientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PagoClientes  $pagoClientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PagoClientes $pagoClientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PagoClientes  $pagoClientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PagoClientes $pagoClientes)
    {
        //
    }
}
