<!DOCTYPE html>

<html lang="es-mx" xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EasyCredit</title>
    {!!Html::script('/js/global/jquery.min.js')!!}
    {!!Html::style('/css/global/materialize.min.css')!!}
    {!!Html::script('/js/global/materialize.min.js')!!}
    {!!Html::script('/js/global/generic.js')!!}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        var ruta = '{!! url("") !!}';
        $(document).ready(function(){
            $('.tabs').tabs();
            $('select').formSelect();
            $(".dropdown-trigger").dropdown();
        });

    </script>
    @yield("head")
</head>
<body>
    <div class="container">
        <ul id="menuSolicitudes" class="dropdown-content">
            <li><a href="{!! url('/TuCredito/SolicitudCredito') !!}">Mis solicitudes</a></li>
            <li><a href="{!! url('/TuCredito/SolicitudCredito/create') !!}">Nueva solicitud</a></li>
        </ul>
        <nav class="teal accent-4">
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo">EasyCredit</a>
            <ul class="right hide-on-med-and-down">
                @if(!session()->has("userAuth"))
                    <li><a href="{{ route('login.create') }}">Login</a></li>
                @else
                    <li><a href="{!! url('/TuCredito/Perfil') !!}">Información del Usuario</a></li>
                    <li><a href="{!! url('/TuCredito/Historial') !!}">Historial Crediticio</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="menuSolicitudes">Solicitudes Actuales<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a onclick="document.getElementById('formLogout').submit(); ">
                            {!!Form::open (['route' => ['login.destroy',"1"], 'method' =>'DELETE',"id"=>"formLogout"])!!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                Logout
                            {!! Form::close() !!}
                    </a></li>
                @endif

            </ul>
          </div>
        </nav>
        @yield("contenido")
    </div>
</body>
</html>
