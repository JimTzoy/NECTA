<?php

namespace App\Http\Controllers;

use App\Models\Gastos;
use App\Models\TipoBanco;
use App\Models\TipoGasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class GastosController extends Controller
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
        $request->user()->authorizeRoles(['finanzas']);
        // Recupera todos los gastos
        //$gastos = Gastos::all(); 
        $gastos = Gastos::with('tipoBanco', 'tipoGasto')->get();

        // Pasa los datos a una vista para mostrarlos
        return view('gastos.index', ['gastos' => $gastos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['finanzas']);
       // Recupera todos tipos de los gastos
       $tpg = TipoGasto::all();
       $tpb = TipoBanco::all();

       // Pasa los datos a una vista para mostrarlos
       return view('gastos.create', ['tpg' => $tpg, 'tpb'=>$tpb]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['finanzas']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        try {
            DB::beginTransaction();
    
            $nrt = Gastos::create([
                'cantidad' => $request->cantidad,
                'user_id' => $id_user,
                'tpg_id' => $request->tpg_id,
                'tpb_id' => $request->tpb_id,
                
            ]);
    
            if ($nrt) {
                DB::commit();
                return back()->with([
                    'message' => 'ÉXITO. Gasto registrado',
                    'alert-type' => 'success'
                ]);
            } else {
                throw new \Exception('Error al insertar datos');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with([
                'message' => 'ERROR. El gasto no se ha registrado',
                'alert-type' => 'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function show(Gastos $gastos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function edit(Gastos $gastos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gastos $gastos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gastos $gastos)
    {
        //
    }
}
