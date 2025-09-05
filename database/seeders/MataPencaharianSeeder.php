<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPencaharianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_pencaharian')->insert([
            ['perorangan' => '771', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '771', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '2'],
            ['perorangan' => '2', 'usaha' => '2', 'buruh' => '0', 'jumlah' => '4', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '1'],
            ['perorangan' => '10', 'usaha' => '0', 'buruh' => '30', 'jumlah' => '40', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '3'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8', 'id_sektor' => '4'],
            ['perorangan' => '408', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '408', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '2'],
            ['perorangan' => '8', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '8', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '1'],
            ['perorangan' => '0', 'usaha' => '9', 'buruh' => '1', 'jumlah' => '10', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '3'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7', 'id_sektor' => '4'],
            ['perorangan' => '195', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '195', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '2'],
            ['perorangan' => '3', 'usaha' => '3', 'buruh' => '0', 'jumlah' => '6', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '1'],
            ['perorangan' => '0', 'usaha' => '2', 'buruh' => '0', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '3'],
            ['perorangan' => '1', 'usaha' => '8', 'buruh' => '0', 'jumlah' => '9', 'id_tahun' => '1', 'id_dusun' => '3', 'id_sektor' => '4'],
            ['perorangan' => '538', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '538', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '2'],
            ['perorangan' => '19', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '19', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '1'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '3'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4', 'id_sektor' => '4'],
            ['perorangan' => '137', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '137', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '2'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '1'],
            ['perorangan' => '0', 'usaha' => '1', 'buruh' => '0', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '3'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2', 'id_sektor' => '4'],
            ['perorangan' => '289', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '289', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '2'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '1'],
            ['perorangan' => '0', 'usaha' => '6', 'buruh' => '0', 'jumlah' => '6', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '3'],
            ['perorangan' => '2', 'usaha' => '4', 'buruh' => '0', 'jumlah' => '6', 'id_tahun' => '1', 'id_dusun' => '6', 'id_sektor' => '4'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '2'],
            ['perorangan' => '10', 'usaha' => '10', 'buruh' => '12', 'jumlah' => '32', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '1'],
            ['perorangan' => '6', 'usaha' => '3', 'buruh' => '6', 'jumlah' => '15', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '3'],
            ['perorangan' => '0', 'usaha' => '0', 'buruh' => '0', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5', 'id_sektor' => '4'],
        ]);
    }
}