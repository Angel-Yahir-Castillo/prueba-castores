<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title') </title>
    <style>
        .sidenav {
            background-color: #1E88E5;
        }
        .sidenav .user-view {
            background-color: #1565C0;
        }
        .sidenav a {
            color: #FFF;
        }
        .sidenav-trigger {
            background-color: #359bf4;
        }
        .container h1 {
            color: #212121;
        }
        .container p {
            color: #757575;
        }
    </style>
</head>
<body>
    <!-- Menú lateral -->
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background"></div>
                <a href="#user"><img class="circle" src="https://www.castores.com.mx/assets/favicon.png"></a>
                <a href="#name"><span class="white-text name">{{Auth::user()->name }}</span></a>
                <a href="#email"><span class="white-text email">{{Auth::user()->email }}</span></a>
            </div>
        </li>
        <li><a href="{{ route('home') }}"><i class="material-icons">dashboard</i>Inicio</a></li>
        <li><a href="{{ route('productos') }}"><i class="material-icons">inventory</i>Inventario</a></li>

        @if (Auth::user()->role->nombre == 'administrador')
            <li><a href="{{ route('historial') }}"><i class="material-icons">history</i>Historial</a></li>
        @endif

        @if (Auth::user()->role->nombre == 'almacenista')
            <li><a href="{{ route('salida') }}"><i class="material-icons">logout</i>Salida de Productos</a></li>
        @endif


    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">menu</i></a>

    @yield('content')

    <!-- Importando la librería de JavaScript de Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicialización del Sidenav
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
        });
    </script>
</body>
</html>
