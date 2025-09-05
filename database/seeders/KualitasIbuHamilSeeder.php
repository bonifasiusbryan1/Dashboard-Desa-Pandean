<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KualitasIbuHamilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kualitas_ibuhamil')->insert([
            ['kategori' => 'Diperiksa', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '5', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Diperiksa', 'jumlah' => '9', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Diperiksa', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Diperiksa', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Diperiksa', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Diperiksa', 'jumlah' => '9', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '5', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Diperiksa', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Selamat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Wafat Melahirkan', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
