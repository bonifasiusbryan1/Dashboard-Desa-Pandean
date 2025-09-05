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

class PandeanController extends Controller
{
    public function pandeanData()
    {
        $pendapatanData = PendapatanPerkapita::with('tahun', 'dusun', 'jenisSektor')
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

        $aggregatedData = [];

        foreach ($pendapatanData as $item) {
            $namaSektor = $item->jenisSektor->nama_sektor;
            if (!isset($aggregatedData[$namaSektor])) {
                $aggregatedData[$namaSektor] = 0;
            }
            $aggregatedData[$namaSektor] += $item->pendapatan;
        }

        foreach ($aggregatedData as $namaSektor => $pendapatan) {
            $pendapatanChartData['labels'][] = $namaSektor;
            $pendapatanChartData['datasets'][0]['data'][] = $pendapatan;
        }

        $mataPencaharianData = MataPencaharian::where('id_tahun', 1)->get();

        $aggregatedData = [
            'perorangan' => [],
            'usaha' => [],
            'buruh' => [],
            'jumlah' => []
        ];

        foreach ($mataPencaharianData as $item) {
            $sektor = $item->id_sektor;
            if (!isset($aggregatedData['perorangan'][$sektor])) {
                $aggregatedData['perorangan'][$sektor] = 0;
                $aggregatedData['usaha'][$sektor] = 0;
                $aggregatedData['buruh'][$sektor] = 0;
                $aggregatedData['jumlah'][$sektor] = 0;
            }
            $aggregatedData['perorangan'][$sektor] += $item->perorangan;
            $aggregatedData['usaha'][$sektor] += $item->usaha;
            $aggregatedData['buruh'][$sektor] += $item->buruh;
            $aggregatedData['jumlah'][$sektor] += $item->jumlah;
        }

        $sectors = [
            1 => $aggregatedData['perorangan'][1] ?? 0,
            2 => $aggregatedData['perorangan'][2] ?? 0,
            3 => $aggregatedData['perorangan'][3] ?? 0,
            4 => $aggregatedData['perorangan'][4] ?? 0,
            5 => $aggregatedData['usaha'][1] ?? 0,
            6 => $aggregatedData['usaha'][2] ?? 0,
            7 => $aggregatedData['usaha'][3] ?? 0,
            8 => $aggregatedData['usaha'][4] ?? 0,
            9 => $aggregatedData['buruh'][1] ?? 0,
            10 => $aggregatedData['buruh'][2] ?? 0,
            11 => $aggregatedData['buruh'][3] ?? 0,
            12 => $aggregatedData['buruh'][4] ?? 0,
            13 => $aggregatedData['jumlah'][1] ?? 0,
            14 => $aggregatedData['jumlah'][2] ?? 0,
            15 => $aggregatedData['jumlah'][3] ?? 0,
            16 => $aggregatedData['jumlah'][4] ?? 0,
        ];

        $totalPekerja = $mataPencaharianData->sum('jumlah');

        $pekerjaanData = Pekerjaan::with('dusun', 'tahun')
        ->where('id_tahun', 1)
        ->get();

        $groupedPekerjaanData = $pekerjaanData->groupBy('pekerjaan')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $pekerjaanChartData = [
            'labels' => $groupedPekerjaanData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pekerjaan',
                    'data' => $groupedPekerjaanData->values()->toArray(),
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

        $usiaData = Usia::where('id_tahun', 1)
            ->get();

        $groupedUsiaData = $usiaData->groupBy('rentang_usia')->map(function ($item) {
            return [
                'laki_laki' => $item->sum('laki_laki'),
                'perempuan' => $item->sum('perempuan')
            ];
        });

        $usiaChartData = [
            'labels' => $groupedUsiaData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => $groupedUsiaData->pluck('laki_laki')->toArray(),
                    'backgroundColor' => 'rgba(0, 123, 255, 0.5)'
                ],
                [
                    'label' => 'Perempuan',
                    'data' => $groupedUsiaData->pluck('perempuan')->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)'
                ]
            ]
        ];

        $kualitasBayiData = KualitasBayi::where('id_tahun', 1)
        ->get();

        $groupedKualitasBayiData = $kualitasBayiData->groupBy('kategori')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $kualitasBayiChartData = [
            'labels' => $groupedKualitasBayiData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedKualitasBayiData->values()->toArray(),
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

        $kualitasIbuHamilData = KualitasIbuHamil::where('id_tahun', 1)
        ->get();

        $groupedKualitasIbuHamilData = $kualitasIbuHamilData->groupBy('kategori')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $kualitasIbuHamilChartData = [
            'labels' => $groupedKualitasIbuHamilData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedKualitasIbuHamilData->values()->toArray(),
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

        $statusBalitaData = StatusBalita::where('id_tahun', 1)
        ->get();

        $groupedStatusBalitaData = $statusBalitaData->groupBy('kategori')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $statusBalitaChartData = [
            'labels' => $groupedStatusBalitaData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedStatusBalitaData->values()->toArray(),
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

        $imunisasiData = Imunisasi::where('id_tahun', 1)
        ->get();

        $groupedImunisasiData = $imunisasiData->groupBy('kategori')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $imunisasiChartData = [
            'labels' => $groupedImunisasiData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedImunisasiData->values()->toArray(),
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

        $rasioGuruMuridData = RasioGuruMurid::where('id_tahun', 1)
        ->get();

        $groupedRasioGuruMuridData = $rasioGuruMuridData->groupBy('tingkat_pendidikan')->map(function ($item) {
            return [
                'jumlah_guru' => $item->sum('jumlah_guru'),
                'jumlah_murid' => $item->sum('jumlah_murid')
            ];
        });

        $rasioGuruMuridChartData = [
            'labels' => $groupedRasioGuruMuridData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Guru',
                    'data' => $groupedRasioGuruMuridData->pluck('jumlah_guru')->toArray(),
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
                    'data' => $groupedRasioGuruMuridData->pluck('jumlah_murid')->toArray(),
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

        $statusPendidikanData = WajibBelajar::where('id_tahun', 1)
        ->get();

        $groupedStatusPendidikanData = $statusPendidikanData->groupBy('kategori')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $statusPendidikanChartData = [
            'labels' => $groupedStatusPendidikanData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedStatusPendidikanData->values()->toArray(),
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

        $agamaData = Agama::where('id_tahun', 1)
        ->get();

        $groupedAgamaData = $agamaData->groupBy('agama')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $agamaChartData = [
            'labels' => $groupedAgamaData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedAgamaData->values()->toArray(),
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

        $tingkatPendidikanData = TingkatPendidikan::where('id_tahun', 1)
        ->get();

        $groupedTingkatPendidikanData = $tingkatPendidikanData->groupBy('pendidikan')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $tingkatPendidikanChartData = [
            'labels' => $groupedTingkatPendidikanData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pengampu (dalam Orang)',
                    'data' => $groupedTingkatPendidikanData->values()->toArray(),
                    'backgroundColor' => 'rgb(248, 131, 121)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        $kebutuhanAirData = KebutuhanAir::where('id_tahun', 1)
        ->get();

        $groupedKebutuhanAirData = $kebutuhanAirData->groupBy('kategori')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $kebutuhanAirChartData = [
            'labels' => $groupedKebutuhanAirData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (dalam Orang)',
                    'data' => $groupedKebutuhanAirData->values()->toArray(),
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

        $asetTanahData = AsetTanah::where('id_tahun', 1)
        ->get();

        $groupedAsetTanahData = $asetTanahData->groupBy('jenis')->map(function ($item) {
            return $item->sum('jumlah');
        });

        $asetTanahChartData = [
            'labels' => $groupedAsetTanahData->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pemilik (dalam Orang)',
                    'data' => $groupedAsetTanahData->values()->toArray(),
                    'backgroundColor' => 'rgb(255, 234, 0)',
                    'borderColor' => 'rgb(0, 0, 0)',
                    'borderWidth' => 1.5,
                ]
            ]
        ];

        return view('dashboard.pandean', [
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
}
