<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowDetalleRequest;
use App\Models\cliente;
use App\Models\detalle_factura;
use App\Models\factura;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class facturasController extends Controller
{
    public function index()
    {
        $oFacturas = factura::paginate(5);
        $oClientes = Cliente::select('clienteID', DB::raw("CONCAT(nombre, ' ', apellidos) as nombreCliente"))->get();
        $oFacturasAll = factura::select('facturaID')->orderBy('facturaID', 'asc')->get();
        return view('facturas.index', compact('oFacturas', 'oClientes', 'oFacturasAll'));
    }

    public function show(ShowDetalleRequest $request)
    {
        $oDetalles = detalle_factura::where('facturaID', '=', $request->get('numero_factura'))->get();
        $request->session()->put('numero_factura', $request->get('numero_factura'));
        $oProductos = producto::select('productoID', 'nombre as nombreProducto')->get();
        $oFacturas = factura::where('facturaID', '=', $request->get('numero_factura'))->first();
        return view('facturas.show', compact('oDetalles', 'request', 'oProductos', 'oFacturas'), ['factura'=>$request->get('numero_factura')]);
    }
}
