<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aset_tanah')->insert([
            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 1, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 80, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 70, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 90, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 40, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 58, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 70, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 38, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 100, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 5, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 3, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 8],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 8],

            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 69, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 100, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 35, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 20, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 10, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 1, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 7],

            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 47, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 8, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 7, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 15, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 5, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 5, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 2, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 1, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 3],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 3],

            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 102, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 58, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 13, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 4],

            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 15, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 10, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 5, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 2],

            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 20, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 30, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 10, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 6],

            ['jenis' => 'Tidak Memiliki Tanah', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => 25, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => 40, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => 15, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => 10, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
            ['jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => 0, 'id_tahun' => 1, 'id_dusun' => 5],
        ]);
    }
}
