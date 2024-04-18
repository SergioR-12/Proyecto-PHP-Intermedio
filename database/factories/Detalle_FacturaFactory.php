<?php

namespace Database\Factories;

use App\Models\cliente;
use App\Models\detalle_factura;
use App\Models\factura;
use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detalle_factura>
 */
class Detalle_FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = detalle_factura::class;

    public function definition(): array
    {
        $productos = producto::factory()->create();

        return [
            'cantidad' => fake()->numberBetween(1, 10),
            'precio_unitario' => $productos->precio_unitario,
            'productoID' => $productos->productoID,
        ];
    }
}
