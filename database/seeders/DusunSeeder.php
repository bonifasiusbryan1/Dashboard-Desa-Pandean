<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dusun')->insert([
            ['id' => 1, 'nama_dusun' => 'Pandean'],
            ['id' => 2, 'nama_dusun' => 'Pandean Kidul'],
            ['id' => 3, 'nama_dusun' => 'Sidadap'],
            ['id' => 4, 'nama_dusun' => 'Pandean Lor'],
            ['id' => 5, 'nama_dusun' => 'Dalangan'],
            ['id' => 6, 'nama_dusun' => 'Digulan'],
            ['id' => 7, 'nama_dusun' => 'Tanggulangin'],
            ['id' => 8, 'nama_dusun' => 'Wonolobo'],
        ]);
    }
}