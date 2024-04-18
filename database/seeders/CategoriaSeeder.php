<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oCategoria = new categoria();
        $oCategoria->nombre = 'Repuestos Carro';
        $oCategoria->descripcion = 'Repuestos varios para el carro';
        $oCategoria->save();

        categoria::factory(10)->create();
    }
}
