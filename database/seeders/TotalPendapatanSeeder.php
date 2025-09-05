<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TotalPendapatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('total_pendapatan')->insert([
            ['jumlah' => '150.000', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['jumlah' => '120.000', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['jumlah' => '120.000', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['jumlah' => '120.000', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['jumlah' => '120.000', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['jumlah' => '115.000', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}