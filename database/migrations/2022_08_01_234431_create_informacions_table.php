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
        Schema::create('informacions', function (Blueprint $table) {
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
            $table->string('');
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('informacions');
    }
};
