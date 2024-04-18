<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oCliente = new cliente();
        $oCliente->nombre = 'Sergio';
        $oCliente->apellidos = 'Rodríguez Fallas';
        $oCliente->email = 'test@example.com';
        $oCliente->telefono = '+506 4565-6789';
        $oCliente->save();

        cliente::factory(10)->create();
    }
}
