<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClienteRequest;

class clientesController extends Controller
{
    public function index()
    {
        $oClientes = cliente::paginate(5);
        return view('clientes.index', compact('oClientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(StoreClienteRequest $request)
    {
        $oCliente = cliente::create([
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
        ]);

        return redirect()->route('clientes.index');
    }

    public function edit(cliente $clientes)
    {
        $oCliente = $clientes;
        return view('clientes.edit', compact('oCliente'));
    }

    public function update(StoreClienteRequest $request, cliente $clientes)
    {
        $oCliente = $clientes;

        $oCliente->update([
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),

        ]);

        return redirect()->route('clientes.index');
    }
}
