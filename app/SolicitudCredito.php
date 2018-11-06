<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    protected $table = "solicitudes_credito";
    protected $primaryKey = "IdSolicitudCredito";
    protected $fillable = ["Edad", "TieneTarjeta", "IdPlazo", "MontoSolicitado"];

    public function constructor(){
        $this->IdUsuario = session("userAuth")->IdUsuario;
        $this->save();
    }
}
