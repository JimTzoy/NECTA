<?php

namespace App\Http\Controllers;

use App\Models\Ingresos;
use App\Models\TipoBanco;
use App\Models\TipoIngreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IngresosController extends Controller
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
        // Recupera todos los ingresos
        //$ingresos = ingresos::all(); 
        $ingresos = Ingresos::with('tipoBanco', 'tipoIngreso')->get();
        // Recupera todos tipos de los ingresos
        $tpi = TipoIngreso::all();
        $tpb = TipoBanco::all();
        // Pasa los datos a una vista para mostrarlos
        return view('ingresos.index', ['ingresos' => $ingresos,'tpi' => $tpi, 'tpb'=>$tpb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['finanzas']);
       // Recupera todos tipos de los ingresos
       $tpi = TipoIngreso::all();
       $tpb = TipoBanco::all();
      

       // Pasa los datos a una vista para mostrarlos
       return view('ingresos.create', ['tpi' => $tpi, 'tpb'=>$tpb]);
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
    
            $nrt =  Ingresos::create([
                'cantidad' => $request->cantidad,
                'user_id' => $id_user,
                'tpi_id' => $request->tpi_id,
                'tpb_id' => $request->tpb_id,
                
            ]);
    
            if ($nrt) {
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
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function show(ingresos $ingresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function edit(ingresos $ingresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ingresos $ingresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ingresos $ingresos)
    {
        //
    }
}
