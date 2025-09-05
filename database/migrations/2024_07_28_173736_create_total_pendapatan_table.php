<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalPendapatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_pendapatan', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah', 10);
            $table->timestamps();
            $table->foreignId('id_tahun')->constrained('tahun')->cascadeOnDelete();
            $table->foreignId('id_dusun')->constrained('dusun')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_pendapatan');
    }
}