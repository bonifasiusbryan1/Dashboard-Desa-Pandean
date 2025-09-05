<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tingkat_pendidikan')->insert([
            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'TK', 'jumlah' => '66', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '184', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '152', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '117', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '167', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '67', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '11', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '8'],

            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'TK', 'jumlah' => '24', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '234', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '75', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '177', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '115', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '41', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '7'],

            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'TK', 'jumlah' => '10', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '94', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '30', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '101', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '35', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '4', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '3'],

            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'TK', 'jumlah' => '28', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '392', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '150', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '252', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '79', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '90', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '26', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '4'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '4'],

            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'TK', 'jumlah' => '25', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '187', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '171', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '40', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '3', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '81', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '2', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '7', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '2'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '2'],

            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'TK', 'jumlah' => '30', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '88', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '73', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '43', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '4', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '48', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '1', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '6', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '6'],

            ['pendidikan' => 'Buta Aksara', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'TK', 'jumlah' => '24', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => '193', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Tidak Tamat SD', 'jumlah' => '22', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => '78', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Tidak Tamat SMP', 'jumlah' => '54', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => '40', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Tidak Tamat SMA', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => '5', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
            ['pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => '0', 'id_tahun' => '1', 'id_dusun' => '5'],
        ]);
    }
}
