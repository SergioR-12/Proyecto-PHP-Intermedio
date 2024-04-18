@extends('layouts.plantilla')

@section('title', 'Facturas')

@section('content')

    <h1 class="text-center col-8">Facturas</h1>

    <table class="table table-striped table-hover">
        <tr>
            <th># Fact.</th>
            <th>Fecha y Hora</th>
            <th>Cliente</th>
            <th>Total de Factura</th>
        </tr>
        @foreach ( $oFacturas as $oFactura )
        <tr>
            <td>{{ $oFactura->facturaID }}</td>
            <td>{{ $oFactura->fecha }}</td>
            <td>{{ $oClientes->find($oFactura->clienteID)->nombreCliente}}</td>
            <td>{{ $oFactura->total }}</td>
        </tr>
        @endforeach
    </table>

    <br/><br/>
    <div>
        <ul class="pagination col-6">

            @if ($oFacturas->currentPage() > 1)
                <li class="page-item"><a class="page-link" href="{{ $oFacturas->url(1) }}">Primera</a></li>
                <li class="page-item"><a class="page-link" href="{{ $oFacturas->previousPageUrl() }}">Anterior</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="">Primera</a></li>
                <li class="page-item disabled"><a class="page-link" href="">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $oFacturas->lastPage(); $i++)
                @if ($i == $oFacturas->currentPage())
                    <li class="page-item active"><a class="page-link" href="">{{ $i }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $oFacturas->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($oFacturas->currentPage() < $oFacturas->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $oFacturas->nextPageUrl() }}">Siguiente</a></li>
                <li class="page-item"><a class="page-link" href="{{ $oFacturas->url($oFacturas->lastPage()) }}">Ultima</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="">Siguiente</a></li>
                <li class="page-item disabled"><a class="page-link" href="">Ultima</a></li>
            @endif
        </ul>
    </div>

    <br><br>

    <h2>Buscar Factura por Número</h2>
    <form action="{{ route('facturas.show', request()->input('numero_factura')) }}" method="POST">
        @csrf
        <select name="numero_factura" id="numero_factura" style="font-size: large; width: 314px">
            <option value="">-- Seleccione una factura --</option>
            @foreach ($oFacturasAll as $oFactura)
                <option value="{{ $oFactura->facturaID }}" @if (old('idDia') == $oFactura->facturaID) selected @endif>
                    {{ $oFactura->facturaID }}
                </option>
            @endforeach
        </select>
        @error('numero_factura')
            <small style="color: crimson"> {{ $message }} </small>
            <br/>
        @enderror
        <br><br>
        <button type="submit" class="btn btn-primary w-25">Buscar</button>
    </form>

    <br/><br/>


@endsection


