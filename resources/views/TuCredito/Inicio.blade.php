@extends("TuCredito/Masterpage")
@section("head")
    {!!Html::script('/js/solicitudes/solicitudes.js')!!}
@endsection
@section("contenido")
    
    @if(session()->has("userAuth"))

        <div class="row">
            <div id="Perfil" class="col s12">Test 1</div>
            <div id="Historial" class="col s12">Test 2</div>
            <div id="Solicitudes" class="col s12">
                @include('TuCredito.Solicitudes.Solicitudes')
            </div>
        </div>
    @endif
@endsection
