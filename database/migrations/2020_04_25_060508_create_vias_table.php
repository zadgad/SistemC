<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('via', function (Blueprint $table) {
            $table->increments('id_via');
            $table->string('tipo',300);
            $table->integer('nuncarril');
            $table->integer('dimension');
            $table->string('clasificacion',300);
            $table->string('nomvia', 300);
            $table->integer('ciu');
            $table->foreign('ciu')-> references('id_ciudad')->on('ciudad')->onDelete('cascade');
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
        Schema::dropIfExists('vias');
    }
}
