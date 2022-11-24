<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->user()->authorizeRoles(['empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];

        $empresa = new Empresa();
        $empresa->NomComercial = $request->NomComercial;
        $empresa->NomFiscal = $request->NomFiscal;
        $empresa->Rfc = $request->Rfc;
        $empresa->Telefono = $request->Telefono;
        $empresa->Direccion = $request->Direccion;
        $empresa->Ciudad = $request->Ciudad;
        $empresa->CodigoPostal = $request->CodigoPostal;
        $empresa->Pais = $request->Pais;
        $empresa->Correo = $request->Correo;
        $empresa->user_id = $id_user;
        $empresa->save();
        if ($empresa == null) {
            $notification = array(
                   'message' => 'ERROR. Información de la empresa no actualizado', 
                   'alert-type' => 'error'  );
             return back()->with($notification);
       }else{
        $notification = array(
                   'message' => 'EXITO. Información actualizada', 
                   'alert-type' => 'success'  );
        return back()->with($notification);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['empresa']);
        $updates = Empresa::find($id)->update($request->all());
        if ($updates == null) {
            $notification = array(
                   'message' => 'ERROR. Información de la empresa no actualizado', 
                   'alert-type' => 'error'  );
             return back()->with($notification);
       }else{
        $notification = array(
                   'message' => 'EXITO. Información actualizada', 
                   'alert-type' => 'success'  );
        return back()->with($notification);
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
