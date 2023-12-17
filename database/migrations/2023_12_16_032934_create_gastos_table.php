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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tpg_id');
            $table->unsignedBigInteger('tpb_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('tpb_id')
            ->references('id')
            ->on('tipo_bancos')
            ->onDelete('cascade');
            $table->foreign('tpg_id')
            ->references('id')
            ->on('tipo_gastos')
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
        Schema::dropIfExists('gastos');
    }
};
