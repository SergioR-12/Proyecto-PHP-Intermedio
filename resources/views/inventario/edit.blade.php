@extends('layouts.plantilla')

@section('title', 'Editar Producto')

@section('content')
    <h1>Editar Producto</h1>
    <br>
    <form action="{{ route('inventario.update', $oProducto->productoID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="fluid-container text-center">
            <div class="row align-self-start">
                <label for="nombre" class="col-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $oProducto->nombre) }}" class="col-6">
                @error('nombre')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>

            <div class="row align-self-start">
                <label for="cantidad" class="col-2">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="{{ old('cantidad', $oProducto->cantidad) }}" class="col-6">
                @error('cantidad')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>

            <div class="row align-self-start">
                <label for="precio_unitario" class="col-2">Precio Unitario:</label>
                <input type="number" id="precio_unitario" name="precio_unitario" value="{{ old('precio_unitario', $oProducto->precio_unitario) }}" class="col-6">
                @error('precio_unitario')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>

            <div class="row align-self-start">
                <label for="descripcion" class="col-2">Descripción:</label>
                <textarea id="descripcion" name="descripcion" cols="10" rows="2" class="col-6" style="height: 100px">{{ old('descripcion', $oProducto->descripcion) }}</textarea>
                @error('descripcion')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>

            <div class="row align-self-start">
                <label for="categoriaID" class="col-2">Categoria:</label>

                <select name="categoriaID" id="categoriaID" class="col-6">
                    <option value="">-- Elija una categoria --</option>
                    @foreach($oCategorias as $oCategoria)
                        <option value="{{ $oCategoria->categoriaID }}" @if (old('categoriaID') == $oCategoria->categoriaID || $oCategoria->categoriaID == $oProducto->categoriaID) selected @endif>
                            {{ $oCategoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoriaID')
                    <small style="color: crimson"> {{ $message }} </small>
                    <br/>
                @enderror
            </div>
            <br>
            <div class="row align-self-center">
                <div class="col-8">
                <button type="button" class="btn btn-danger " onclick="location.href='{{ route('inventario.index') }}'" style="width: 200px">Volver a Inventario</button>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" style="width: 200px">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </form>
    <br><br>
@endsection
