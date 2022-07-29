<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendatangs', function (Blueprint $table) {
            $table->bigIncrements('idPendatang');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->date('tglDatang');
            $table->string('alamatAsal');
            $table->string('alamatSekarang');
            $table->string('agama');
            $table->string('jk');
            $table->string('pekerjaan');
            $table->string('status');
            $table->string('keterangan');
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
        Schema::dropIfExists('pendatangs');
    }
}
