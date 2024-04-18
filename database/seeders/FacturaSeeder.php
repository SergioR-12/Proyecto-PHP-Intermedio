<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\factura;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oFactura = new factura();
        $oFactura->fecha = date_timestamp_set(date_create(), strtotime('now'));
        $oFactura->total = 2500.00;
        $oFactura->clienteID = 1;
        $oFactura->save();
    }
}
