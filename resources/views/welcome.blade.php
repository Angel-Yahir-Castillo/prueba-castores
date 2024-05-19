@extends('plantilla')

@section('title', 'Bienvenido')

@section('content')
    <!-- Contenido principal -->
    <div class="container">
        <h1>Bienvenido al módulo de Inventario</h1>
        <p>Aquí puedes gestionar todos los aspectos relacionados con el inventario.</p>

        <div class="row section">
            <form method="POST" class="col s12" action="{{ route('logout') }}">
                @csrf
                <center><button type="submit" class="btn">
                    Cerrar sesion
                </button></center>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @if (session('error'))
        <script>
            M.toast({
                html: '{{ session("error")}} ',
                classes: 'black',
                displayLength: 4000,
            })
        </script>
    @endif

@endsection
