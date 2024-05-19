@extends('plantilla')

@section('title', 'Productos')

@section('content')

    <div class="container">
        <center><h4>Inventario</h4></center>

        @if (Auth::user()->role->nombre == 'administrador')
            <div class="col s12">
                <button class="waves-effect waves-light btn blue darken-2" onclick="registrarProducto()"><i class="material-icons left">add</i>Agregar Productos</button>
            </div>
        @endif
        <br>
        <div class="col s12 z-depth-2">
            <table class="striped" style="font-size:14px">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estatus</th>
                        @if (Auth::user()->role->nombre == 'administrador')
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td> {{$producto->nombre}} </td>
                            <td style="text-align:right; padding-right: 30px; width: 120px">$ {{$producto->precio}} </td>
                            <td> {{$producto->stock->cantidad}} </td>
                            <td> {{$producto->getEstatus()}} </td>
                            @if (Auth::user()->role->nombre == 'administrador')
                                <td>
                                    @if ($producto->activo == 1)
                                        <a href="{{ route('estatus',$producto->id) }}" class="waves-effect waves-light btn"><i class="material-icons left">toggle_off</i>Desactivar</a>
                                    @else
                                        <a href="{{ route('estatus',$producto->id) }}" class="waves-effect waves-light btn"><i class="material-icons left">toggle_on</i>Activar</a>
                                    @endif
                                    <button onclick="entradaProducto({{$producto->stock->id.','.$producto->stock->cantidad}})" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Entrada de producto</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Nuevo Producto</h4>
            <form action="{{route('producto.guardar')}}" method="POST" class="row">
                @csrf
                <div class="input-field col s12 m6">
                    <input id="nombre" name="nombre" type="text" class="validate" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="precio" name="precio" type="number" min="1" class="validate" required>
                    <label for="precio">Precio</label>
                </div>
                <div class="center-align">
                    <button class="btn waves-effect waves-light" type="submit">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEntrada" class="modal">
        <div class="modal-content">
            <h4>Entrada de Producto</h4>
            <form action="{{route('entrada')}}" method="POST" class="row">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="col m3"></div>
                <div class="input-field col s12 m6">
                    <input id="cantidad" name="cantidad" type="number" class="validate" required>
                    <label for="cantidad">Cantidad</label>
                    <strong id="mensaje" style="color: red; display:none">No se puede disminuir la cantidad existente</strong>
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
        function registrarProducto(){
            var modal = document.getElementById('modal1');
            var instance = M.Modal.getInstance(modal);
            instance.open();
        }
        function entradaProducto($id,$cantidadActual){
            document.getElementById('cantidad').value = $cantidadActual;
            //document.getElementById('cantidad').min = $cantidadActual;
            document.getElementById('id').value = $id;
            var modal = document.getElementById('modalEntrada');
            var instance = M.Modal.getInstance(modal);
            instance.open();
            document.getElementById('cantidad').addEventListener('input', function() {
                var cantidad = this.value;
                if(cantidad < $cantidadActual){
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
