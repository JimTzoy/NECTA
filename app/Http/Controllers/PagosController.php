<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pagos;
use App\Models\TipoPago;
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
        if($request->tipo == 1){
            $cliente->tipopago()->attach(TipoPago::where('id', $request->tipo)->first(),['nombre'=>$request->nombre,'FechaInicio'=>$request->FechaFin,'FechaFin'=>$ffa]);
        }else{
            $imagen = $request['img'];
            //COMPRUEBA QUE SE AYA SELECCIONADO UNA IMAGEN
            if($imagen == null){
            $notification = array(
                'message' => 'ERROR. NECESITA ELEGIR UNA IMAGEN', 
                'alert-type' => 'error'  );
            return back()->with($notification);
            }else{
            //OPTIENE EL NOMBRE DE LA IMAGEN
            $nombre = time().$imagen->getClientOriginalName();
            //LO MUEVE A LA CARPETA U LO GUARDA CON EL NOMBRE OPTENIDO
            $imagen->move('img/comprobantes/', $nombre);
            //$imagen->move(public_path().'/img/perfil/',$nombre);
            $cliente->tipopago()->attach(TipoPago::where('id', $request->tipo)->first(),['img'=>$nombre,'FechaInicio'=>$request->FechaFin,'FechaFin'=>$ffa]);
            }
        }
        
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
        $pago = Pagos::find($id);
        $idcliente = $pago->cliente_id;
        $cte = Cliente::find($idcliente);
        $idv = $pago->id;
        $va = Db::table('cliente_tipo_pago')->where('id','=',$idv)->get();
        return view('pagos.show',compact('cte','va','pago'));
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

    /**
     * FUNCION PARA LA VISTA DEL RECIBO
     */
    public function ticket(Request $request, $id){
        $request->user()->authorizeRoles(['empresa']);
        $idc = $id;
        $user_id[] = Auth::user();
        $pago = Pagos::find($id);
        $idcliente = $pago->cliente_id;
        $cte = Cliente::find($idcliente);
        $idv = $pago->id;
        $va = Db::table('cliente_tipo_pago')->where('id','=',$idv)->get();
        return view('pagos.ticket',compact('cte','va','pago'));
    }
    /**
     * FUNCION PARA IMPRMIR LA EL RECIBO DE PAGO
     */
    /**
     * FUNCION PARA IMPRIMIR LA VISTA FORMATO
     */
    public function imprimirticket(Request $request, $id){
    $request->user()->authorizeRoles(['empresa']);
    $idc = $id;
        $user_id[] = Auth::user();
        $pago = Pagos::find($id);
        $idcliente = $pago->cliente_id;
        $cte = Cliente::find($idcliente);
        $idv = $pago->id;
        $va = Db::table('cliente_tipo_pago')->where('id','=',$idv)->get();
    $pdf = \PDF::loadView('pagos.ticket', compact('cte','va','pago'));

    return $pdf->download('Ticeket'.'.pdf');
    
    }
}
