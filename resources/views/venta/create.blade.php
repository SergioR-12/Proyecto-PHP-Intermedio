@extends('layouts.plantilla')

@section('title', 'Crear Venta')

@section('content')

    <h1 class="text-center col-8">Crear Venta</h1>
    <br><br>
    <form action="{{ route('venta.temp') }}" method="POST">
        @csrf
        <div class="fluid-container text-center">
            <div class="row align-self-start">
                <label for="productoID" class="col-2">Producto:</label>
                <select name="productoID" id="productoID" class="col-6">
                    <option value="">-- Elija un producto --</option>
                    @foreach($oProductos as $oProducto)
                        <option value="{{ $oProducto->productoID }}" data-precio-unitario="{{ $oProducto->precio_unitario }}" @if (old('productoID') == $oProducto->productoID) selected @endif>
                            {{ $oProducto->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('productoID')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>

            <div class="row align-self-start">
                <label for="cantidad" class="col-2">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="{{ old('cantidad') }}" class="col-6">
                @error('cantidad')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>

            <div class="row align-self-start">
                <label for="precio_unitario" class="col-2">Precio Unitario:</label>
                <input type="number" id="precio_unitario" name="precio_unitario" class="col-6" value="{{ old('precio_unitario') }}" readonly>
            </div>
            <br>

            <div class="row align-self-start">
                <label for="subtotal" class="col-2">Subtotal:</label>
                <input type="number" name="subtotal" id="subtotal" class="col-6" value="{{ old('subtotal') }}"readonly>
            </div>
            <br/><br/><br/>

            <div class="row align-self-center">
                <div class="col-8">
                    <button type="button" class="btn btn-danger" id="limpiarFormulario" style="width: 200px">Limpiar Formulario</button>
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary" style="width: 200px">Agregar a la Factura</button>
                </div>
            </div>
        </div>
    </form>

    <br/><br/>

    <h2>Detalle de la Factura</h2>
    @if (session('factura') && is_array(session('factura')))
        <h2>Detalle de la Factura Temporal</h2>
        <div>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Costo Unitario</th>
                    <th>Subtotal</th>
                </tr>
                @php
                    $totalSubtotal = 0;
                @endphp
                @foreach(session('factura') as $producto)
                    <tr>
                        <td>{{ $producto['nombre'] ?? '' }}</td>
                        <td>{{ $producto['cantidad'] ?? '' }}</td>
                        <td>¢ {{ $producto['precio_unitario'] ?? '' }}</td>
                        <td>¢ {{ $producto['subtotal'] ?? '' }}</td>
                    </tr>
                    @php
                        $totalSubtotal += $producto['subtotal'];
                    @endphp
                @endforeach
                <tfoot>
                    <td colspan="2"></td>
                    <td class="table-dark"><strong>Total:</strong></td>
                    <td class="table-dark"><strong>¢ {{ $totalSubtotal }}</strong></td>
                </tfoot>
            </table>
            <br>
        </div>
    @endif

    <br><br>

    <br><br>


    <form action="{{ route('venta.store', request()->input('clienteID')) }}" method="POST" style="display: inline;">
        @csrf
        <div class="row align-self-start">
            <label for="clienteID" class="col-2">Asignar Cliente:</label>
            <select name="clienteID" id="clienteID" class="col-6">
                <option value="">-- Elija un cliente --</option>
                @foreach($oClientes as $oCliente)
                    <option value="{{ $oCliente->clienteID }}" @if (old('clienteID') == $oCliente->clienteID) selected @endif>
                        {{ $oCliente->nombre.' '.$oCliente->apellidos }}
                    </option>
                @endforeach
            </select>
            @error('clienteID')
                <small style="color: crimson"> {{ $message }} </small>
                <br/>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="width: 200px">Finalizar Venta</button>
    </form>
    &nbsp;&nbsp;
    <form action="{{ route('venta.limpiar') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-warning" style="width: 200px" onclick="return confirm('¿Estás seguro de limpiar la factura?')">Limpiar Factura</button>
    </form>

    <script>


        // Función para manejar el cambio en el select
        document.addEventListener('DOMContentLoaded', function() {
        const productoSelect = document.getElementById('productoID');
        const cantidadInput = document.getElementById('cantidad');
        const precioUnitarioInput = document.getElementById('precio_unitario');
        const subtotalInput = document.getElementById('subtotal');

        function calcularSubtotal() {
            const cantidad = parseInt(cantidadInput.value) || 0;
            const precioUnitario = parseFloat(precioUnitarioInput.value) || 0;

            const subtotal = cantidad * precioUnitario;
            subtotalInput.value = subtotal.toFixed(2); // Formatear a dos decimales
        }

        productoSelect.addEventListener('change', function() {
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const precioUnitario = parseFloat(selectedOption.dataset.precioUnitario) || 0;
            precioUnitarioInput.value = precioUnitario.toFixed(2); // Formatear a dos decimales

            calcularSubtotal();
        });

        cantidadInput.addEventListener('input', function() {
            calcularSubtotal();
        });

        // Función para limpiar el formulario
        function limpiarFormulario() {
            productoSelect.value = '';
            cantidadInput.value = '';
            precioUnitarioInput.value = '';
            subtotalInput.value = '';
        }

        calcularSubtotal();

        const limpiarButton = document.getElementById('limpiarFormulario');
        if (limpiarButton) {
            limpiarButton.addEventListener('click', function() {
                limpiarFormulario();
            });
        }
    });
    </script>

@endsection
