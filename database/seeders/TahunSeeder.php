<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahun')->insert([
            ['id' => 1, 'tahun' => '2024'],
            ['id' => 2, 'tahun' => '2025'],
            ['id' => 3, 'tahun' => '2026'],
            ['id' => 4, 'tahun' => '2027'],
        ]);
    }
}