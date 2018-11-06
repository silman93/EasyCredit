<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if ($request->ajax()) {
                if ($request->has("peticion")) {
                    $peticion = $request->peticion;
                    if($peticion == "caluclarMontoCredito"){
                        $plazo = \App\PlazosMeses::find($request->IdPlazo);
                        if ($plazo != null && is_numeric($request->MontoSolicitado) && $request->MontoSolicitado > 0 ) {
                            $montoTotal = $request->MontoSolicitado * ( 1 + $plazo->PorcInteres / 100 );
                            return json_encode(array("tipo" => 0, "datos"=>["montoTotal"=> $montoTotal]));
                        }
                        return json_encode(array("tipo" => 1, "mensajes"=>["Datos incorrectos"]));

                    }
                }
            }
            else{
                if(\Route::getCurrentRoute()->uri == "TuCredito/SolicitudCredito"){
                    $solicitudes=\App\SolicitudCredito::where("Estatus", "P")->where("IdUsuario", session("userAuth")->IdUsuario)->paginate(5);
                }
                elseif(\Route::getCurrentRoute()->uri == "TuCredito/Historial"){
                    $solicitudes=\App\SolicitudCredito::whereIn("Estatus", ["A", "R"])->where("IdUsuario", session("userAuth")->IdUsuario)->paginate(5);
                }
                return view("TuCredito.Solicitudes.ListadoSolicitudes",compact('solicitudes'));
            }
        }catch(\Exception $e){
            report($e);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plazos = \App\PlazosMeses::All();
        return view("TuCredito.Solicitudes.NuevaSolicitud", compact("plazos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'IdPlazo.required' => 'El plazo es obligatorio.',
            'IdPlazo.exists' => 'El plazo seleccionado es incorrecto.',
        ];
        $this->validate(request(), [
            'MontoSolicitado' => ['required','numeric','digits_between:1,5'],
            'Edad' => ['required','numeric','digits_between:1,3'],
            'TieneTarjeta' => ['boolean'],
            'IdPlazo' => ['required']
        ], $messages);
        $solicitud = new \App\SolicitudCredito;
        $solicitud->fill($request->all());
        $solicitud->constructor();
        return redirect()->route('SolicitudCredito.index')->with('success','Registro creado satisfactoriamente');
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
