<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Companies;

class UserController extends Controller
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
        $users = User::where('deleted','=',0)->get();
        $companies = Companies::all();
        return view('usuarios.listado', compact('users','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        $companies = Companies::all();

        return view('usuarios.editar',compact('user','companies'));
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
        $this->validateUser($request);
        $company = Companies::where('name', $request['company_id'])->first();
        $usuario = User::findOrFail($id);

        $user = array(
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'email' => $request->email,
            'company_id' => $company['id'],
            'password' => $request->password != "" ? Hash::make($request->password) : $usuario->password,
        );

        User::whereId($id)->update($user);
        return redirect('/usuarios')->with('message','Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id){

        $user = User::where('id', $id)->first();

        /* Si no existe, redirige a la ruta principal */
        if (! $user)
            return redirect('/') ->with('message','El usuario no existe o ya ha sido eliminado');

        $user->deleted = 1;
        $user->save();

        return redirect('/usuarios')->with('message','Usuario eliminado');

    }

    public function destroy($id)
    {
        //
    }

    public function validateUser(Request $request){

        $request->validate([
            'firstname' => 'required|max:15', // forums es la tabla dónde debe ser único
            'secondname' => 'required|max:50',
            'email' => 'required|email|max:40',
            'password' => 'max:191',
            'company_id' => 'required'
        ],
        [
            'firstname.required' => __("El campo nombre es obligatorio"),
            'secondname.required' => __("El campo apellidos es obligatorio"),
            'email.required' => __("El campo email es obligatorio"),
            'email.unique' => __("El email ya existe"),
            'company_id.required' => __("El campo compañía es obligatorio")
        ]
        );  
    }

    public function activate($id)
    {
        $user = User::where('id', $id)->first();

        /* Si no existe, redirige a la ruta principal */
        if (! $user)
            return redirect('/') ->with('message','El usuario no existe');

        $user->actived = 1;
        $user->save();

        return redirect('/usuarios')->with('message','Usuario activado');
    }

    public function desactivate($id){

        $user = User::where('id', $id)->first();

        /* Si no existe, redirige a la ruta principal */
        if (! $user)
            return redirect('/') ->with('message','El usuario no existe');

        $user->actived = 0;
        $user->save();

        return redirect('/usuarios')->with('message','Usuario desactivado');

    }
}
