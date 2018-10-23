<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReklamlar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reklamlar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sirketId');
            $table->integer('sektorId');
            $table->integer('reklamTipiId');
            $table->integer('kampanyaId');
            $table->integer('kullaniciId');
            $table->string('adi');
            $table->string('slogan');
            $table->date('basangicTarih');
            $table->date('bitisTarih');
            $table->text('aciklama');
            $table->string('resim');
            $table->string('video');
            $table->string('dokuman');
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
        Schema::dropIfExists('reklamlar');
    }
}
