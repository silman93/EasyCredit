<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $primaryKey='IdUsuario';
    protected $fillable = ['UserId', 'Nombre','ApellidoPaterno','ApellidoMaterno','password','email','IdSucursal','IdUsuarioAlta','IdUsuarioModificacion','IdUsuarioBaja'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public function funcionalidades(){
         $funcXUsuario = $this->hasMany("\App\FuncionalidadXUsuario", "IdUsuario", "IdUsuario")->get();
         $idsFuncionalidades = $funcXUsuario->pluck("IdFuncionalidad")->all();
         return \App\Funcionalidad::whereIn("IdFuncionalidad", $idsFuncionalidades)->get();
     }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
