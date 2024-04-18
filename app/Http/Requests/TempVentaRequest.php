<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempVentaRequest extends FormRequest
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
            //
            'productoID' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:1',
            'subtotal' => 'required|numeric|min:100',
        ];
    }

    public function messages()
    {
        return [
            'productoID.required' => 'Debe seleccionar un producto',
            'cantidad.required' => 'La cantidad del producto es un campo que debe completar',
            'cantidad.integer' => 'La cantidad del producto debe ser un valor numerico',
            'cantidad.min' => 'La cantidad debe ser mayor o igual que 1',
            'precio_unitario.required' => 'El precio unitario del producto es un campo que debe completar',
            'precio_unitario.numeric' => 'El precio unitario del producto debe ser un valor numerico',
            'precio_unitario.min' => 'El precio unitario debe ser mayor o igual que 100',
            'subtotal.required' => 'El subtotal del producto es un campo que debe completar',
        ];
    }
}
