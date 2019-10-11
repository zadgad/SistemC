<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id_ubicacion');
            $table->boolean('activo');
            $table->integer('id_disp')->unsigned();
            $table->foreign('id_disp')-> references('id_sensor')->on('sensor')->onDelete('cascade');
            $table->integer('via_id');
            $table->foreign('via_id')-> references('id_via')->on('via')->onDelete('cascade');
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
        //
     Schema::dropIfExists('ubicacion');   
    }
}
