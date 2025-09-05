<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WajibBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wajib_belajar')->insert([
            ['kategori' => 'Masih Sekolah', 'jumlah' => '94', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Masih Sekolah', 'jumlah' => '88', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Masih Sekolah', 'jumlah' => '38', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Masih Sekolah', 'jumlah' => '143', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Masih Sekolah', 'jumlah' => '54', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Masih Sekolah', 'jumlah' => '68', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Masih Sekolah', 'jumlah' => '73', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Tidak Sekolah', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}