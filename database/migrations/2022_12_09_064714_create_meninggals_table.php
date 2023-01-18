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
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id');
            $table->string('tgl_meninggal');
            $table->text('keterangan');
            $table->string('tgl_kunjungan_akhir');
            $table->string('tgl_rujuk_keluar');
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
        Schema::dropIfExists('meninggals');
    }
};
