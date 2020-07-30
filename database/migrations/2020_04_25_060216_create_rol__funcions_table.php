<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolFuncionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_funcion', function (Blueprint $table) {
            $table->boolean('activo');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id_rol')->on('rol')->onDelete('cascade');
            $table->integer('funcion_id')->unsigned();
            $table->foreign('funcion_id')-> references('id_funcion')->on('funcion')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('rol__funcions');
    }
}
