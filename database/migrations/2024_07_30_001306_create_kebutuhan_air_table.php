<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebutuhanAirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebutuhan_air', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 30);
            $table->string('jumlah', 3);
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
        Schema::dropIfExists('kebutuhan_air');
    }
}
