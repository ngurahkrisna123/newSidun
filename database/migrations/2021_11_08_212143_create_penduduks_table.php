<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->bigIncrements('idPenduduk');
            $table->string('nik')->unique();
            $table->string('noKK');
            $table->string('namaPenduduk');
            $table->string('jk');
            $table->string('tempatLahir');
            $table->date('tglLahir');
            $table->string('golDarah');
            $table->string('alamat');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('status');
            $table->string('kewarganegaraan');
            $table->string('dusun');
            $table->date('tglbergabung');
            
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
        Schema::dropIfExists('penduduks');
    }
}
