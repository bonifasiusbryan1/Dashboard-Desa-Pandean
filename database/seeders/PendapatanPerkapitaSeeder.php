<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendapatanPerkapitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendapatan_perkapita')->insert([
            ['pendapatan' => '75000', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '1'],
            ['pendapatan' => '100000', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '2'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '3'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '4'],
            ['pendapatan' => '150000', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '1'],
            ['pendapatan' => '100000', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '2'],
            ['pendapatan' => '100000', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '3'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '4'],
            ['pendapatan' => '150000', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '1'],
            ['pendapatan' => '80000', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '2'],
            ['pendapatan' => '100000', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '3'],
            ['pendapatan' => '80000', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '4'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '1'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '2'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '3'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '4'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '1'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '2'],
            ['pendapatan' => '100000', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '3'],
            ['pendapatan' => '80000', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '4'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '1'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '2'],
            ['pendapatan' => '100000', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '3'],
            ['pendapatan' => '150000', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '4'],
            ['pendapatan' => '80000', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '1'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '2'],
            ['pendapatan' => '40000', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '3'],
            ['pendapatan' => '0', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '4'],
        ]);
    }
}