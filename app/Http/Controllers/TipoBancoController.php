<?php

namespace App\Http\Controllers;

use App\Models\Ingresos;
use App\Models\Gastos;
use App\Models\TipoBanco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoBancoController extends Controller
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
        $request->user()->authorizeRoles(['finanzas']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $tpg_id = 34;
        $tpi_id = 22;
        $bancog = TipoBanco::first('ntb')->findOrFail($request->tpb_id);
        $bancoi = TipoBanco::first('ntb')->findOrFail($request->tpb_ide);
        try {
            DB::beginTransaction();
    
        $nrtg = Gastos::create([
            'cantidad' => $request->cantidad,
            'user_id' => $id_user,
            'tpg_id' => $tpg_id,
            'tpb_id' => $request->tpb_id,
            'concepto' =>$bancog,
        ]);
        $nrti =  Ingresos::create([
            'cantidad' => $request->cantidad,
            'user_id' => $id_user,
            'tpi_id' => $tpi_id,
            'tpb_id' => $request->tpb_ide,
            'concept'=> $bancoi,
            
        ]);
        if ($nrtg) {
            DB::commit();
            return back()->with([
                'message' => 'ÉXITO. Ingreso registrado',
                'alert-type' => 'success'
            ]);
        } else {
            throw new \Exception('Error al insertar datos');
        }
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with([
            'message' => 'ERROR. El ingreso no se ha registrado',
            'alert-type' => 'error'
        ]);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoBanco  $tipoBanco
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['finanzas']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $banco = TipoBanco::with(['ingresos' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'gastos' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return view('bancos.show',compact('banco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoBanco  $tipoBanco
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoBanco $tipoBanco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoBanco  $tipoBanco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoBanco $tipoBanco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoBanco  $tipoBanco
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoBanco $tipoBanco)
    {
        //
    }
}
