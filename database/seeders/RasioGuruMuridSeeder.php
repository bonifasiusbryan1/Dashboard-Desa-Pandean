<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RasioGuruMuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rasio_gurumurid')->insert([
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 2, 'jumlah_murid' => 15, 'id_tahun' => '1', 'id_dusun' => '8'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '8'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '8'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '8'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '8'],
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 0, 'jumlah_murid' => 24, 'id_tahun' => '1', 'id_dusun' => '7'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 5, 'jumlah_murid' => 38, 'id_tahun' => '1', 'id_dusun' => '7'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 5, 'jumlah_murid' => 26, 'id_tahun' => '1', 'id_dusun' => '7'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 1, 'jumlah_murid' => 24, 'id_tahun' => '1', 'id_dusun' => '7'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 0, 'jumlah_murid' => 1, 'id_tahun' => '1', 'id_dusun' => '7'],
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 0, 'jumlah_murid' => 16, 'id_tahun' => '1', 'id_dusun' => '3'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 0, 'jumlah_murid' => 24, 'id_tahun' => '1', 'id_dusun' => '3'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 0, 'jumlah_murid' => 14, 'id_tahun' => '1', 'id_dusun' => '3'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 0, 'jumlah_murid' => 10, 'id_tahun' => '1', 'id_dusun' => '3'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '3'],
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 3, 'jumlah_murid' => 43, 'id_tahun' => '1', 'id_dusun' => '4'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 0, 'jumlah_murid' => 92, 'id_tahun' => '1', 'id_dusun' => '4'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 0, 'jumlah_murid' => 51, 'id_tahun' => '1', 'id_dusun' => '4'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 0, 'jumlah_murid' => 40, 'id_tahun' => '1', 'id_dusun' => '4'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 1, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '4'],
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 0, 'jumlah_murid' => 16, 'id_tahun' => '1', 'id_dusun' => '2'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 2, 'jumlah_murid' => 30, 'id_tahun' => '1', 'id_dusun' => '2'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 1, 'jumlah_murid' => 24, 'id_tahun' => '1', 'id_dusun' => '2'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 0, 'jumlah_murid' => 24, 'id_tahun' => '1', 'id_dusun' => '2'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '2'],
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 0, 'jumlah_murid' => 18, 'id_tahun' => '1', 'id_dusun' => '6'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 2, 'jumlah_murid' => 30, 'id_tahun' => '1', 'id_dusun' => '6'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 0, 'jumlah_murid' => 20, 'id_tahun' => '1', 'id_dusun' => '6'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 1, 'jumlah_murid' => 10, 'id_tahun' => '1', 'id_dusun' => '6'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 1, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '6'],
            ['tingkat_pendidikan' => 'TK', 'jumlah_guru' => 1, 'jumlah_murid' => 26, 'id_tahun' => '1', 'id_dusun' => '5'],
            ['tingkat_pendidikan' => 'SD', 'jumlah_guru' => 0, 'jumlah_murid' => 47, 'id_tahun' => '1', 'id_dusun' => '5'],
            ['tingkat_pendidikan' => 'SMP', 'jumlah_guru' => 0, 'jumlah_murid' => 38, 'id_tahun' => '1', 'id_dusun' => '5'],
            ['tingkat_pendidikan' => 'SMA', 'jumlah_guru' => 0, 'jumlah_murid' => 23, 'id_tahun' => '1', 'id_dusun' => '5'],
            ['tingkat_pendidikan' => 'SLB', 'jumlah_guru' => 0, 'jumlah_murid' => 0, 'id_tahun' => '1', 'id_dusun' => '5']
        ]);
    }
}
