<?php

namespace Database\Factories;

use App\Models\factura;
use App\Models\detalle_factura;
use App\Models\cliente;
use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    protected $model = factura::class;

    public function definition()
    {
        return [
            'clienteID' => cliente::all()->random()->clienteID,
            'fecha' => fake()->dateTimeBetween('-1 year', 'now'),
            'total' => 0,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Factura $factura) {

            $detalles = detalle_factura::factory()->count(3)->create([
                'facturaID' => $factura->facturaID,
            ]);

            $total = $detalles->sum(function ($detalle) {
                return $detalle->cantidad * $detalle->precio_unitario;
            });

            $factura->update(['total' => $total]);
        });
    }
}
