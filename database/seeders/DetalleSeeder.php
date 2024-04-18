<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\detalle_factura;

class DetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oDetalle = new detalle_factura();
        $oDetalle->cantidad = 3;
        $oDetalle->precio_unitario = 500.00;
        $oDetalle->facturaID = 1;
        $oDetalle->productoID = 1;
        $oDetalle->save();

        $oDetalle2 = new detalle_factura();
        $oDetalle2->cantidad = 1;
        $oDetalle2->precio_unitario = 1000.00;
        $oDetalle2->facturaID = 1;
        $oDetalle2->productoID = 2;
        $oDetalle2->save();
    }
}
