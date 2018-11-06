@extends("TuCredito/Masterpage")
@section("head")
@endsection
@section("contenido")
    <div id="contentNuevaSolicitud">
        <div class="row">
            <div class="col s12 offset-m4 m4">
                <div class="card">
                    <div class="card-image">
                        {!! Html::image("image/sample-1.jpg") !!}
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>Nombre de usuario: {!! session("userAuth")->NombreUsuario !!}</p>
                    </div>
                    <div class="card-action">
                        <a href="{!! url('/TuCredito/SolicitudCredito') !!}">Ver solicitudes pendientes<span class="new badge" data-badge-caption="">{!! \App\SolicitudCredito::where("Estatus", "P")->where("IdUsuario", session("userAuth")->IdUsuario)->select(\DB::raw("Count(*) AS Total"))->first()->Total; !!}</span></a>
                    </div>
                </div>
            </div>
  </div>
    </div>
@endsection
