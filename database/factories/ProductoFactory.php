<?php

namespace Database\Factories;

use App\Models\categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->text(10),
            'descripcion' => fake()->text(25),
            'precio_unitario' => fake()->randomFloat(0, 500, 10000),
            'cantidad' => fake()->numberBetween(10, 100),
            'categoriaID' => categoria::all()->random()->categoriaID
        ];
    }
}
