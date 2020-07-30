<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionIusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_iu', function (Blueprint $table) {
            $table->integer('iu_d')->unsigned();
            $table->foreign('iu_d')->references('id_iu')->on('iu')->onDelete('cascade');
            $table->integer('funcion_id')->unsigned();
            $table->foreign('funcion_id')->references('id_funcion')->on('funcion')->ondelete('cascade');
            $table->boolean('activo');
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
        Schema::dropIfExists('funcion__ius');
    }
}
