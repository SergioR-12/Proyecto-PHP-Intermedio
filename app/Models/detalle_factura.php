<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_factura extends Model
{
    use HasFactory;
    protected $table = 'detalle_factura';
    protected $primaryKey = 'detalleID';
    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'facturaID',
        'productoID',
    ];
}
