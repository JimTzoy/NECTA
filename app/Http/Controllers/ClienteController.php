<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $v = $request->get('busqueda');
        //$ci = Db::table('clientes')->select('id','NoCliente','Nombre','ApPaterno','ApMaterno','Telefono','Direccion','Ciudad','Descripcion','FechaContrato','idAntena','plan_id','user_id','zona_id','created_at','updated_at')->where('user_id','==',$id_user)->orwhere('Nombre','like', "%$v%")->orwhere('ApPaterno','like', "%$v%")->orwhere('ApMaterno','like', "%$v%")->paginate(10);
        //var_dump($ci);
        $ci = Db::table('clientes')->select('id','NoCliente','Nombre','ApPaterno','ApMaterno','Telefono','Direccion','Ciudad','Descripcion','FechaContrato','idAntena','plan_id','user_id','zona_id','created_at','updated_at')->where('user_id','=',$id_user)->where([['Nombre','like', "%$v%"],['ApPaterno','like', "%$v%"],['ApMaterno','like', "%$v%"]])->paginate(10);
    
        return view('clientes.index',compact('id_user'),['ci'=>$ci]);
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
        $zn = Db::table('zonas')->select('id','clave','ip','nombre')->where('user_id','=',$id_user)->get();
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
        $contar = DB::table('clientes')->orderByDesc('id')->where('user_id','=',$id_user)->value('nocliente');
        $n = substr($contar, -3);
        if ($n == null) {
            $n = 0;
        }
        $numero = $n + 1;
        if($numero >= 10) {
            if($numero >= 100){
                $ncliente = $zn."".$numero;
            }else{
                $ncliente = $zn."0".$numero;
            }
          
        }else{
            $ncliente = $zn."00".$numero;
        }
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
        $Cliente->FechaInicio = $request->FechaContrato;
        $ff = date("Y-m-d",strtotime($request->FechaContrato."+1 month"));
        $Cliente->FechaFin = $ff;
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
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles(['empresa']);
        $idc = $id;
        $user_id[] = Auth::user();
        $cte = Cliente::find($id);
        $zn = Db::table('zonas')->select('id','clave','nombre')->get();
        $pago = DB::table('pagos')->select('id','cantidad','fecha','tipo','created_at','updated_at')->where('cliente_id','=',$id)->orderBy('fecha','desc')->paginate(5);
        $tipoPago = DB::table('tipo_pagos')->select('id','name')->get();
        return view('clientes.show',compact('cte','idc'),['zn'=>$zn,'pg'=>$pago,'tp'=>$tipoPago]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $cliente =  Cliente::find($id);
        $zn = Db::table('zonas')->select('id','clave','ip','nombre')->where('user_id','=',$id_user)->get();
        $pl = Db::table('plans')->select('id','plan','informacion')->where('user_id','=',$id_user)->get();
        return view('clientes.edit', compact('cliente'),['zn'=>$zn,'pl'=>$pl]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['empresa']);
        $updates = Cliente::find($id)->update($request->all());
        if ($updates == TRUE) {
            $notification = array(
                'message' => 'CONTRATO ACTUALIZADO EXITOSAMENTE', 
                'alert-type' => 'success');
         return redirect()->action('App\Http\Controllers\ClienteController@show', [$id])->with($notification);  
        }else{
            $notification = array(
                'message' => 'NADA ACTUALIZADO', 
                'alert-type' => 'danger');
            return redirect()->action('App\Http\Controllers\ClienteController@show', [$id])->with($notification);  
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();
        $notification = array(
            'message' => 'PAGO ELIMINADO EXITOSAMENTE', 
            'alert-type' => 'success');
        return back()->with($notification);
    }

    /**
     * FUNCION PARA MOSTRAR LA VISTA A IMPRIMIR DE LOS CLIENTES
     * 
     */
    public function formato(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $request->user()->authorizeRoles(['empresa']);
        $ci = Db::table('clientes')->where('user_id','=',$id_user)->get();
        $pl = Db::table('plans')->select('id','precio')->where('user_id','=',$id_user)->get();
        return view('clientes.formato',compact('id_user'),['ci'=>$ci,'pl'=>$pl]);
    }
    /**
     * FUNCION PARA MOSTRAR LA VISTA A IMPRIMIR DE LOS CLIENTES
     * 
     */
    public function LISTA_CLIENTES(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $request->user()->authorizeRoles(['empresa']);
        $ci = Db::table('clientes')->where('user_id','=',$id_user)->get();
        $pl = Db::table('plans')->select('id','precio')->where('user_id','=',$id_user)->get();
        return view('clientes.LISTA_CLIENTES',compact('id_user'),['ci'=>$ci,'pl'=>$pl]);
    }
    /**
     * FUNCION PARA IMPRIMIR LA VISTA FORMATO
     */
    public function imprimir(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
    Carbon::setLocale('es');
    $request->user()->authorizeRoles(['empresa']);
    $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $request->user()->authorizeRoles(['empresa']);
        $ci = Db::table('clientes')->where('user_id','=',$id_user)->get();
        $pl = Db::table('plans')->select('id','precio')->where('user_id','=',$id_user)->get();
    
    $pdf = \PDF::loadView('clientes.LISTA_CLIENTES', compact('id_user'), ['ci'=>$ci,'pl'=>$pl])->setPaper('letter', 'landscape');

    return $pdf->download('LISTA_CLIENTES'.'.pdf');
    
    }
}
