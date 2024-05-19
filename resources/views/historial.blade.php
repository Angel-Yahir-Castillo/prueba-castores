@extends('plantilla')

@section('title', 'Productos')

@section('content')

    <div class="container">
        <center><h4>Historial de Movimientos</h4></center>
        <form action="{{ route('historial') }}" method="GET">
            <div class="row">
                <div class="input-field col s11 m6">
                    <select name="tipo">
                        <option selected value="todos">Ninguno</option>
                        <option value="entrada">Entrada</option>
                        <option value="salida">Salida</option>
                    </select>
                    <label>Filtro</label>
                </div>
                <button class="btn" type="submit">Filtrar</button>
            </div>
        </form>
        <div class="col s12 z-depth-2">
            <table class="striped" style="font-size:14px">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Cantidad antes</th>
                        <th>Cantidad despues</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Realizado por</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($movimientos as $movimiento)
                        <tr>
                            <td> {{$movimiento->inventario->producto->nombre}} </td>
                            <td> {{$movimiento->tipo}} </td>
                            <td> {{$movimiento->cantidadAntes}} </td>
                            <td> {{$movimiento->cantidadDespues}} </td>
                            <td> {{$movimiento->getFecha()}} </td>
                            <td> {{$movimiento->getHora()}} </td>
                            <td> {{$movimiento->user->name}} <br> {{$movimiento->user->email}} </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
