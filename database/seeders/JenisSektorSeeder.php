<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_sektor')->insert([
            ['id' => 1, 'nama_sektor' => 'Peternakan'],
            ['id' => 2, 'nama_sektor' => 'Pertanian'],
            ['id' => 3, 'nama_sektor' => 'Jasa dan Perdagangan'],
            ['id' => 4, 'nama_sektor' => 'Industri'],
        ]);
    }
}