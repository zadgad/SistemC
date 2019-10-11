<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSesionTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesion', function (Blueprint $table) {
            $table->increments('id_sesion');
            $table->boolean('activo');
            $table->text('pid');
            $table->integer('usr_id')->unsigned();
            $table->foreign('usr_id')->references('id_usr')->on('usr')->onDelete('cascade');
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
        Schema::dropIfExists('sesion');
    }
}
