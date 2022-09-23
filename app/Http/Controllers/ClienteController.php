<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $ci = Db::table('clientes')->select('id','NoCliente','Nombre','ApPaterno','ApMaterno','Telefono','Direccion','Ciudad','Descripcion','FechaContrato','idAntena','plan_id','user_id','zona_id','created_at','updated_at')->where('user_id','=',$id_user)->get();
        return view('clientes.index',['ci'=>$ci]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $zn = Db::table('zonas')->select('id','clave','nombre')->where('user_id','=',$id_user)->get();
        $pl = Db::table('plans')->select('id','plan','informacion')->where('user_id','=',$id_user)->get();
        return view('clientes.create',['zn'=>$zn,'pl'=>$pl]);
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
        $a = $request->zona_id;
        $zn = Db::table('zonas')->where('id','=',$a)->value('clave');
        $contar = DB::table('clientes')->where('user_id','=',$id_user)->count();
        $numero = $contar + 1;
        $ncliente = $zn."00".$numero;
        $Cliente = new Cliente();
        $Cliente->nocliente = $ncliente;
        $Cliente->nombre = $request->nombre;
        $Cliente->ApPaterno = $request->ApPaterno;
        $Cliente->ApMaterno = $request->ApMaterno;
        $Cliente->Telefono = $request->Telefono;
        $Cliente->Direccion = $request->direccion;
        $Cliente->Ciudad = $request->ciudad;
        $Cliente->Descripcion = $request->descripcion;
        $Cliente->FechaContrato = $request->FechaContrato;
        $Cliente->idAntena = $request->idantena;
        $Cliente->plan_id = $request->plan_id;
        $Cliente->zona_id = $request->zona_id;
        $Cliente->user_id = $id_user;
        $Cliente->save();
        if ($Cliente == null) {
             $notification = array(
                    'message' => 'ERROR. El Cliente no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Cliente registrado', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
