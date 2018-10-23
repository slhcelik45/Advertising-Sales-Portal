<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSirket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sektorId');
            $table->integer('usersId');
            $table->string('adi');
            $table->text('adres');
            $table->string('tel');
            $table->string('email');
            $table->string('logo');
            $table->string('yoneticiadi');
            $table->string('yoneticisoyadi');
            $table->string('yoneticiceptel');
            $table->string('yoneticiemail');
            $table->string('yoneticifoto');
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
        Schema::dropIfExists('sirket');
    }
}
