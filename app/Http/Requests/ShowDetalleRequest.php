<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowDetalleRequest extends FormRequest
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
            'numero_factura' => 'required|exists:factura,facturaID'
        ];
    }

    public function messages()
    {
        return [
            'numero_factura.required' => 'El ID de la Factura es obligatorio',
            'numero_factura.exists' => 'El ID de la Factura no existe'
        ];
    }
}
