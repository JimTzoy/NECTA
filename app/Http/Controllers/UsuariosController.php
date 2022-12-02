<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UsuariosController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $user = DB::table('users as u')->join('role_user as ru','ru.user_id','=','u.id')->join('roles as r','r.id','=','ru.role_id')->select('u.id','u.name as uname','u.img','u.created_at','u.updated_at','r.name as rname')->get();

        return view('usuarios.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $roles = DB::table('roles')->select('id','name','description')->get();
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = "user.png";
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'img' => $imagen,
            'password' => Hash::make($request['password']),
        ]);
        $user->roles()->attach(Role::where('id', $request->id)->first());
        
        if ($user == null) {
            $notification = array(
                   'message' => 'ERROR. El usuario no se ha registrado', 
                   'alert-type' => 'error'  );
             return back()->with($notification);
       }else{
        $notification = array(
                   'message' => 'EXITO. Usuario registrado', 
                   'alert-type' => 'success'  );
        return back()->with($notification);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
