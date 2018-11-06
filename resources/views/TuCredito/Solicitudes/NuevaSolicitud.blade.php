@extends("TuCredito/Masterpage")
@section("head")
    {!!Html::script('/js/solicitudes/solicitudes.js')!!}
@endsection
@section("contenido")
<div id="contentNuevaSolicitu">
    @if ($errors->any())
        <div class="teal deep-orange">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row" id="divNuevaSolicitud">
        <h3>Nueva solicitud de crédito</h3>
        {!!Form::open(['url' => '/TuCredito/SolicitudCredito', 'method' =>'POST'])!!}
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix">monetization_on</i>
                    <input type="number" name="MontoSolicitado" id="txtMontoSolicitado">
                    <label for="txtMontoSolicitado">Monto</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix">perm_identity</i>
                    <input type="number" name="Edad" id="txtEdad">
                    <label for="txtEdad">Edad</label>
                </div>
                <div class="input-field col s12 m3">
                    <p>
                        <label>
                            <input type="checkbox" name="TieneTarjeta" value="1" />
                            <span>Cuento con tarjeta de crédito</span>
                        </label>
                    </p>
                </div>
                <div class="input-field col s12 m3">
                    <select id="ddlPlazos" name="IdPlazo">
                        <option value="" disabled selected>Selecciona una opcion</option>
                        @foreach($plazos as $plazo)
                            <option value="{!! $plazo->IdPlazo !!}">{!! $plazo->NumeroMeses !!} meses</option>
                        @endforeach
                    </select>
                    <label>Plazo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m2">
                    <i class="material-icons prefix">perm_identity</i>
                    <input type="number" placeholder="--" disabled id="txtMontoTotalCredito">
                    <label for="txtMontoTotalCredito">Total crédito</label>
                </div>
                <div class="input-field col s12 m2">
                    <button class="btn waves-effect waves-light" id="btnRecalcularMontoFinal" type="button">Recalcular
                        <i class="material-icons right">update</i>
                    </button>
                </div>
                <div class="input-field col s12 m2 offset-m1">
                    <button class="btn waves-effect waves-light" type="submit">Solicitar Crédito
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
