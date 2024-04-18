<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\factura;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ClienteSeeder::class,
            FacturaSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class,
            DetalleSeeder::class
        ]);

        factura::factory(10)->create();
    }
}
