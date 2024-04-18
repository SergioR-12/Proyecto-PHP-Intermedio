<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oProducto = new producto();
        $oProducto->nombre = 'Repuesto 1';
        $oProducto->descripcion = 'Repuesto para el carro';
        $oProducto->precio_unitario = 500.00;
        $oProducto->cantidad = 25;
        $oProducto->categoriaID = 1;
        $oProducto->save();

        $oProducto2 = new producto();
        $oProducto2->nombre = 'Repuesto 2';
        $oProducto2->descripcion = 'Repuesto para el carro';
        $oProducto2->precio_unitario = 1000.00;
        $oProducto2->cantidad = 10;
        $oProducto2->categoriaID = 1;
        $oProducto2->save();

        //producto::factory(25)->create();
    }
}
