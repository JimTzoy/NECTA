<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_tipo_pago', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('nombre')->nullable();
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->unsignedBigInteger('pago_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('tipo_pago_id');
            $table->timestamps();
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
            $table->foreign('tipo_pago_id')
                ->references('id')
                ->on('tipo_pagos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipopago_user');
    }
};
