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
        Schema::create('distribusi_obats', function (Blueprint $table) {
            $table->id();
            $table->integer('faskes_id');
            $table->integer('pasien_id');
            $table->integer('obat_id');
            $table->integer('jumlah');
            $table->string('dosis');
            $table->text('waktu');
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
        Schema::dropIfExists('distribusi_obats');
    }
};
