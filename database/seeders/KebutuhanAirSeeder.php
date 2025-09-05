<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KebutuhanAirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kebutuhan_air')->insert([
            ['kategori' => 'Sumur Gali', 'jumlah' => '250', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'PAM', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Mata Air', 'jumlah' => '20', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '270', 'id_tahun' => '1', 'id_dusun' => '8'],

            ['kategori' => 'Sumur Gali', 'jumlah' => '45', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'PAM', 'jumlah' => '155', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Mata Air', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '200', 'id_tahun' => '1', 'id_dusun' => '7'],

            ['kategori' => 'Sumur Gali', 'jumlah' => '10', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'PAM', 'jumlah' => '90', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Mata Air', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '100', 'id_tahun' => '1', 'id_dusun' => '3'],

            ['kategori' => 'Sumur Gali', 'jumlah' => '105', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'PAM', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '80', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Mata Air', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '185', 'id_tahun' => '1', 'id_dusun' => '4'],

            ['kategori' => 'Sumur Gali', 'jumlah' => '120', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'PAM', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Mata Air', 'jumlah' => '60', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '180', 'id_tahun' => '1', 'id_dusun' => '2'],

            ['kategori' => 'Sumur Gali', 'jumlah' => '104', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'PAM', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Mata Air', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '157', 'id_tahun' => '1', 'id_dusun' => '6'],

            ['kategori' => 'Sumur Gali', 'jumlah' => '86', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'PAM', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Hidran Umum', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Mata Air', 'jumlah' => '62', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Jumlah Keluarga', 'jumlah' => '158', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
