@extends("TuCredito/Masterpage")
@section("head")
@endsection
@section("contenido")
    <div class="row">
        <div class="col s12">
            <table class="striped">
                <thead>
                    <th>Monto</th>
                    <th>Edad</th>
                    <th>Tarjeta</th>
                </thead>
                <tbody>
                    @if($solicitudes->count())
                        @foreach($solicitudes as $solicitud)
                            <?php
                                $class = "";
                                if ($solicitud->Estatus == "A") {
                                    $class .= "green";
                                }
                                else if($solicitud->Estatus == "R"){
                                    $class .= "red";
                                }
                             ?>
                            <tr class="{!! $class !!}">
                                <td>{{$solicitud->MontoSolicitado}}</td>
                                <td>{{$solicitud->Edad}}</td>
                                <td>{{ $solicitud->TieneTarjeta == 0 ? "No" : "Si" }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No hay registro !!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
   {{ $solicitudes->links() }}
</div>
   <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Solicitud generada</h4>
      <p>Se ha enviado su solicitud para continuar con el trámite del crédito.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
@endsection
