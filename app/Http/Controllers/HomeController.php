<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin','empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        Carbon::setLocale('es');
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now();
        $f = $fecha->format('m');
        $ff = $fecha->format('Y-m-d');
        $c = Db::table('clientes')->selectRaw('COUNT(*) as total')->whereMonth('FechaContrato','=',$f)->get();
        $ct = Db::table('clientes')->selectRaw('COUNT(*) as total')->get();
        $t = DB::table('pagos')->where('user_id','=',$id_user)->whereMonth('Fecha','=',$f)->selectRaw('TRUNCATE(SUM(cantidad), 2) as u')->get();
        $at = Db::table('clientes')->where('user_id','=',$id_user)->where('fechaFin','<=',$ff)->selectRaw('COUNT(*) as total')->get();
        return view('home',compact('c','ct','t','at'));
    }

    public function verlista(Request $request){
        $request->user()->authorizeRoles(['user', 'admin','empresa']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        Carbon::setLocale('es');
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now();
        $ff = $fecha->format('Y-m-d');
        $ca = Db::table('clientes as c')->join('plans as p','p.id','=','c.plan_id')->join('zonas as z','z.id','=','c.zona_id')->where('c.user_id','=',$id_user)->where('c.fechaFin','<=',$ff)->select('c.id','p.precio','p.plan as pl','c.nombre','c.Appaterno','c.ApMaterno','c.FechaFin','z.Nombre as zona')->orderBy('c.FechaFin','desc')->paginate(15);
        return view('verlista',['ca'=>$ca]);
    }
}
