<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableAyar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->string('email');
            $table->string('tel');
            $table->string('fax');
            $table->string('adres');
            $table->string('logo');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
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
        Schema::dropIfExists('ayar');
    }
}
