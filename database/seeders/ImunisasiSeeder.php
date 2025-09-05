<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImunisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imunisasi')->insert([
            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Campak', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Cacar', 'jumlah' => '34', 'id_tahun' => '1', 'id_dusun' => '8'],

            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Campak', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Cacar', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '7'],

            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Campak', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Cacar', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],

            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Campak', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Cacar', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],

            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Campak', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Cacar', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],

            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Campak', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Cacar', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],

            ['kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'DPT-2 dan Polio-2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'DPT-3 dan Polio-3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Campak', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Cacar', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
