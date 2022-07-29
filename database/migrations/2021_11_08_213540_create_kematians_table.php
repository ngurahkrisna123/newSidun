<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kematians', function (Blueprint $table) {
            $table->bigIncrements('idKematian');
            $table->string('nik');
            $table->string('nama');
            $table->string('jk');
            $table->string('tempatLahir');
            $table->date('tglLahir');
            $table->string('tempatMeninggal');
            $table->date('tglMeninggal');
            $table->string('sebabMeninggal');
            $table->string('kewarganegaraan');
            
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
        Schema::dropIfExists('kematians');
    }
}
