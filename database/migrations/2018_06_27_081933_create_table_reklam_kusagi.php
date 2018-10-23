<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReklamKusagi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reklamkusagi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reklmaTipiId');
            $table->integer('kampanyaId');
            $table->integer('sure');
            $table->integer('gunlukSpot');
            $table->integer('fiyat');
            $table->text('aciklama');
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
        Schema::dropIfExists('reklamkusagi');
    }
}
