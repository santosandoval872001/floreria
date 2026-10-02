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
        Schema::table('pedidos', function (Blueprint $table) {

            $table->string('pago')
                ->default('no_pagado')
                ->after('estado');

            $table->string('metodo_pago')
                ->nullable()
                ->after('pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {

            $table->dropColumn([
                'pago',
                'metodo_pago',
            ]);
        });
    }
};
