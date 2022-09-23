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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('NoCliente');
            $table->string('Nombre');
            $table->string('ApPaterno');
            $table->string('ApMaterno');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->string('Ciudad');
            $table->string('Descripcion');
            $table->string('FechaContrato');
            $table->string('idAntena');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('zona_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('plan_id')
            ->references('id')
            ->on('plans')
            ->onDelete('cascade');
            $table->foreign('zona_id')
            ->references('id')
            ->on('zonas')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
