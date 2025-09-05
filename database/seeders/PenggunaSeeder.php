<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->insert([
            ['username' => 'tulissetioko', 'password' => Hash::make('kepaladesa'), 'id_dusun' => '1'],
            ['username' => 'purnomo', 'password' => Hash::make('sekretarisdesa'), 'id_dusun' => '1'],
            ['username' => 'tatakaji1', 'password' => Hash::make('pandeankidul'), 'id_dusun' => '2'],
            ['username' => 'tatakaji2', 'password' => Hash::make('sidadap'), 'id_dusun' => '3'],
            ['username' => 'jajar', 'password' => Hash::make('pandeanlor'), 'id_dusun' => '4'],
            ['username' => 'sardi', 'password' => Hash::make('dalangan'), 'id_dusun' => '5'],
            ['username' => 'dwiharyanto', 'password' => Hash::make('digulan'), 'id_dusun' => '6'],
            ['username' => 'rochmadsiyamto', 'password' => Hash::make('tanggulangin'), 'id_dusun' => '7'],
            ['username' => 'antonwibowo', 'password' => Hash::make('wonolobo'), 'id_dusun' => '8'],
        ]);
    }
}