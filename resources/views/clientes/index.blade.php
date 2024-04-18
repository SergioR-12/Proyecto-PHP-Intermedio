@extends('layouts.plantilla')

@section('title', 'Clientes')

@section('content')

    <h1 class="text-center col-8">Clientes</h1>
    <div class="col d-flex justify-content-end 1rem">
        <button class="btn btn-primary col-2 align-content-end" type="button" onclick="location.href='{{ route('clientes.create') }}'" style="width: 200px">Crear nuevo cliente</button>
    </div>
    <br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        @foreach ( $oClientes as $oCliente )
        <tr>
            <td>{{ $oCliente->nombre }}</td>
            <td>{{ $oCliente->apellidos }}</td>
            <td>{{ $oCliente->email }}</td>
            <td>{{ $oCliente->telefono }}</td>
            <td>
                <a href="{{ route('clientes.edit', $oCliente->clienteID) }}">Editar</a>
            </td>
        </tr>
        @endforeach

    </table>

    <br/>

    <div>
        <ul class="pagination col-6">

            @if ($oClientes->currentPage() > 1)
                <li class="page-item"><a class="page-link" href="{{ $oClientes->url(1) }}">Primera</a></li>
                <li class="page-item"><a class="page-link" href="{{ $oClientes->previousPageUrl() }}">Anterior</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="">Primera</a></li>
                <li class="page-item disabled"><a class="page-link" href="">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $oClientes->lastPage(); $i++)
                @if ($i == $oClientes->currentPage())
                    <li class="page-item active"><a class="page-link" href="">{{ $i }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $oClientes->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($oClientes->currentPage() < $oClientes->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $oClientes->nextPageUrl() }}">Siguiente</a></li>
                <li class="page-item"><a class="page-link" href="{{ $oClientes->url($oClientes->lastPage()) }}">Ultima</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="">Siguiente</a></li>
                <li class="page-item disabled"><a class="page-link" href="">Ultima</a></li>

            @endif
        </ul>
    </div>



    <br/><br/>

@endsection


