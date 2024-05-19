@extends('plantilla')

@section('title', 'Salida de productos')

@section('content')

    <div class="container">
        <center><h4>Salida de productos</h4></center>

        <div class="col s12 z-depth-2">
            <table class="striped" style="font-size:14px">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td> {{$producto->nombre}} </td>
                            <td> {{$producto->stock->cantidad}} </td>
                            <td> <button onclick="salidaProducto({{$producto->stock->id.','.$producto->stock->cantidad}})" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Salida de producto</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div id="modalSalida" class="modal">
        <div class="modal-content">
            <h4>Entrada de Producto</h4>
            <form action="{{route('salida.producto')}}" method="POST" class="row">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="col m3"></div>
                <div class="input-field col s12 m6">
                    <input id="cantidad" name="cantidad" type="number" class="validate" required>
                    <label for="cantidad">Cantidad de salida</label>
                    <strong id="mensaje" style="color: red; display:none">La cantidad de salida no puede ser mayor a la existente</strong>
                </div>
                <div class="center-align col s12">
                    <button class="btn waves-effect waves-light" id="enviar" type="submit">Aceptar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @if (session('informacion'))
        <script>
            M.toast({
                html: '{{ session("informacion")}} ',
                classes: 'black',
                displayLength: 4000,
            })
        </script>
    @endif
    @error('cantidad')
        <script>
            M.toast({
                html: '{{ $message }} ',
                classes: 'black',
                displayLength: 4000,
            })
        </script>
    @enderror
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
        function salidaProducto($id,$cantidadActual){
            document.getElementById('cantidad').value = $cantidadActual;
            document.getElementById('id').value = $id;
            var modal = document.getElementById('modalSalida');
            var instance = M.Modal.getInstance(modal);
            instance.open();
            document.getElementById('cantidad').addEventListener('input', function() {
                var cantidad = this.value;
                if(cantidad > $cantidadActual){
                    document.getElementById('mensaje').style.display = 'inline';
                    document.getElementById('enviar').disabled = true;
                }else{
                    document.getElementById('mensaje').style.display = 'none';
                    document.getElementById('enviar').disabled = false;
                }
            });
        }
    </script>
@endsection
