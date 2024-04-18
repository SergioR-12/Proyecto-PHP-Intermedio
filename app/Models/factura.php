<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table = 'factura';
    protected $primaryKey = 'facturaID';
    protected $fillable = [
        'clienteID',
        'fecha',
        'total',
    ];
}
