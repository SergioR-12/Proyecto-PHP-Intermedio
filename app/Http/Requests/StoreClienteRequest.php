<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'apellidos' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del cliente es un campo que debe completar',
            'apellidos.required' => 'Los apellidos del cliente es un campo que debe completar',
            'email.required' => 'El email del cliente es un campo que debe completar',
            'email.email' => 'El email del cliente debe ser una cuenta de correo electronico valida',
            'telefono.required' => 'El telefono del cliente es un campo que debe completar',
        ];
    }

}
