<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {!! Html::style("/css/global/bootstrap.min.css" )!!}
    {!! Html::style("/css/global/mvpready-admin.css" )!!}
    <title>EasyCredit</title>
    <style>
        body
        {
            background-color:#f1f1f1;
        }
        .btn-primary
        {
            background-color:#ffc000;
        }
    </style>
</head>
<body>
        <div style="margin-top:50px;">
            <div class="account-wrapper">

                <div class="account-body">


                    <img style="width:70%; margin-top:-8px;" src="{{ 'data:image/jpeg;base64,'.base64_encode( \Storage::get( 'public/logos/phpLogo.png' ) ) }}">
                    <br>
                    <h3>Sistema de administración</h3>
                    <br>
                    <h5>Por favor ingrese usuario y contraseña.</h5>
                    <div>
                        @if ( isset($errores) )
                           <div class="alert alert-danger">
                               <p><strong>Uy Tenemos Problemas!</strong></p>
                                <ul>
                                    @foreach($errores as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                   </div>
                    <div class="form account-form">
                        {!!Form::open (['route' => 'login.index', 'method' =>'GET'])!!}
                            <div class="form-group">
                                {!! Form::label('NombreUsuario', 'Usuario:', array('class' => 'control-label')) !!}
                                {!! Form::text('NombreUsuario', null, ["required"=>"",'class' => 'form-control','placeholder'=>"Usuario"]) !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">
                                    Ingresar &nbsp; <i class="fa fa-play-circle"></i>
                                </button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
