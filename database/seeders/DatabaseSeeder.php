<?php

namespace Database\Seeders;

use App\Models\AsetTanah;
use App\Models\KualitasIbuHamil;
use App\Models\RasioGuruMurid;
use GuzzleHttp\Promise\AggregateException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DusunSeeder::class,
            PenggunaSeeder::class,
            JenisSektorSeeder::class,
            TahunSeeder::class,
            PendapatanPerkapitaSeeder::class,
            MataPencaharianSeeder::class,
            TotalPendapatanSeeder::class,
            AsetTanahSeeder::class,
            TingkatPendidikanSeeder::class,
            WajibBelajarSeeder::class,
            RasioGuruMuridSeeder::class,
            KualitasIbuHamilSeeder::class,
            ImunisasiSeeder::class,
            KualitasBayiSeeder::class,
            KebutuhanAirSeeder::class,
            StatusBalitaSeeder::class,
            PekerjaanSeeder::class,
            UsiaSeeder::class,
            AgamaSeeder::class,
        ]);
    }
}