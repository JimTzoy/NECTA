<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin','empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $pago = DB::table('pagos')->select('id','cantidad','fecha','tipo','created_at')->where($id_user, '==','user_id')->get();
        return view('pagos.index',['pg'=>$pago]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['empresa']);
       return view('pagos.create');
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
        $pago = new Pagos();
        $pago->cantidad = $request->cantidad;
        $pago->fecha = $request->fecha;
        $pago->observaciones = $request->observaciones;
        $pago->tipo = $request->tipo;
        $pago->user_id = $id_user;
        $pago->cliente_id = $request->idcliente;
        $pago->save();
        $id = $request->idcliente;
        $f = date($request->FechaFin);
        $ffa = date("Y-m-d",strtotime($f.'+1 month'));
        $cliente = Cliente::findOrFail($id);
        $cliente->FechaInicio = $request->FechaFin;
        $cliente->FechaFin = $ffa;
        $cliente->save();

        if ($cliente == null) {
             $notification = array(
                    'message' => 'ERROR. El pago no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Plan registrado', 
                    'alert-type' => 'success'  );
                    return redirect()->action('App\Http\Controllers\ClienteController@show', [$request->idcliente])->with($notification);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PagosController  $pagosController
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['empresa']);
        $idc = $id;
        $user_id[] = Auth::user();
        $cte = Cliente::find($id);
        $zn = Db::table('zonas')->select('id','clave','nombre')->get();
        $pago = DB::table('pagos')->select('id','cantidad','fecha','tipo','created_at','updated_at')->where('cliente_id','=',$id)->get();
        return view('pagos.show',compact('cte','idc'),['zn'=>$zn,'pg'=>$pago]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PagosController  $pagosController
     * @return \Illuminate\Http\Response
     */
    public function edit(PagosController $pagosController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PagosController  $pagosController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PagosController $pagosController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PagosController  $pagosController
     * @return \Illuminate\Http\Response
     */
    public function destroy(PagosController $pagosController)
    {
        //
    }
}
