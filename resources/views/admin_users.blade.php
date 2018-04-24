<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            .page-background{

    background-color : #eeeeee !important;

}

.first-background{

    background-color : #0d47a1 !important;

}

.first-text{

    color : #0d47a1 !important;    

}

.second-background{

    background-color : #f44336 !important;

}

.second-text{

    color : #f44336 !important;

}

.third-background{

    background-color : #ffd600 !important;

}

.third-text{

    color : #ffd600 !important;

}

.error-text{

    color : #d50000 !important;

}

.ok-text{

    color : #64dd17 !important;

}
        </style>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" media="screen,projection">
        <link rel="stylesheet" type="text/css" href="../css/system_colors.css">
        
        <title>Inicia Sesi&oacute;n</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="page-background">
        <nav>
            <div class="nav-wrapper second-background">
                <a href="#!" class="brand-logo"><i class="material-icons">computer</i>Usuarios</a>
                <ul class="right">
                    <li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
                </ul>
            </div>
        </nav>
        <!-- Content Begin -->
        <div class="container">
            <div class="section"></div>
            <div class="row" id="login-box">

                <div class="card">
                    <div class="card-content">
                        <form class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix third-text">search</i>
                                <input placeholder="Ingresa nombre de usuario o boleta" id="first_name" type="text" class="validate">
                                <label for="first_name">B&uacute;squeda de Usuarios</label>
                            </div>
                        </form>

                        <ul class="collection with-header">
                            <li class="collection-header grey lighten-3"><h4>Resultados</h4></li>
                            <li class="collection-item"><div>
                                Tesla
                                <a href="#!" class="secondary-content"><i class="material-icons ok-text">check</i></a>
                                <a href="#!" class="secondary-content"><i class="material-icons error-text">close</i></a>
                            </div></li>
                            <li class="collection-item"><div>
                                Faraday
                                <a href="#!" class="secondary-content"><i class="material-icons ok-text">check</i></a>
                                <a href="#!" class="secondary-content"><i class="material-icons error-text">close</i></a>
                            </div></li>
                            <li class="collection-item"><div>
                                Kuhn
                                <a href="#!" class="secondary-content"><i class="material-icons ok-text">check</i></a>
                                <a href="#!" class="secondary-content"><i class="material-icons error-text">close</i></a>
                            </div></li>
                            <li class="collection-item"><div>
                                Dijkstra
                                <a href="#!" class="secondary-content"><i class="material-icons ok-text">check</i></a>
                                <a href="#!" class="secondary-content"><i class="material-icons error-text">close</i></a>
                            </div></li>
                            <li class="collection-item"><div>
                                Tarjan
                                <a href="#!" class="secondary-content"><i class="material-icons ok-text">check</i></a>
                                <a href="#!" class="secondary-content"><i class="material-icons error-text">close</i></a>
                            </div></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- Content End -->
        <!-- Sidenav Begin -->
        <ul id="slide-out" class="sidenav">
            <li><a class="subheader">
                <i class="material-icons">people</i>Usuarios
            </a></li>
            <li><a class="waves-effect" href="#!">
                B&uacute;squeda de Usuarios
            </a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">
                <i class="material-icons">group_work</i>Grupos
            </a></li>
            <li><a class="waves-effect" href="#!">
                B&uacute;squeda de Grupos
            </a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">
                <i class="material-icons">work</i>Proyectos
            </a></li>
            <li><a class="waves-effect" href="#!">
                B&uacute;squeda de Proyectos
            </a></li>
        </ul>
        <!-- Sidenav End -->
        <!-- Floating Button Begin -->
        <div class="fixed-action-btn hide-on-med-and-down">
            <a class="btn-floating btn-large second-background sidenav-trigger" data-target="slide-out">
                <i class="large material-icons">menu</i>
            </a>
        </div>
        <!-- Floating Button End -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
        <script type="text/javascript">
            M.AutoInit();
        </script>
    </body>
</html>
