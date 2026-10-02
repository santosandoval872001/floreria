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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            // Datos del clientes
            $table->string('nombre_cliente');
            $table->string('telefono');
            $table->string('email')->nullable();

            // Datos del pedido
            $table->text('direccion');
            $table->text('mensaje')->nullable();

            // Total del pedido
            $table->decimal('total', 10, 2);

            // Estado del pedido
            $table->string('estado')->default('pendiente');

            $table->string('pago')->default('no_pagado');
            $table->string('metodo_pago')->nullable();
            
            $table->$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
