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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('productoID');
            $table->string('nombre', 30);
            $table->string('descripcion', 100);
            $table->decimal('precio_unitario', 9, 2);
            $table->integer('cantidad');
            $table->unsignedBigInteger('categoriaID');

            $table->foreign('categoriaID')->references('categoriaID')->on('categoria')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
