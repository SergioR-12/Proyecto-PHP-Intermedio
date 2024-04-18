@extends('layouts.plantilla')

@section('title', 'Inventario')

@section('content')

    <h1 class="text-center col-8">Inventario</h1>

    <div class="col d-flex justify-content-end 1rem">
        <button class="btn btn-primary col-2 align-content-end" type="button" onclick="location.href='{{ route('inventario.create') }}'" style="width: 200px">Crear nuevo producto</button>
    </div>
    <br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio por Unidad</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        @foreach ( $oProductos as $oProducto )
        <tr>
            <td>{{ $oProducto->nombre }}</td>
            <td>{{ $oProducto->cantidad }}</td>
            <td>{{ $oProducto->precio_unitario }}</td>
            <td>{{ $oProducto->descripcion }}</td>
            <td>{{ $oCategorias->find($oProducto->categoriaID)->nombreCategoria }}</td>
            <td>
                <a href="{{ route('inventario.edit', $oProducto->productoID) }}">Editar</a>
            </td>
        </tr>
        @endforeach

    </table>

    <br/>

    <div>
        <ul class="pagination col-6">

            @if ($oProductos->currentPage() > 1)
                <li class="page-item"><a class="page-link" href="{{ $oProductos->url(1) }}">Primera</a></li>
                <li class="page-item"><a class="page-link" href="{{ $oProductos->previousPageUrl() }}">Anterior</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="">Primera</a></li>
                <li class="page-item disabled"><a class="page-link" href="">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $oProductos->lastPage(); $i++)
                @if ($i == $oProductos->currentPage())
                    <li class="page-item active"><a class="page-link" href="">{{ $i }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $oProductos->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($oProductos->currentPage() < $oProductos->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $oProductos->nextPageUrl() }}">Siguiente</a></li>
                <li class="page-item"><a class="page-link" href="{{ $oProductos->url($oProductos->lastPage()) }}">Ultima</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="">Siguiente</a></li>
                <li class="page-item disabled"><a class="page-link" href="">Ultima</a></li>

            @endif
        </ul>
    </div>



    <br/><br/>

@endsection
