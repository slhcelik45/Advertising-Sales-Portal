<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRadyolar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radyolar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('radyoId');
            $table->string('baslangicSaat');
            $table->string('bitisSaat');
            $table->string('baslangicTarih');
            $table->string('bitisTarih');
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
        Schema::dropIfExists('radyolar');
    }
}
