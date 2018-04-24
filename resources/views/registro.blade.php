<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Registro</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" media="screen,projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="grey lighten-3">
        <div class="row" id="register-box">
            <div class="col s1 m2 l3"></div>
            <div class="col s10 m8 l6">
                <div class="card grey lighten-5">
                    <div class="card-content black-text">
                        <div class="section"></div>
                        <div class="row">
                            <div class="col s1"></div>
                            <form class="col s10" id="register-form" method="post" action="/agregarUsuario">
                                {{csrf_field()}}
                                <span class="card-title blue-text text-darken-4"><b>Reg&iacute;strate</b></span>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix yellow-text text-accent-4">account_circle</i>
                                        <input data-error="#nombre-error" placeholder="John" id="nombre" name="nombre" type="text" class="validate" autofocus>
                                        <label for="nombre">Nombre(s)</label>
                                        <div id="nombre-error" class="red-text text-accent-4"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 l6">
                                        <input data-error="#paterno-error" placeholder="Doe" id="apellidoPaterno" name="apellidoPaterno" type="text" class="validate" autofocus>
                                        <label for="paterno">Apellido Paterno</label>
                                        <div id="paterno-error" class="red-text text-accent-4"></div>
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <input data-error="#materno-error" placeholder="Doe" id="apellidoMaterno" name="apellidoMaterno" type="text" class="validate" autofocus>
                                        <label for="materno">Apellido Materno</label>
                                        <div id="materno-error" class="red-text text-accent-4"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix yellow-text text-accent-4">contact_mail</i>
                                        <input data-error="#correo-error" placeholder="correo@ejemplo.com" id="correo" name="correo" type="text" class="validate" autofocus>
                                        <label for="correo">Correo Electr&oacute;nico</label>
                                        <div id="correo-error" class="red-text text-accent-4"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix yellow-text text-accent-4">contact_phone</i>
                                        <input data-error="#telefono-error" placeholder="55 5555 5555" id="telefono" name="telefono" type="text" class="validate" autofocus>
                                        <label for="telefono">Tel&eacute;fono</label>
                                        <div id="telefono-error" class="red-text text-accent-4"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix yellow-text text-accent-4">vpn_key</i>
                                        <input data-error="#contrasena-error" id="contrasena" name="contrasena" type="password" class="validate">
                                        <label for="contrasena">Contrase&ntilde;a</label>
                                        <div id="contrasena-error" class="red-text text-accent-4"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s0 m6"></div>
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <button type="submit" class="waves-effect waves-light btn col s12 red">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row center-align">
                                    <a class="blue-text text-darken-4 col s12" href="/">REGRESAR</a>
                                </div>
                            </form>
                            <div class="col s1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s1 m2 l3"></div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
        <script src="{{ URL::asset('js/validate/custom-methods.js') }}"></script>
        <script src="{{ URL::asset('js/register.js') }}"></script>
    </body>
</html>
