<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #F5F5F5;
        }
        .login-card {
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }
        .company-logo {
            width: 100px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card login-card">
            <div class="card-content">
                <img src="https://www.castores.com.mx/assets/favicon.png" alt="Logo de la empresa" class="company-logo">
                <span class="card-title center-align">Iniciar Sesión</span>
                <form action="{{route('login.user')}}" method="POST">
                    @csrf
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input id="correo" name="correo" type="email" class="validate" value="{{ old('correo') }}" required>
                        <label for="correo">Correo Electrónico</label>
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="contrasena" name="contrasena" type="password" class="validate" value="{{ old('contrasena') }}" required>
                        <label for="contrasena">Contraseña</label>
                        <strong style="color: red;">@error('contrasena') {{ $message }} @enderror</strong>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light" type="submit">Ingresar
                        <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
        });
    </script>
    @if (session('informacion'))
        <script>
            M.toast({
                html: '{{ session("status")}} ',
                classes: 'black',
                displayLength: 4000,
            })
        </script>
    @endif
</body>
</html>
