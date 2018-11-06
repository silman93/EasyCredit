<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioCliente extends Model
{
    protected $table = "usuarios_clientes";
    protected $primaryKey = "IdUsuario";
    protected $fillable = ["NombreUsuario"];
    public static function login($nombreUsuario){
        $usuario = \App\UsuarioCliente::where("NombreUsuario", $nombreUsuario)->first();
        \Session::put('userAuth',$usuario);
        \Session::save();
    }

    public static function logout(){
        \Session::flush();
        \Session::save();
        return true;
    }
}
