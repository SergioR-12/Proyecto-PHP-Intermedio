<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\TempVentaRequest;
use App\Models\cliente;
use App\Models\detalle_factura;
use App\Models\factura;
use App\Models\producto;
use Illuminate\Http\Request;

class ventaController extends Controller
{
    public function create()
    {
        $oClientes = cliente::all();
        $oProductos = producto::all();
        return view('venta.create', compact('oClientes', 'oProductos'));
    }

    public function temp(TempVentaRequest $request)
    {

        // Obtener los datos del formulario
        $productoID = $request->input('productoID');
        $cantidad = $request->input('cantidad');
        $precioUnitario = $request->input('precio_unitario');
        $subtotal = $request->input('subtotal');

        // Crear un array con los datos del producto
        $producto = [
            'productoID' => $productoID,
            'nombre' => producto::find($productoID)->nombre,
            'cantidad' => $cantidad,
            'precio_unitario' => $precioUnitario,
            'subtotal' => $subtotal,
        ];

        // Obtener la factura actual de la sesión o inicializarla como un array vacío si no existe
        $factura = $request->session()->get('factura', []);

        // Agregar el producto al array de productos en la factura
        $factura[] = $producto;

        // Almacenar el array actualizado de productos en la sesión
        $request->session()->put('factura', $factura);

        // Redirigir de vuelta a la página de venta con un mensaje de éxito
        return redirect()->route('venta.create')->with('success', 'Producto agregado a la factura correctamente.');
    }

    public function store(StoreVentaRequest $request)
    {
        // Obtener la factura temporal de la sesión
        $factura = $request->session()->get('factura', []);

        // Calcular el total general (suma de todos los subtotales)
        $totalSubtotal = 0;
        foreach ($factura as $producto) {
            $totalSubtotal += $producto['subtotal'] ?? 0;
        }

        // Crear y guardar la factura principal
        $nuevaFactura = new factura();
        $nuevaFactura->clienteID = $request->input('clienteID'); // Asigna el ID del cliente (debes obtenerlo de alguna manera)
        $nuevaFactura->fecha = now(); // Asigna la fecha actual (puedes modificar esto según tus necesidades)
        $nuevaFactura->total = $totalSubtotal; // Asigna el total general calculado
        $nuevaFactura->save();

        // Obtener el ID de la factura recién creada
        $facturaID = $nuevaFactura->facturaID;

        // Iterar sobre cada producto en la factura temporal y crear los detalles de factura asociados
        foreach ($factura as $producto) {

            $nuevoDetalle = new detalle_factura();
            $nuevoDetalle->cantidad = $producto['cantidad'] ?? 0;
            $nuevoDetalle->precio_unitario = $producto['precio_unitario'] ?? 0;
            $nuevoDetalle->productoID = $producto['productoID'] ?? null;
            $nuevoDetalle->facturaID = $facturaID; // Asignar el ID de la factura principal al detalle
            $nuevoDetalle->save();
        }

        // Eliminar la factura de la sesión después de finalizar la venta
        $request->session()->forget('factura');

        // Redirigir de vuelta a la página de venta con un mensaje de éxito
        return view('venta.store')->with('success', 'Venta finalizada correctamente.');
    }

    public function limpiar(Request $request)
    {

        $request->session()->forget('factura');

        return redirect()->route('venta.create')->with('success', 'Factura limpiada correctamente.');
    }

}
