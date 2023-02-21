<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id');
            $table->string('nik');
            $table->string('jenis');
            $table->integer('tahun_lapor');
            $table->string('bulan_lapor');
            $table->string('tgl_kunjungan');
            $table->string('no_reg_nas');
            $table->string('no_telp');
            $table->string('tgl_lahir');
            $table->string('jk');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('hamil');
            $table->string('fungsional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
};
