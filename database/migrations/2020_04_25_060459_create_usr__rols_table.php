<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsrRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usr_rol', function (Blueprint $table) {
            $table->integer('usr_id')->unsigned();
            $table->foreign('usr_id')->references('id_usr')->on('usr')->onDelete('cascade');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id_rol')->on('rol')->onDelete('cascade');
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
        Schema::dropIfExists('usr__rols');
    }
}
