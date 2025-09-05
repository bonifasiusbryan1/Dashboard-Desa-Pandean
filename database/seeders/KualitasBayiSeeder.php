<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KualitasBayiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kualitas_bayi')->insert([
            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Sehat', 'jumlah' => '5', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '8'],

            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Sehat', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],

            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Sehat', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],

            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Sehat', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],

            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Sehat', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],

            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Sehat', 'jumlah' => '5', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],

            ['kategori' => 'Keguguran', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Meninggal', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Sehat', 'jumlah' => '4', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['kategori' => 'Kelainan Fisik/Mental', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
