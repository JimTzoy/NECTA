<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class EmpleadoController extends Controller
{
    /**
     * Constructor del login
     */
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
        $em = Db::table('zonas')->where('user_id','=',$id_user)->first();
        if($em == null){
            $notification = array(
                'message' => 'Registre informacion de una zona ', 
                'alert-type' => 'error'  );
                return redirect()->action('App\Http\Controllers\ZonaController@index')->with($notification);
        }
        $emp = Db::table('empleados')->where('user_id','=',$id_user)->get();
        return view('empleados.index', compact('emp'));
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
        return view('empleados.create',['zn'=>$zn]);
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
        $Cliente = new Empleado();
        $Cliente->nombre = $request->nombre;
        $Cliente->ApPaterno = $request->ApPaterno;
        $Cliente->ApMaterno = $request->ApMaterno;
        $Cliente->Telefono = $request->Telefono;
        $Cliente->Direccion = $request->direccion;
        $Cliente->Ciudad = $request->ciudad;
        $Cliente->zona_id = $request->zona_id;
        $Cliente->user_id = $id_user;
        $Cliente->save();
        $d1 = (int)$Cliente->id;
        $imagen = "user.png";
        $nombre = $request->nombre." ".$request->ApPaterno;
        $email =  strtolower($request->nombre."_".$request->ApPaterno."@somosnecta.com.mx");
        $psw =  "somosnecta";
        $arr = $email;
        $user = User::create([
            'name' => $nombre,
            'email' => $email,
            'img' => $imagen,
            'password' => Hash::make($psw),
        ]);
        $user->roles()->attach(Role::where('id', $request->id)->first());
        $d = (int)$user->id;
        $empl = Empleado::findOrFail($d1);
        $empl->user_empleado= $d;
        $empl->save();
        
        if ($user == null) {
            $notification = array(
                   'message' => 'ERROR. El usuario no se ha registrado', 
                   'alert-type' => 'error'  );
             return back()->with($notification);
       }else{
        $notification = array(
                   'message' => 'EXITO. Usuario registrado', 
                   'alert-type' => 'success'  );
        return redirect()->route('detalles',compact('arr','psw'))->with($notification);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $em = Empleado::find($id);
        $emp = $em->Nombre."_".$em->ApPaterno."@somosnecta.com.mx";
        $vd = Db::table('users')->where('email','=',$emp)->first('id');
        $ids = $vd->id;
        User::find($ids)->delete();
        Empleado::find($id)->delete();
        $notification = array(
            'message' => 'EMPLEADO ELIMINADO EXITOSAMENTE', 
            'alert-type' => 'success');
        return back()->with($notification);
    }

    public function detalles($arr,$psw){

        $v = $arr;
        $f = $psw;

        return view('empleados.detalles',compact('v','f'));
    }
}
