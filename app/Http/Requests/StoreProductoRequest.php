<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|integer|min:0',
            'precio_unitario' => 'required|numeric|min:100',
            'categoriaID' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del producto es un campo que debe completar',
            'descripcion.required' => 'La descripción del producto es un campo que debe completar',
            'cantidad.required' => 'La cantidad del producto es un campo que debe completar',
            'cantidad.integer' => 'La cantidad del producto debe ser un valor numerico',
            'cantidad.min' => 'La cantidad debe ser mayor o igual que 0',
            'precio_unitario.required' => 'El precio unitario del producto es un campo que debe completar',
            'precio_unitario.numeric' => 'El precio unitario del producto debe ser un valor numerico',
            'precio_unitario.min' => 'El precio unitario debe ser mayor o igual que 100',
            'categoriaID.required' => 'Debe seleccionar la categoria del producto',
        ];
    }
}
