<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimuladorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulador', function (Blueprint $table) {
            $table->bigIncrements('id_simu');
            $table->string('nombsen',200);
            $table->string('dep',200);
            $table->string('ciudad',300);
            $table->string('via',200);
            $table->decimal('distance');
            $table->integer('nuncarril');
            $table->integer('#ejes');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('usr_id')->unsigned();
            $table->foreign('usr_id')->references('id_usr')->on('usr')->onDelete('cascade');
            $table->string('clasifi',200);
            $table->string('tipov',200);
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
        Schema::dropIfExists('simuladors');
    }
}
