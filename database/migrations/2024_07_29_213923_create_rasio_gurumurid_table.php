<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRasioGuruMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasio_gurumurid', function (Blueprint $table) {
            $table->id();
            $table->string('tingkat_pendidikan', 10);
            $table->string('jumlah_guru', 3);
            $table->string('jumlah_murid', 3);
            $table->foreignId('id_tahun')->constrained('tahun')->cascadeOnDelete();
            $table->foreignId('id_dusun')->constrained('dusun')->cascadeOnDelete();
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
        Schema::dropIfExists('rasio_gurumurid');
    }
}