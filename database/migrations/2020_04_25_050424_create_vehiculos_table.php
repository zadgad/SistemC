<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('id_tipo');
            $table->string('nombr_ve',300)->unique();
            $table->integer('peso');
            $table->integer('pesoI');
            $table->integer('distan_ini');
            $table->integer('distaci_fin');
            $table->boolean('activo');
            $table->integer('orden');
            $table->string('imagen',300);
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
        Schema::dropIfExists('vehiculos');
    }
}
