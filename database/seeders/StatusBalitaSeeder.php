<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusBalitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_balita')->insert([
            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],

            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '25', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '25', 'id_tahun' => '1', 'id_dusun' => '7'],

            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '18', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '18', 'id_tahun' => '1', 'id_dusun' => '3'],

            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '82', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '82', 'id_tahun' => '1', 'id_dusun' => '4'],

            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '32', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '32', 'id_tahun' => '1', 'id_dusun' => '2'],

            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '44', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '47', 'id_tahun' => '1', 'id_dusun' => '6'],

            ['kategori' => 'Bergizi Buruk', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Bergizi Baik', 'jumlah' => '22', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Bergizi Kurang', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Bergizi Lebih', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '22', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
