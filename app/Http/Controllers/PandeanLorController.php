<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PendapatanPerkapita;
use App\Models\MataPencaharian;
use App\Models\Pekerjaan;
use App\Models\Usia;
use App\Models\KualitasBayi;
use App\Models\KualitasIbuHamil;
use App\Models\StatusBalita;
use App\Models\Imunisasi;
use App\Models\RasioGuruMurid;
use App\Models\WajibBelajar;
use App\Models\Agama;
use App\Models\TingkatPendidikan;
use App\Models\KebutuhanAir;
use App\Models\AsetTanah;

class PandeanLorController extends Controller
{
    public function pandeanlorData()
    {
        $pendapatanData = PendapatanPerkapita::with('tahun', 'dusun', 'jenisSektor')
            ->where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $pendapatanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Pendapatan Perkapita Masyarakat (dalam Rupiah)',
                    'data' => [],
                    'backgroundColor' => 'rgb(0, 150, 255)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        foreach ($pendapatanData as $item) {
            $pendapatanChartData['labels'][] = $item->jenisSektor->nama_sektor;
            $pendapatanChartData['datasets'][0]['data'][] = $item->pendapatan;
        }

        $mataPencaharianData = MataPencaharian::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $sectors = [
            1 => $mataPencaharianData->where('id_sektor', 1)->first()->perorangan ?? 0,
            2 => $mataPencaharianData->where('id_sektor', 2)->first()->perorangan ?? 0,
            3 => $mataPencaharianData->where('id_sektor', 3)->first()->perorangan ?? 0,
            4 => $mataPencaharianData->where('id_sektor', 4)->first()->perorangan ?? 0,
            5 => $mataPencaharianData->where('id_sektor', 1)->first()->usaha ?? 0,
            6 => $mataPencaharianData->where('id_sektor', 2)->first()->usaha ?? 0,
            7 => $mataPencaharianData->where('id_sektor', 3)->first()->usaha ?? 0,
            8 => $mataPencaharianData->where('id_sektor', 4)->first()->usaha ?? 0,
            9 => $mataPencaharianData->where('id_sektor', 1)->first()->buruh ?? 0,
            10 => $mataPencaharianData->where('id_sektor', 2)->first()->buruh ?? 0,
            11 => $mataPencaharianData->where('id_sektor', 3)->first()->buruh ?? 0,
            12 => $mataPencaharianData->where('id_sektor', 4)->first()->buruh ?? 0,
            13 => $mataPencaharianData->where('id_sektor', 1)->first()->jumlah ?? 0,
            14 => $mataPencaharianData->where('id_sektor', 2)->first()->jumlah ?? 0,
            15 => $mataPencaharianData->where('id_sektor', 3)->first()->jumlah ?? 0,
            16 => $mataPencaharianData->where('id_sektor', 4)->first()->jumlah ?? 0,
        ];

        $totalPekerja = $mataPencaharianData->sum('jumlah');

        $pekerjaanData = Pekerjaan::with('dusun', 'tahun')
            ->where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $pekerjaanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pekerjaan',
                    'data' => [],
                    'backgroundColor' => [
                        'rgb(0, 150, 255)',
                        'rgb(191, 64, 191)',
                        'rgb(34, 139, 34)',
                        'rgb(255, 234, 0)',
                        'rgb(255, 172, 28)',
                        'rgb(255, 36, 0)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 0.5,
                    'hoverOffset' => 4
                ]
            ]
        ];

        foreach ($pekerjaanData as $item) {
            $pekerjaanChartData['labels'][] = $item->pekerjaan;
            $pekerjaanChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $usiaData = Usia::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $usiaChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => [],
                    'backgroundColor' => 'rgba(0, 123, 255, 0.5)'
                ],
                [
                    'label' => 'Perempuan',
                    'data' => [],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)'
                ]
            ]
        ];

        foreach ($usiaData as $item) {
            $usiaChartData['labels'][] = $item->rentang_usia;
            $usiaChartData['datasets'][0]['data'][] = $item->laki_laki;
            $usiaChartData['datasets'][1]['data'][] = $item->perempuan;
        }

        $kualitasBayiData = KualitasBayi::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $kualitasBayiChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($kualitasBayiData as $item) {
            $kualitasBayiChartData['labels'][] = $item->kategori;
            $kualitasBayiChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $kualitasIbuHamilData = KualitasIbuHamil::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $kualitasIbuHamilChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($kualitasIbuHamilData as $item) {
            $kualitasIbuHamilChartData['labels'][] = $item->kategori;
            $kualitasIbuHamilChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $statusBalitaData = StatusBalita::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $statusBalitaChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($statusBalitaData as $item) {
            $statusBalitaChartData['labels'][] = $item->kategori;
            $statusBalitaChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $imunisasiData = Imunisasi::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $imunisasiChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($imunisasiData as $item) {
            $imunisasiChartData['labels'][] = $item->kategori;
            $imunisasiChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $rasioGuruMuridData = RasioGuruMurid::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $rasioGuruMuridChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Guru',
                    'data' => [],
                    'backgroundColor' => 'rgba(0, 123, 255, 0.5)',
                    'borderColor' => 'rgba(0, 123, 255, 1)',
                    'fill' => true,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'pointBackgroundColor' => 'rgba(0, 123, 255, 0.5)',
                    'pointBorderColor' => 'rgb(0, 0, 0)'
                ],
                [
                    'label' => 'Jumlah Murid',
                    'data' => [],
                    'backgroundColor' => 'rgba(255, 206, 86, 0.5)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'fill' => true,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'pointBackgroundColor' => 'rgba(255, 99, 132, 0.5)',
                    'pointBorderColor' => 'rgb(0, 0, 0)'
                ]
            ]
        ];

        foreach ($rasioGuruMuridData as $item) {
            $rasioGuruMuridChartData['labels'][] = $item->tingkat_pendidikan;
            $rasioGuruMuridChartData['datasets'][0]['data'][] = $item->jumlah_guru;
            $rasioGuruMuridChartData['datasets'][1]['data'][] = $item->jumlah_murid;
        }

        $statusPendidikanData = WajibBelajar::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $statusPendidikanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($statusPendidikanData as $item) {
            $statusPendidikanChartData['labels'][] = $item->kategori;
            $statusPendidikanChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $agamaData = Agama::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $agamaChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pemeluk (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($agamaData as $item) {
            $agamaChartData['labels'][] = $item->agama;
            $agamaChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $tingkatPendidikanData = TingkatPendidikan::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $tingkatPendidikanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pengampu (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => 'rgb(248, 131, 121)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        foreach ($tingkatPendidikanData as $item) {
            $tingkatPendidikanChartData['labels'][] = $item->pendidikan;
            $tingkatPendidikanChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $kebutuhanAirData = KebutuhanAir::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $kebutuhanAirChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pelanggan (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($kebutuhanAirData as $item) {
            $kebutuhanAirChartData['labels'][] = $item->kategori;
            $kebutuhanAirChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $asetTanahData = AsetTanah::where('id_dusun', 4)
            ->where('id_tahun', 1)
            ->get();

        $asetTanahChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pemilik (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => 'rgb(255, 234, 0)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        foreach ($asetTanahData as $item) {
            $asetTanahChartData['labels'][] = $item->jenis;
            $asetTanahChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        return view('dashboard.pandeanlor', [
            'pendapatanChartData' => $pendapatanChartData,
            'sectors' => $sectors,
            'totalPekerja' => $totalPekerja,
            'pekerjaanChartData' => $pekerjaanChartData,
            'usiaChartData' => $usiaChartData,
            'kualitasBayiChartData' => $kualitasBayiChartData,
            'kualitasIbuHamilChartData' => $kualitasIbuHamilChartData,
            'statusBalitaChartData' => $statusBalitaChartData,
            'imunisasiChartData' => $imunisasiChartData,
            'rasioGuruMuridChartData' => $rasioGuruMuridChartData,
            'statusPendidikanChartData' => $statusPendidikanChartData,
            'agamaChartData' => $agamaChartData,
            'tingkatPendidikanChartData' => $tingkatPendidikanChartData,
            'kebutuhanAirChartData' => $kebutuhanAirChartData,
            'asetTanahChartData' => $asetTanahChartData,
        ]);
    }

    public function pandeanlorData_2()
    {
        $pendapatanData = PendapatanPerkapita::with('tahun', 'dusun', 'jenisSektor')
        ->where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $pendapatanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Pendapatan Perkapita Masyarakat (dalam Rupiah)',
                    'data' => [],
                    'backgroundColor' => 'rgb(0, 150, 255)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        foreach ($pendapatanData as $item) {
            $pendapatanChartData['labels'][] = $item->jenisSektor->nama_sektor;
            $pendapatanChartData['datasets'][0]['data'][] = $item->pendapatan;
        }

        $mataPencaharianData = MataPencaharian::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $sectors = [
            1 => $mataPencaharianData->where('id_sektor', 1)->first()->perorangan ?? 0,
            2 => $mataPencaharianData->where('id_sektor', 2)->first()->perorangan ?? 0,
            3 => $mataPencaharianData->where('id_sektor', 3)->first()->perorangan ?? 0,
            4 => $mataPencaharianData->where('id_sektor', 4)->first()->perorangan ?? 0,
            5 => $mataPencaharianData->where('id_sektor', 1)->first()->usaha ?? 0,
            6 => $mataPencaharianData->where('id_sektor', 2)->first()->usaha ?? 0,
            7 => $mataPencaharianData->where('id_sektor', 3)->first()->usaha ?? 0,
            8 => $mataPencaharianData->where('id_sektor', 4)->first()->usaha ?? 0,
            9 => $mataPencaharianData->where('id_sektor', 1)->first()->buruh ?? 0,
            10 => $mataPencaharianData->where('id_sektor', 2)->first()->buruh ?? 0,
            11 => $mataPencaharianData->where('id_sektor', 3)->first()->buruh ?? 0,
            12 => $mataPencaharianData->where('id_sektor', 4)->first()->buruh ?? 0,
            13 => $mataPencaharianData->where('id_sektor', 1)->first()->jumlah ?? 0,
            14 => $mataPencaharianData->where('id_sektor', 2)->first()->jumlah ?? 0,
            15 => $mataPencaharianData->where('id_sektor', 3)->first()->jumlah ?? 0,
            16 => $mataPencaharianData->where('id_sektor', 4)->first()->jumlah ?? 0,
        ];

        $totalPekerja = $mataPencaharianData->sum('jumlah');

        $pekerjaanData = Pekerjaan::with('dusun', 'tahun')
        ->where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $pekerjaanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pekerjaan',
                    'data' => [],
                    'backgroundColor' => [
                        'rgb(0, 150, 255)',
                        'rgb(191, 64, 191)',
                        'rgb(34, 139, 34)',
                        'rgb(255, 234, 0)',
                        'rgb(255, 172, 28)',
                        'rgb(255, 36, 0)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 0.5,
                    'hoverOffset' => 4
                ]
            ]
        ];

        foreach ($pekerjaanData as $item) {
            $pekerjaanChartData['labels'][] = $item->pekerjaan;
            $pekerjaanChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $usiaData = Usia::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $usiaChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => [],
                    'backgroundColor' => 'rgba(0, 123, 255, 0.5)'
                ],
                [
                    'label' => 'Perempuan',
                    'data' => [],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)'
                ]
            ]
        ];

        foreach ($usiaData as $item) {
            $usiaChartData['labels'][] = $item->rentang_usia;
            $usiaChartData['datasets'][0]['data'][] = $item->laki_laki;
            $usiaChartData['datasets'][1]['data'][] = $item->perempuan;
        }

        $kualitasBayiData = KualitasBayi::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $kualitasBayiChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($kualitasBayiData as $item) {
            $kualitasBayiChartData['labels'][] = $item->kategori;
            $kualitasBayiChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $kualitasIbuHamilData = KualitasIbuHamil::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $kualitasIbuHamilChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($kualitasIbuHamilData as $item) {
            $kualitasIbuHamilChartData['labels'][] = $item->kategori;
            $kualitasIbuHamilChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $statusBalitaData = StatusBalita::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $statusBalitaChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($statusBalitaData as $item) {
            $statusBalitaChartData['labels'][] = $item->kategori;
            $statusBalitaChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $imunisasiData = Imunisasi::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $imunisasiChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($imunisasiData as $item) {
            $imunisasiChartData['labels'][] = $item->kategori;
            $imunisasiChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $rasioGuruMuridData = RasioGuruMurid::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $rasioGuruMuridChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Guru',
                    'data' => [],
                    'backgroundColor' => 'rgba(0, 123, 255, 0.5)',
                    'borderColor' => 'rgba(0, 123, 255, 1)',
                    'fill' => true,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'pointBackgroundColor' => 'rgba(0, 123, 255, 0.5)',
                    'pointBorderColor' => 'rgb(0, 0, 0)'
                ],
                [
                    'label' => 'Jumlah Murid',
                    'data' => [],
                    'backgroundColor' => 'rgba(255, 206, 86, 0.5)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'fill' => true,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'pointBackgroundColor' => 'rgba(255, 99, 132, 0.5)',
                    'pointBorderColor' => 'rgb(0, 0, 0)'
                ]
            ]
        ];

        foreach ($rasioGuruMuridData as $item) {
            $rasioGuruMuridChartData['labels'][] = $item->tingkat_pendidikan;
            $rasioGuruMuridChartData['datasets'][0]['data'][] = $item->jumlah_guru;
            $rasioGuruMuridChartData['datasets'][1]['data'][] = $item->jumlah_murid;
        }

        $statusPendidikanData = WajibBelajar::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $statusPendidikanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($statusPendidikanData as $item) {
            $statusPendidikanChartData['labels'][] = $item->kategori;
            $statusPendidikanChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $agamaData = Agama::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $agamaChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pemeluk (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($agamaData as $item) {
            $agamaChartData['labels'][] = $item->agama;
            $agamaChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $tingkatPendidikanData = TingkatPendidikan::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $tingkatPendidikanChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pengampu (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => 'rgb(248, 131, 121)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        foreach ($tingkatPendidikanData as $item) {
            $tingkatPendidikanChartData['labels'][] = $item->pendidikan;
            $tingkatPendidikanChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $kebutuhanAirData = KebutuhanAir::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $kebutuhanAirChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pelanggan (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($kebutuhanAirData as $item) {
            $kebutuhanAirChartData['labels'][] = $item->kategori;
            $kebutuhanAirChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        $asetTanahData = AsetTanah::where('id_dusun', 4)
        ->where('id_tahun', 1)
        ->get();

        $asetTanahChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pemilik (dalam Orang)',
                    'data' => [],
                    'backgroundColor' => 'rgb(255, 234, 0)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        foreach ($asetTanahData as $item) {
            $asetTanahChartData['labels'][] = $item->jenis;
            $asetTanahChartData['datasets'][0]['data'][] = $item->jumlah;
        }

        return view('dashboard.pandeanlor_2', [
            'pendapatanChartData' => $pendapatanChartData,
            'sectors' => $sectors,
            'totalPekerja' => $totalPekerja,
            'pekerjaanChartData' => $pekerjaanChartData,
            'usiaChartData' => $usiaChartData,
            'kualitasBayiChartData' => $kualitasBayiChartData,
            'kualitasIbuHamilChartData' => $kualitasIbuHamilChartData,
            'statusBalitaChartData' => $statusBalitaChartData,
            'imunisasiChartData' => $imunisasiChartData,
            'rasioGuruMuridChartData' => $rasioGuruMuridChartData,
            'statusPendidikanChartData' => $statusPendidikanChartData,
            'agamaChartData' => $agamaChartData,
            'tingkatPendidikanChartData' => $tingkatPendidikanChartData,
            'kebutuhanAirChartData' => $kebutuhanAirChartData,
            'asetTanahChartData' => $asetTanahChartData,
        ]);
    }

    public function formPendapatan(Request $request)
    {
        $id_tahun = 1;
        $id_dusun = 4;

        $pendapatanPerkapita = PendapatanPerkapita::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->pluck('pendapatan', 'id_sektor');

        return view('inputdata.pandeanlor', compact('pendapatanPerkapita'));
    }

    public function storePendapatan(Request $request)
    {
        $id_tahun = 1;
        $id_dusun = 4;

        $sanitized = [
            'pertanian'        => preg_replace('/\D/', '', $request->input('pertanian', '')),
            'peternakan'       => preg_replace('/\D/', '', $request->input('peternakan', '')),
            'jasaperdagangan'  => preg_replace('/\D/', '', $request->input('jasaperdagangan', '')),
            'industri'         => preg_replace('/\D/', '', $request->input('industri', '')),
        ];

        $validator = Validator::make(
            $sanitized,
            [
                'pertanian'       => ['required', 'regex:/^\d{1,10}$/'],
                'peternakan'      => ['required', 'regex:/^\d{1,10}$/'],
                'jasaperdagangan' => ['required', 'regex:/^\d{1,10}$/'],
                'industri'        => ['required', 'regex:/^\d{1,10}$/'],
            ],
            [
                'required' => 'Gagal! Mohon lengkapi data terlebih dahulu.',
                'regex'    => 'Gagal! Mohon lengkapi data terlebih dahulu.',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors(['pendapatan' => 'Gagal! Mohon lengkapi data terlebih dahulu.'])
                ->withInput();
        }

        $data = [
            ['id_sektor' => 2, 'pendapatan' => $sanitized['pertanian']],
            ['id_sektor' => 1, 'pendapatan' => $sanitized['peternakan']],
            ['id_sektor' => 3, 'pendapatan' => $sanitized['jasaperdagangan']],
            ['id_sektor' => 4, 'pendapatan' => $sanitized['industri']],
        ];

        foreach ($data as $entry) {
            PendapatanPerkapita::updateOrCreate(
                [
                    'id_dusun'  => $id_dusun,
                    'id_tahun'  => $id_tahun,
                    'id_sektor' => $entry['id_sektor'],
                ],
                ['pendapatan' => $entry['pendapatan']]
            );
        }

        return redirect()->back()->with('success_pendapatan', 'Success! Data berhasil disimpan.');
    }

    public function formMataPencaharian(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $mataPencaharian = MataPencaharian::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('id_sektor');

        return view('inputdata.pandeanlor', compact('mataPencaharian', 'year'));
    }

    public function fetchDataMataPencaharian(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $mataPencaharian = MataPencaharian::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('id_sektor');

        return response()->json($mataPencaharian);
    }

    public function storeMataPencaharian(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'id_sektor' => 2, 'perorangan' => $request->input('peroranganpertanian'), 'usaha' => $request->input('usahapertanian'), 'buruh' => $request->input('buruhpertanian'), 'jumlah' => $request->input('jumlahpertanian')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'id_sektor' => 1, 'perorangan' => $request->input('peroranganpeternakan'), 'usaha' => $request->input('usahapeternakan'), 'buruh' => $request->input('buruhpeternakan'), 'jumlah' => $request->input('jumlahpeternakan')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'id_sektor' => 3, 'perorangan' => $request->input('peroranganjasaperdagangan'), 'usaha' => $request->input('usahajasaperdagangan'), 'buruh' => $request->input('buruhjasaperdagangan'), 'jumlah' => $request->input('jumlahjasaperdagangan')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'id_sektor' => 4, 'perorangan' => $request->input('peroranganindustri'), 'usaha' => $request->input('usahaindustri'), 'buruh' => $request->input('buruhindustri'), 'jumlah' => $request->input('jumlahindustri')],
        ];

        foreach ($data as $entry) {
            MataPencaharian::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'id_sektor' => $entry['id_sektor']],
                ['perorangan' => $entry['perorangan'], 'usaha' => $entry['usaha'], 'buruh' => $entry['buruh'], 'jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_mata_pencaharian', 'Data Berhasil Ditambahkan');
    }

    public function formPekerjaan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $pekerjaan = Pekerjaan::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('pekerjaan');

        return view('inputdata.pandeanlor', compact('pekerjaan', 'year'));
    }

    public function fetchDataPekerjaan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $pekerjaan = Pekerjaan::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('pekerjaan');

        return response()->json($pekerjaan);
    }

    public function storePekerjaan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_pekerjaan');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Petani', 'jumlah' => $request->input('petani')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Peternak', 'jumlah' => $request->input('peternak')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Pemilik Usaha', 'jumlah' => $request->input('pemilikusaha')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Pedagang Barang Kelontong', 'jumlah' => $request->input('pedagangkelontong')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Perangkat Desa', 'jumlah' => $request->input('perangkatdesa')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Pelajar', 'jumlah' => $request->input('pelajar')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pekerjaan' => 'Lain-lain', 'jumlah' => $request->input('lainlain')],
        ];

        foreach ($data as $entry) {
            Pekerjaan::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'pekerjaan' => $entry['pekerjaan']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_pekerjaan', 'Data Berhasil Ditambahkan');
    }

    public function formUsia(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $usiaData = Usia::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('rentang_usia');

        return view('inputdata.pandeanlor', compact('usiaData', 'year'));
    }

    public function fetchDataUsia(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $usiaData = Usia::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('rentang_usia');

        return response()->json($usiaData);
    }

    public function storeUsia(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '0-5 Tahun', 'laki_laki' => $request->input('0-5tahunl'), 'perempuan' => $request->input('0-5tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '6-10 Tahun', 'laki_laki' => $request->input('6-10tahunl'), 'perempuan' => $request->input('6-10tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '11-15 Tahun', 'laki_laki' => $request->input('11-15tahunl'), 'perempuan' => $request->input('11-15tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '16-20 Tahun', 'laki_laki' => $request->input('16-20tahunl'), 'perempuan' => $request->input('16-20tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '21-25 Tahun', 'laki_laki' => $request->input('21-25tahunl'), 'perempuan' => $request->input('21-25tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '26-30 Tahun', 'laki_laki' => $request->input('26-30tahunl'), 'perempuan' => $request->input('26-30tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '31-35 Tahun', 'laki_laki' => $request->input('31-35tahunl'), 'perempuan' => $request->input('31-35tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '36-40 Tahun', 'laki_laki' => $request->input('36-40tahunl'), 'perempuan' => $request->input('36-40tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '41-45 Tahun', 'laki_laki' => $request->input('41-45tahunl'), 'perempuan' => $request->input('41-45tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '46-50 Tahun', 'laki_laki' => $request->input('46-50tahunl'), 'perempuan' => $request->input('46-50tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '51-55 Tahun', 'laki_laki' => $request->input('51-55tahunl'), 'perempuan' => $request->input('51-55tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '56-60 Tahun', 'laki_laki' => $request->input('56-60tahunl'), 'perempuan' => $request->input('56-60tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '61-65 Tahun', 'laki_laki' => $request->input('61-65tahunl'), 'perempuan' => $request->input('61-65tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '66-70 Tahun', 'laki_laki' => $request->input('66-70tahunl'), 'perempuan' => $request->input('66-70tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '71-75 Tahun', 'laki_laki' => $request->input('71-75tahunl'), 'perempuan' => $request->input('71-75tahunp')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'rentang_usia' => '>75 Tahun', 'laki_laki' => $request->input('75tahunl'), 'perempuan' => $request->input('75tahunp')],
        ];

        foreach ($data as $entry) {
            Usia::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'rentang_usia' => $entry['rentang_usia']],
                ['laki_laki' => $entry['laki_laki'], 'perempuan' => $entry['perempuan']]
            );
        }
        return redirect()->back()->with('success_usia', 'Data Berhasil Ditambahkan');
    }

    public function formKualitasBayi(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $kualitasBayiData = KualitasBayi::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return view('inputdata.pandeanlor', compact('kualitasBayiData', 'year'));
    }

    public function fetchDataKualitasBayi(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $kualitasBayiData = KualitasBayi::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return response()->json($kualitasBayiData);
    }

    public function storeKualitasBayi(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_kualitasbayi');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Keguguran', 'jumlah' => str_replace('.', '', $request->input('keguguran'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Meninggal', 'jumlah' => str_replace('.', '', $request->input('meninggal'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Sehat', 'jumlah' => str_replace('.', '', $request->input('sehat'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Kelainan Fisik/Mental', 'jumlah' => str_replace('.', '', $request->input('kelainan'))],
        ];

        foreach ($data as $entry) {
            KualitasBayi::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'kategori' => $entry['kategori']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_kualitasbayi', 'Data Berhasil Ditambahkan');
    }

    public function formKualitasIbuHamil(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $kualitasIbuHamilData = KualitasIbuHamil::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return view('inputdata.pandeanlor', compact('kualitasIbuHamilData', 'year'));
    }

    public function fetchDataKualitasIbuHamil(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $kualitasIbuHamilData = KualitasIbuHamil::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return response()->json($kualitasIbuHamilData);
    }

    public function storeKualitasIbuHamil(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_kualitasibuhamil');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Diperiksa', 'jumlah' => str_replace('.', '', $request->input('diperiksa'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Selamat Melahirkan', 'jumlah' => str_replace('.', '', $request->input('selamatlahir'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Wafat Melahirkan', 'jumlah' => str_replace('.', '', $request->input('wafatlahir'))],
        ];

        foreach ($data as $entry) {
            KualitasIbuHamil::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'kategori' => $entry['kategori']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_kualitasibuhamil', 'Data Berhasil Ditambahkan');
    }

    public function formStatusBalita(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $statusBalitaData = StatusBalita::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return view('inputdata.pandeanlor', compact('statusBalitaData', 'year'));
    }

    public function fetchDataStatusBalita(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $statusBalitaData = StatusBalita::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return response()->json($statusBalitaData);
    }

    public function storeStatusBalita(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_statusbalita');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Bergizi Buruk', 'jumlah' => str_replace('.', '', $request->input('bergiziburuk'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Bergizi Baik', 'jumlah' => str_replace('.', '', $request->input('bergizibaik'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Bergizi Kurang', 'jumlah' => str_replace('.', '', $request->input('bergizikurang'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Bergizi Lebih', 'jumlah' => str_replace('.', '', $request->input('bergizilebih'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Jumlah Keluarga', 'jumlah' => str_replace('.', '', $request->input('jumlahkeluarga'))],
        ];

        foreach ($data as $entry) {
            StatusBalita::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'kategori' => $entry['kategori']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_statusbalita', 'Data Berhasil Ditambahkan');
    }

    public function formImunisasi(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $imunisasiData = Imunisasi::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return view('inputdata.pandeanlor', compact('imunisasiData', 'year'));
    }

    public function fetchDataImunisasi(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $imunisasiData = Imunisasi::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return response()->json($imunisasiData);
    }

    public function storeImunisasi(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_imunisasi');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'DPT-1, BCG, dan Polio-1', 'jumlah' => str_replace('.', '', $request->input('dpt1'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'DPT-2 dan Polio-2', 'jumlah' => str_replace('.', '', $request->input('dpt2'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'DPT-3 dan Polio-3', 'jumlah' => str_replace('.', '', $request->input('dpt3'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Campak', 'jumlah' => str_replace('.', '', $request->input('campak'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Cacar', 'jumlah' => str_replace('.', '', $request->input('cacar'))],
        ];

        foreach ($data as $entry) {
            Imunisasi::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'kategori' => $entry['kategori']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_imunisasi', 'Data Berhasil Ditambahkan');
    }

    public function formRasioGuruMurid(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $rasioGuruMurid = RasioGuruMurid::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('tingkat_pendidikan');

        return view('inputdata.pandeanlor', compact('rasioGuruMurid', 'year'));
    }

    public function fetchDataRasioGuruMurid(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $rasioGuruMurid = RasioGuruMurid::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('tingkat_pendidikan');

        return response()->json($rasioGuruMurid);
    }

    public function storeRasioGuruMurid(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_rasiogurumurid');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'tingkat_pendidikan' => 'TK', 'jumlah_guru' => $request->input('tkg'), 'jumlah_murid' => $request->input('tkm')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'tingkat_pendidikan' => 'SD', 'jumlah_guru' => $request->input('sdg'), 'jumlah_murid' => $request->input('sdm')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'tingkat_pendidikan' => 'SMP', 'jumlah_guru' => $request->input('smpg'), 'jumlah_murid' => $request->input('smpm')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'tingkat_pendidikan' => 'SMA', 'jumlah_guru' => $request->input('smag'), 'jumlah_murid' => $request->input('smam')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'tingkat_pendidikan' => 'SLB', 'jumlah_guru' => $request->input('slbg'), 'jumlah_murid' => $request->input('slbm')],
        ];

        foreach ($data as $entry) {
            RasioGuruMurid::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'tingkat_pendidikan' => $entry['tingkat_pendidikan']],
                ['jumlah_guru' => $entry['jumlah_guru'], 'jumlah_murid' => $entry['jumlah_murid']]
            );
        }
        return redirect()->back()->with('success_rasiogurumurid', 'Data Berhasil Ditambahkan');
    }

    public function formStatusPendidikan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $statusPendidikan = WajibBelajar::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return view('inputdata.pandeanlor', compact('statusPendidikan', 'year'));
    }

    public function fetchDataStatusPendidikan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $statusPendidikan = WajibBelajar::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return response()->json($statusPendidikan);
    }

    public function storeStatusPendidikan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_statuspendidikan');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Masih Sekolah', 'jumlah' => $request->input('masihsekolah')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Tidak Sekolah', 'jumlah' => $request->input('tidaksekolah')],
        ];

        foreach ($data as $entry) {
            WajibBelajar::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'kategori' => $entry['kategori']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_statuspendidikan', 'Data Berhasil Ditambahkan');
    }

    public function formAgama(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $agamaData = Agama::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'agama');

        return view('inputdata.pandeanlor', compact('agamaData', 'year'));
    }

    public function fetchDataAgama(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $agamaData = Agama::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'agama');

        return response()->json($agamaData);
    }

    public function storeAgama(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_agama');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'agama' => 'Islam', 'jumlah' => $request->input('islam')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'agama' => 'Kristen', 'jumlah' => $request->input('kristen')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'agama' => 'Katholik', 'jumlah' => $request->input('katholik')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'agama' => 'Buddha', 'jumlah' => $request->input('buddha')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'agama' => 'Konghucu', 'jumlah' => $request->input('konghucu')],
        ];

        foreach ($data as $entry) {
            Agama::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'agama' => $entry['agama']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_agama', 'Data Berhasil Ditambahkan');
    }

    public function formTingkatPendidikan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $tingkatPendidikanData = TingkatPendidikan::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'pendidikan');

        return view('inputdata.pandeanlor', compact('tingkatPendidikanData', 'year'));
    }

    public function fetchDataTingkatPendidikan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $tingkatPendidikanData = TingkatPendidikan::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'pendidikan');

        return response()->json($tingkatPendidikanData);
    }

    public function storeTingkatPendidikan(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_tingkatpendidikan');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Buta Aksara', 'jumlah' => $request->input('tingkat1')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'TK', 'jumlah' => $request->input('tingkat2')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat SD', 'jumlah' => $request->input('tingkat3')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Tidak Tamat SD', 'jumlah' => $request->input('tingkat4')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat SMP', 'jumlah' => $request->input('tingkat5')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Tidak Tamat SMP', 'jumlah' => $request->input('tingkat6')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat SMA', 'jumlah' => $request->input('tingkat7')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Tidak Tamat SMA', 'jumlah' => $request->input('tingkat8')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat Diploma', 'jumlah' => $request->input('tingkat9')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat S1', 'jumlah' => $request->input('tingkat10')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat S2', 'jumlah' => $request->input('tingkat11')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat S3', 'jumlah' => $request->input('tingkat12')],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'pendidikan' => 'Sedang atau Tamat SLB A/B/C', 'jumlah' => $request->input('tingkat13')],
        ];

        foreach ($data as $entry) {
            TingkatPendidikan::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'pendidikan' => $entry['pendidikan']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_tingkatpendidikan', 'Data Berhasil Ditambahkan');
    }

    public function formKebutuhanAir(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $kebutuhanAirData = KebutuhanAir::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return view('inputdata.pandeanlor', compact('kebutuhanAirData', 'year'));
    }

    public function fetchDataKebutuhanAir(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $kebutuhanAirData = KebutuhanAir::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->pluck('jumlah', 'kategori');

        return response()->json($kebutuhanAirData);
    }

    public function storeKebutuhanAir(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_kebutuhanair');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Sumur Gali', 'jumlah' => str_replace('.', '', $request->input('air1'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'PAM', 'jumlah' => str_replace('.', '', $request->input('air2'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Hidran Umum', 'jumlah' => str_replace('.', '', $request->input('air3'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Mata Air', 'jumlah' => str_replace('.', '', $request->input('air4'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'kategori' => 'Jumlah Keluarga', 'jumlah' => str_replace('.', '', $request->input('air5'))],
        ];

        foreach ($data as $entry) {
            KebutuhanAir::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'kategori' => $entry['kategori']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_kebutuhanair', 'Data Berhasil Ditambahkan');
    }

    public function formAsetTanah(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year', 2024);
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $asetTanahData = AsetTanah::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('jenis');

        return view('inputdata.pandeanlor', compact('asetTanahData', 'year'));
    }

    public function fetchDataAsetTanah(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('year');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $asetTanahData = AsetTanah::where('id_dusun', $id_dusun)
            ->where('id_tahun', $id_tahun)
            ->get()
            ->keyBy('jenis');

        return response()->json($asetTanahData);
    }

    public function storeAsetTanah(Request $request)
    {
        $tahunMapping = [
            2024 => 1,
            2025 => 2,
            2026 => 3,
            2027 => 4,
        ];

        $year = $request->input('tahun_asettanah');
        $id_tahun = $tahunMapping[$year];
        $id_dusun = 4;

        $data = [
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Tidak Memiliki Tanah', 'jumlah' => str_replace('.', '', $request->input('aset1'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Kurang dari 0,2 Ha', 'jumlah' => str_replace('.', '', $request->input('aset2'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,21 - 0,3 Ha', 'jumlah' => str_replace('.', '', $request->input('aset3'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,31 - 0,4 Ha', 'jumlah' => str_replace('.', '', $request->input('aset4'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,41 - 0,5 Ha', 'jumlah' => str_replace('.', '', $request->input('aset5'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,51 - 0,6 Ha', 'jumlah' => str_replace('.', '', $request->input('aset6'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,61 - 0,7 Ha', 'jumlah' => str_replace('.', '', $request->input('aset7'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,71 - 0,8 Ha', 'jumlah' => str_replace('.', '', $request->input('aset8'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,81 - 0,9 Ha', 'jumlah' => str_replace('.', '', $request->input('aset9'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 0,91 - 1,0 Ha', 'jumlah' => str_replace('.', '', $request->input('aset10'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 1,01 - 5,0 Ha', 'jumlah' => str_replace('.', '', $request->input('aset11'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Antara 5,01 - 10,0 Ha', 'jumlah' => str_replace('.', '', $request->input('aset12'))],
            ['id_dusun' => $id_dusun, 'id_tahun' => $id_tahun, 'jenis' => 'Memiliki Tanah Lebih dari 10 Ha', 'jumlah' => str_replace('.', '', $request->input('aset13'))],
        ];

        foreach ($data as $entry) {
            AsetTanah::updateOrCreate(
                ['id_dusun' => $entry['id_dusun'], 'id_tahun' => $entry['id_tahun'], 'jenis' => $entry['jenis']],
                ['jumlah' => $entry['jumlah']]
            );
        }
        return redirect()->back()->with('success_asettanah', 'Data Berhasil Ditambahkan');
    }
}
