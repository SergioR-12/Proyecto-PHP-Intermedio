<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Models\categoria;
use App\Models\producto;
use Illuminate\Http\Request;

class inventarioController extends Controller
{    public function index()
    {
        $oProductos = producto::paginate(5);
        $oCategorias = categoria::select('categoriaID', 'nombre as nombreCategoria')->get();
        return view('inventario.index', compact('oProductos', 'oCategorias'));
    }

    public function create()
    {
        $oCategorias = categoria::all();
        return view('inventario.create', compact('oCategorias'));
    }

    public function store(StoreProductoRequest $request)
    {
        $oProducto = producto::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->input('descripcion'),
            'cantidad' => $request->input('cantidad'),
            'precio_unitario' => $request->input('precio_unitario'),
            'categoriaID' => $request->input('categoriaID'),
        ]);

        return redirect()->route('inventario.index');
    }

    public function edit(producto $productos)
    {
        $oProducto = $productos;
        $oCategorias = categoria::all();
        return view('inventario.edit', compact('oProducto', 'oCategorias'));
    }

    public function update(StoreProductoRequest $request, producto $productos)
    {

        $oProducto = $productos;

        $oProducto->update([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->input('descripcion'),
            'cantidad' => $request->input('cantidad'),
            'precio_unitario' => $request->input('precio_unitario'),
            'categoriaID' => $request->input('categoriaID'),
        ]);

        return redirect()->route('inventario.index');
    }
}

