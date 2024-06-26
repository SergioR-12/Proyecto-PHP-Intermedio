<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->id('detalleID');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 9, 2);
            $table->unsignedBigInteger('facturaID');
            $table->unsignedBigInteger('productoID');

            $table->foreign('facturaID')->references('facturaID')->on('factura')->onDelete('cascade');
            $table->foreign('productoID')->references('productoID')->on('producto')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_factura');
    }
};
