<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePindahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindahs', function (Blueprint $table) {
            $table->bigIncrements('idPindah');
            $table->string('nik');
            $table->string('nama');
            $table->date('tglPindah');
            $table->string('alamatAsal');
            $table->string('alamatPindah');
            $table->string('agama');
            $table->string('jk');
            $table->string('pekerjaan');
            $table->string('keterangan');
            $table->string('status');
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
        Schema::dropIfExists('pindahs');
    }
}
