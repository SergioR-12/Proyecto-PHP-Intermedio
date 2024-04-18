@extends('layouts.plantilla')

@section('title', 'Detalle de Factura')

@section('content')


    <h1 class="text-center col-10">Detalle de Factura # {{ $request->input('numero_factura') }}</h1>

    <table class="table table-striped table-hover">
        <tr class="table-primary">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Costo por Unidad</th>
            <th>Subtotal</th>
        </tr>
        @foreach ( $oDetalles as $oDetalle )
        <tr>
            <td>{{ $oProductos->find($oDetalle->productoID)->nombreProducto}}</td>
            <td>{{ $oDetalle->cantidad }}</td>
            <td>¢ {{ $oDetalle->precio_unitario }}</td>
            <td>¢ {{ $oDetalle->cantidad * $oDetalle->precio_unitario }}</td>
        </tr>
        @endforeach
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td class="table-dark justify-content-end">Total:</td>
                <td class="table-dark">¢ {{ $oFacturas->total }}</td>
            </tr>
        </tfoot>
    </table>



    <br><br>

    <div class="row align-self-center">
        <div class="col-8">
        <button type="button" class="btn btn-danger " onclick="location.href='{{ route('facturas.index') }}'" style="width: 200px">Volver a lista de facturas</button>
        </div>
    </div>


@endsection


