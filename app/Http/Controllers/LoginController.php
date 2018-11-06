<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has("NombreUsuario")) {
            $usuario = \App\UsuarioCliente::where("NombreUsuario", $request->NombreUsuario)->first();
            if($usuario == null){
                \App\UsuarioCliente::create($request->all());
            }
            \App\UsuarioCliente::login($request->NombreUsuario);
            return redirect("TuCredito/Perfil");
        }
        else{
            return redirect()->route("login.create");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
        }
        else{
            return view("login/login");
        }
    }

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
        $respuesta = \App\UsuarioCliente::logout();
        if ($respuesta) {
            return redirect()->route("login.create");
        }
        else{
            return view("login.login",array("errores"=> ["El usuario no se encuentra registrado"]));
        }
    }
}
