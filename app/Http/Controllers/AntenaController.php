<?php

namespace App\Http\Controllers;

use App\Models\Antena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AntenaController extends Controller
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
        $at = Db::table('antenas')->select('id','modo','nombre','ip','usuario','pssw','ssid','password','created_at','updated_at')->where('user_id','=',$id_user)->get();
        return view('antenas.index',['at'=>$at]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antenas.create');
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
        $antena = new Antena();
        $antena->modo = $request->modo;
        $antena->nombre = $request->nombre;
        $antena->ip = $request->ip;
        $antena->usuario = $request->usuario;
        $antena->pssw = $request->pssw;
        $antena->ssid = $request->ssid;
        $antena->password = $request->password;
        $antena->user_id = $id_user;
        $antena->save();
        if ($antena == null) {
             $notification = array(
                    'message' => 'ERROR. El plan no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Plan registrado', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function show(Antena $antena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function edit(Antena $antena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antena $antena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antena $antena)
    {
        //
    }
}
