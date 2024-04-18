@extends('layouts.plantilla')

@section('title', 'Editar Cliente')

@section('content')

    <h1 class="text-center col-8">Editar Cliente</h1>
    <br>
    <form action="{{ route('clientes.update', $oCliente->clienteID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="fluid-container text-center">
            <div class="row align-self-start">
                <label for="nombre" class="col-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $oCliente->nombre) }}" class="col-6">
                @error('nombre')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>
            <div class="row align-self-start">
                <label for="apellidos" class="col-2">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $oCliente->apellidos) }}" class="col-6">
                @error('apellidos')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>
            <div class="row align-self-start">
                <label for="email" class="col-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $oCliente->email) }}" class="col-6">
                @error('email')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>
            <div class="row align-self-start">
                <label for="telefono" class="col-2">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $oCliente->telefono) }}" class="col-6">
                @error('telefono')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>
            <div class="row align-self-center">
                <div class="col-8">
                <button type="button" class="btn btn-danger " onclick="location.href='{{ route('clientes.index') }}'" style="width: 200px">Volver a lista de clientes</button>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" style="width: 200px">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </form>
    <br><br>
@endsection

