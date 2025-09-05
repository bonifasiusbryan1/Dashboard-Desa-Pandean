<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agama')->insert([
            ['agama' => 'Islam', 'jumlah' => '738', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['agama' => 'Kristen', 'jumlah' => '27', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['agama' => 'Katholik', 'jumlah' => '14', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['agama' => 'Islam', 'jumlah' => '664', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['agama' => 'Kristen', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['agama' => 'Katholik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['agama' => 'Islam', 'jumlah' => '295', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['agama' => 'Kristen', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['agama' => 'Katholik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['agama' => 'Islam', 'jumlah' => '1032', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['agama' => 'Kristen', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['agama' => 'Katholik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['agama' => 'Islam', 'jumlah' => '519', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['agama' => 'Kristen', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['agama' => 'Katholik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['agama' => 'Islam', 'jumlah' => '483', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['agama' => 'Kristen', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['agama' => 'Katholik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['agama' => 'Islam', 'jumlah' => '521', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['agama' => 'Kristen', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['agama' => 'Katholik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['agama' => 'Buddha', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['agama' => 'Konghucu', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
