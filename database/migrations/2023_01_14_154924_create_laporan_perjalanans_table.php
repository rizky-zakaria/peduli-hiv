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
        Schema::create('laporan_perjalanans', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id');
            $table->string('tgl_kunjungan');
            $table->string('tgl_pulang');
            $table->text('tujuan');
            $table->text('keterangan');
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
        Schema::dropIfExists('laporan_perjalanans');
    }
};
