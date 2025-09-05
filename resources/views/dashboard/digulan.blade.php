<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .sidebar {
            width: 280px;
            height: 100%;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            position: fixed;
            top: 0;
            left: -280px;
            transition: left 0.3s ease-in-out;
            z-index: 1000;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-header {
            padding: 1.5rem;
            background-color: rgba(30, 41, 59, 0.9);
            color: white;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-content {
            padding: 1rem 0.5rem;
            color: white;
            overflow-y: auto;
            max-height: calc(100vh - 72px);
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.75rem 1rem;
            color: #cbd5e1;
            border-radius: 0.5rem;
            transition: all 0.2s;
            margin-bottom: 0.25rem;
        }

        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar-item.active {
            background-color: #3b82f6;
            color: white;
        }

        .sidebar-divider {
            height: 1px;
            background: linear-gradient(90deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0.1) 100%);
            margin: 1rem 0;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            backdrop-filter: blur(4px);
        }

        .overlay.open {
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 240px;
            }
            
            .nav-title {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 220px;
            }
            
            .nav-title {
                font-size: 1rem;
            }
            
            .logo {
                width: 2rem;
                height: 2rem;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav class="bg-gradient-to-r from-blue-600 to-indigo-700 shadow-lg w-full px-4 sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-3">
            <div class="hamburger text-white cursor-pointer p-1 rounded-lg hover:bg-blue-700 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <div class="flex items-center justify-center flex-grow text-white">
                <img src="{{ asset('images/kabupaten.png') }}" alt="Logo" class="w-10 h-10 md:w-12 md:h-12 object-contain logo">
                <span class="mx-3 text-xl sm:text-2xl font-semibold nav-title">
                    Profile Data Dusun Digulan
                </span>
            </div>
            <div class="w-7"></div>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-grid-3x3-gap-fill text-blue-400 text-xl"></i> 
            <span class="font-semibold text-lg">Daftar Menu</span>
        </div>
        <div class="sidebar-content">
            <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Dashboard Desa</div>
            <a href="{{ route('dashboard.digulan') }}" class="sidebar-item">
                <i class="bi bi-clipboard-data-fill mr-3"></i> Digulan
            </a>
            
            <div class="sidebar-divider"></div>
            
            <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Input Data</div>
            <a href="{{ route('inputdata.digulan') }}" class="sidebar-item">
                <i class="bi bi-pencil-square mr-2"></i> Input Data Digulan
            </a>
            
            <div class="sidebar-divider"></div>
            
            <form method="POST" action="{{ route('logout') }}" class="mt-4 px-2">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm transition-all duration-300 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16,17 21,12 16,7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="container mx-auto mt-3 px-8 max-w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Pendapatan Perkapita</h2>
                            <p class="text-sm opacity-90">Dikelompokkan Menurut Sektor Usaha</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Tahunan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ count($pendapatanChartData['labels']) }} Sektor Usaha Utama
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="pendapatanChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data dalam satuan Rupiah. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Mata Pencaharian</h2>
                            <p class="text-sm opacity-90">Distribusi Tenaga Kerja Menurut Sektor</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Tahunan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-4 flex flex-wrap items-center justify-between border-b">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white py-2 px-4 rounded-lg shadow-sm border border-gray-200">
                            <span class="text-2xl font-bold text-blue-600">{{ number_format($totalPekerja, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-600 ml-2">Total Pekerja</span>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mt-2 md:mt-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-3 text-center font-medium text-sm">
                            Perorangan
                        </div>
                        <div class="p-3">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between p-2 bg-green-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-green-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/pertanian.png') }}" alt="Pertanian" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Pertanian</span>
                                    </div>
                                    <span class="text-green-700 text-xs font-bold">{{ $sectors[2] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-green-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-green-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/peternakan.png') }}" alt="Peternakan" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Peternakan</span>
                                    </div>
                                    <span class="text-green-700 text-xs font-bold">{{ $sectors[1] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-green-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-green-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/jasaperdagangan.png') }}" alt="Jasa dan Perdagangan" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Jasa & Perdagangan</span>
                                    </div>
                                    <span class="text-green-700 text-xs font-bold">{{ $sectors[3] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-green-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-green-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/industri.png') }}" alt="Industri" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Industri</span>
                                    </div>
                                    <span class="text-green-700 text-xs font-bold">{{ $sectors[4] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-3 text-center font-medium text-sm">
                            Usaha
                        </div>
                        <div class="p-3">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between p-2 bg-yellow-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-yellow-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/pertanian.png') }}" alt="Pertanian" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Pertanian</span>
                                    </div>
                                    <span class="text-yellow-700 text-xs font-bold">{{ $sectors[6] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-yellow-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-yellow-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/peternakan.png') }}" alt="Peternakan" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Peternakan</span>
                                    </div>
                                    <span class="text-yellow-700 text-xs font-bold">{{ $sectors[5] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-yellow-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-yellow-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/jasaperdagangan.png') }}" alt="Jasa dan Perdagangan" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Jasa & Perdagangan</span>
                                    </div>
                                    <span class="text-yellow-700 text-xs font-bold">{{ $sectors[7] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-yellow-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-yellow-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/industri.png') }}" alt="Industri" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Industri</span>
                                    </div>
                                    <span class="text-yellow-700 text-xs font-bold">{{ $sectors[8] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-3 text-center font-medium text-sm">
                            Buruh
                        </div>
                        <div class="p-3">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between p-2 bg-red-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-red-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/pertanian.png') }}" alt="Pertanian" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Pertanian</span>
                                    </div>
                                    <span class="text-red-700 text-xs font-bold">{{ $sectors[10] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-red-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-red-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/peternakan.png') }}" alt="Peternakan" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Peternakan</span>
                                    </div>
                                    <span class="text-red-700 text-xs font-bold">{{ $sectors[9] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-red-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-red-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/jasaperdagangan.png') }}" alt="Jasa dan Perdagangan" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Jasa & Perdagangan</span>
                                    </div>
                                    <span class="text-red-700 text-xs font-bold">{{ $sectors[11] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                                
                                <div class="flex items-center justify-between p-2 bg-red-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="p-1 bg-red-100 rounded-lg mr-2">
                                            <img src="{{ asset('images/industri.png') }}" alt="Industri" class="w-4 h-4">
                                        </div>
                                        <span class="text-xs font-medium">Industri</span>
                                    </div>
                                    <span class="text-red-700 text-xs font-bold">{{ $sectors[12] }} <span class="text-xs font-normal text-gray-500">org</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data tenaga kerja menurut sektor usaha. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Distribusi Pekerjaan</h2>
                            <p class="text-sm opacity-90">Jenis Pekerjaan Penduduk Tahun 2024</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Tahunan
                    </div>
                </div>

                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($pekerjaanChartData['labels']) }} Jenis Pekerjaan
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($pekerjaanChartData['datasets'][0]['data']) }} Total Pekerja
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="pekerjaanChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data distribusi pekerjaan penduduk. Sumber: Database Desa
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-3 px-8 max-w-full">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[300px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-white/20 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-lg">Distribusi Usia Penduduk</h2>
                        <p class="text-sm opacity-90">Demografi Usia Penduduk</p>
                    </div>
                </div>
                <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                    Data Tahunan
                </div>
            </div>
            
            <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                <div class="flex space-x-2">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        {{ count($usiaChartData['labels']) }} Rentang Usia
                    </span>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                        {{ array_sum(array_column($usiaChartData['datasets'], 'data')[0]) + array_sum(array_column($usiaChartData['datasets'], 'data')[1]) }} Total Penduduk
                    </span>
                </div>
                <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Diperbarui: {{ now()->format('d M Y') }}
                </div>
            </div>
            
            <div class="p-4 relative" style="min-height: 320px;">
                <div class="absolute right-4 top-4 flex space-x-2">
                    <button class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                    <button class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>
                </div>
                <canvas id="usiaChart" class="w-full" style="height: 290px;"></canvas>
            </div>
            
            <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Data distribusi usia penduduk berdasarkan jenis kelamin. Sumber: Database Desa
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-3 px-8 max-w-full">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Kualitas Bayi</h2>
                            <p class="text-sm opacity-90">Status Kesehatan Bayi</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Bulanan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($kualitasBayiChartData['labels']) }} Kategori
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($kualitasBayiChartData['datasets'][0]['data']) }} Total Bayi
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="kualitasBayiChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data kualitas bayi berdasarkan kategori kesehatan. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Kualitas Ibu Hamil</h2>
                            <p class="text-sm opacity-90">Status Kesehatan Ibu Hamil</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Bulanan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($kualitasIbuHamilChartData['labels']) }} Kategori
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($kualitasIbuHamilChartData['datasets'][0]['data']) }} Total Ibu Hamil
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="kualitasIbuHamilChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data kualitas ibu hamil berdasarkan kategori kesehatan. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Status Balita</h2>
                            <p class="text-sm opacity-90">Kondisi Kesehatan Balita</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Bulanan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($statusBalitaChartData['labels']) }} Kategori
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($statusBalitaChartData['datasets'][0]['data']) }} Total Balita
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
            
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="statusBalitaChart" class="mt-2"></canvas>
                </div>
        
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data status balita berdasarkan kategori kesehatan. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 极速飞艇 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Imunisasi</h2>
                            <p class="text-sm opacity-90">Cakupan Imunisasi Balita</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Bulanan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($imunisasiChartData['labels']) }} Jenis Imunisasi
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($imunisasiChartData['datasets'][0]['data']) }} Total Penerima
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 极速飞艇 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.极速飞艇 15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap极速飞艇 round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7极速飞艇 1 0 110-2 1 1 0 010 2zm0 7a1 极速飞艇 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="imunisasiChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4极速飞艇 1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data cakupan imunisasi berdasarkan jenis vaksin. Sumber: Database Desa
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-3 px-8 max-w-full">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[300px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl md:col-span-2">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v8" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Rasio Guru dan Murid</h2>
                            <p class="text-sm opacity-90">Perbandingan Jumlah Guru dan Murid</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Semester
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($rasioGuruMuridChartData['labels']) }} Tingkat Pendidikan
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum(array_column($rasioGuruMuridChartData['datasets'], 'data')[0]) }} Guru
                        </span>
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum(array_column($rasioGuruMuridChartData['datasets'], 'data')[1]) }} Murid
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative" style="min-height: 220px;">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 极速飞艇 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="rasioGuruMuridChart" class="w-full" style="height: 200px;"></canvas>
                </div>
                
                <div class="px-4 pb-3">
                    <div class="flex flex-wrap justify-center gap-4">
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 rounded-full mr-2 bg-blue-500"></div>
                            <span class="text-gray-600 font-medium">Jumlah Guru</span>
                        </div>
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 rounded-full mr-2 bg-yellow-400"></div>
                            <span class="text-gray-600 font-medium">Jumlah Murid</span>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0极速飞艇" />
                        </svg>
                        Data perbandingan jumlah guru dan murid berdasarkan tingkat pendidikan. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin极速飞艇 round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v8" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Status Pendidikan</h2>
                            <p class="text-sm opacity-90">Wajib Belajar Siswa</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Semester
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($statusPendidikanChartData['labels']) }} Kategori
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($statusPendidikanChartData['datasets'][0]['data']) }} Total Anak Usia Sekolah
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8极速飞艇 4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m极速飞艇 0H9m11 11v-5极速飞艇 .581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="statusPendidikanChart" class="mt-2"></canvas>
                </div>

                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data status wajib belajar berdasarkan kategori. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width极速飞艇 2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Distribusi Agama</h2>
                            <p class="text-sm opacity-90">Pemeluk Agama</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Tahunan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($agamaChartData['labels']) }} Agama
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($agamaChartData['datasets'][0]['data']) }} Total Pemeluk
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4极速飞艇 5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2极速飞艇 15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="agamaChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data distribusi pemeluk agama di wilayah desa. Sumber: Database Desa
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-3 px-8 max-w-full">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[450px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-white/20 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v8" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-lg">Tingkat Pendidikan</h2>
                        <p class="text-sm opacity-90">Distribusi Jenjang Pendidikan Masyarakat</p>
                    </div>
                </div>
                <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                    Data Tahunan
                </div>
            </div>
            
            <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                <div class="flex space-x-2">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                        {{ count($tingkatPendidikanChartData['labels']) }} Jenjang
                    </span>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                        {{ array_sum($tingkatPendidikanChartData['datasets'][0]['data']) }} Total Penempu Pendidikan
                    </span>
                </div>
                <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http极速飞艇://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4极速飞艇 3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Diperbarui: {{ now()->format('d M Y') }}
                </div>
            </div>
            
            <div class="p-4 relative" style="min-height: 350px;">
                <div class="absolute right-4 top-4 flex space-x-2">
                    <button class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" view极速飞艇 0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                    <button class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 极速飞艇 2z" />
                        </svg>
                    </button>
                </div>
                <canvas id="tingkatPendidikanChart" class="w-full" style="height: 310px;"></canvas>
            </div>
            
            <div class="px-4 pb-3">
                <div class="bg-blue-50 p-3 rounded-lg">
                    <h3 class="text-sm font-semibold text-blue-800 mb-2">Statistik Pendidikan</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="text-xs">
                            <span class="text-gray-600">Jenjang Tertinggi:</span>
                            <span class="font-bold text-blue-700 block">
                                {{ $tingkatPendidikanChartData['labels'][array_search(max($tingkatPendidikanChartData['datasets'][0]['data']), $tingkatPendidikanChartData['datasets'][0]['data'])] }}
                            </span>
                        </div>
                        <div class="text-xs">
                            <span class="text-gray-600">Jumlah Terbanyak:</span>
                            <span class="font-bold text-blue-700 block">
                                {{ max($tingkatPendidikanChartData['datasets'][0]['data']) }} Orang
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Data distribusi tingkat pendidikan masyarakat. Sumber: Database Desa
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-3 mb-3 px-8 max-w-full">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 极速飞艇 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Kebutuhan Air</h2>
                            <p class="text-sm opacity-90">Sumber Air Bersih Penduduk</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Bulanan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($kebutuhanAirChartData['labels']) }} Sumber Air
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($kebutuhanAirChartData['datasets'][0]['data']) }} Total Pengguna
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative">
                    <div class="absolute right-4 top极速飞艇 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 极速飞艇 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm极速飞艇 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="kebutuhanAirChart" class="mt-2"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data sumber air bersih yang digunakan oleh penduduk. Sumber: Database Desa
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] border border-gray-100 transform transition-all duration-300 hover:shadow-2xl md:col-span-3">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Aset Tanah</h2>
                            <p class="text-sm opacity-90">Kepemilikan Tanah</p>
                        </div>
                    </div>
                    <div class="text-sm bg-white/20 py-1 px-3 rounded-full">
                        Data Tahunan
                    </div>
                </div>
                
                <div class="bg-gray-50/80 p-3 flex flex-wrap items-center justify-between border-b">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ count($asetTanahChartData['labels']) }} Jenis Kepemilikan
                        </span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            {{ array_sum($asetTanahChartData['datasets'][0]['data']) }} Total Pemilik
                        </span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m极速飞艇 3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Diperbarui: {{ now()->format('d M Y') }}
                    </div>
                </div>
                
                <div class="p-4 relative" style="min-height: 280px;">
                    <div class="absolute right-4 top-4 flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke极速飞艇 currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2极速飞艇" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="asetTanahChart" class="w-full" style="height: 240px;"></canvas>
                </div>
                
                <div class="border-t border-gray-100 p-3 bg-gray-50/50">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data kepemilikan tanah berdasarkan jenis kepemilikan. Sumber: Database Desa
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function adjustLogoutStyles() {
                var width = window.innerWidth;
                var button = document.getElementById('logout-button');
                var icon = document.getElementById('logout-icon');
                var text = document.getElementById('logout-text');

                if (width < 768) {
                    button.style.padding = '2px 10px';
                    icon.style.height = '16px';
                    icon.style.width = '16px';
                    text.style.fontSize = '12px';
                } else {
                    button.style.padding = '4px 10px';
                    icon.style.height = '20px';
                    icon.style.width = '20px';
                    text.style.fontSize = '14px';
                }
            }

            window.onload = adjustLogoutStyles;
            window.onresize = adjustLogoutStyles;

            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const hamburger = document.querySelector('.hamburger');

            hamburger.addEventListener('click', function () {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('open');
            });

            overlay.addEventListener('click', function () {
                sidebar.classList.remove('open');
                overlay.classList.remove('open');
            });

            document.addEventListener('click', function (event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnHamburger = hamburger.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickOnHamburger && window.innerWidth < 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('open');
                }
            });

            const currentLocation = window.location.href;
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            
            sidebarItems.forEach(item => {
                if (item.href === currentLocation) {
                    item.classList.add('active');
                }
            });

            function getResponsiveFontSize() {
                const width = window.innerWidth;
                if (width > 1200) return 12;
                if (width > 768) return 10;  
                return 8;                  
            }

            var ctxPendapatan = document.getElementById('pendapatanChart').getContext('2d');
            var chartDataPendapatan = @json($pendapatanChartData);

            var pendapatanChart = new Chart(ctxPendapatan, {
                type: 'bar',
                data: chartDataPendapatan,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Sektor Usaha',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Pendapatan (dalam Rupiah)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    }
                }
            });

            var ctxPekerjaan = document.getElementById('pekerjaanChart').getContext('2d');
            var chartDataPekerjaan = @json($pekerjaanChartData);

            var pekerjaanChart = new Chart(ctxPekerjaan, {
                type: 'doughnut',
                data: chartDataPekerjaan,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                padding: 20,
                                font: {
                                    size: getResponsiveFontSize()
                                },
                                generateLabels: function(chart) {
                                    const data = chart.data;
                                    return data.labels.map((label, index) => ({
                                        text: label + ' : ' + data.datasets[0].data[index],
                                        fillStyle: data.datasets[0].backgroundColor[index],
                                        hidden: false,
                                        index: index
                                    }));
                                }
                            },
                            title: {
                                display: true,
                                text: 'Jenis Pekerjaan',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.raw + ' orang';
                                }
                            }
                        }
                    }
                }
            });

            var ctxUsia = document.getElementById('usiaChart').getContext('2d');
            var chartDataUsia = @json($usiaChartData);

            var usiaChart = new Chart(ctxUsia, {
                type: 'line',
                data: chartDataUsia,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Rentang Usia',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            stacked: false,
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    }
                }
            });

            chartDataUsia.datasets.forEach(dataset => {
                dataset.fill = true; 
                dataset.pointRadius = 3; 
                dataset.pointHoverRadius = 5; 
                dataset.pointBackgroundColor = dataset.backgroundColor; 
                dataset.pointBorderColor = 'rgb(0, 0, 0)'; 
            });

            usiaChart.update();

            var ctxKualitasBayi = document.getElementById('kualitasBayiChart').getContext('2d');
            var chartDataKualitasBayi = @json($kualitasBayiChartData);

            var kualitasBayiChart = new Chart(ctxKualitasBayi, {
                type: 'bar',
                data: chartDataKualitasBayi,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Kategori Bayi',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxKualitasIbuHamil = document.getElementById('kualitasIbuHamilChart').getContext('2d');
            var chartDataKualitasIbuHamil = @json($kualitasIbuHamilChartData);

            var kualitasIbuHamilChart = new Chart(ctxKualitasIbuHamil, {
                type: 'bar',
                data: chartDataKualitasIbuHamil,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Kategori Ibu Hamil',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxStatusBalita= document.getElementById('statusBalitaChart').getContext('2d');
            var chartDataStatusBalita = @json($statusBalitaChartData);

            var statusBalitaChart = new Chart(ctxStatusBalita, {
                type: 'bar',
                data: chartDataStatusBalita,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Kategori Balita',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxImunisasi= document.getElementById('imunisasiChart').getContext('2d');
            var chartDataImunisasi = @json($imunisasiChartData);

            var imunisasiChart = new Chart(ctxImunisasi, {
                type: 'bar',
                data: chartDataImunisasi,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jenis Imunisasi',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxRasioGuruMurid = document.getElementById('rasioGuruMuridChart').getContext('2d');
            var chartDataRasioGuruMurid = @json($rasioGuruMuridChartData);

            var rasioGuruMuridChart = new Chart(ctxRasioGuruMurid, {
                type: 'line',
                data: chartDataRasioGuruMurid,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Tingkat Pendidikan',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    }
                }
            });

            var ctxStatusPendidikan = document.getElementById('statusPendidikanChart').getContext('2d');
            var chartDataStatusPendidikan = @json($statusPendidikanChartData);

            var statusPendidikanChart = new Chart(ctxStatusPendidikan, {
                type: 'bar',
                data: chartDataStatusPendidikan,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Status',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxAgama= document.getElementById('agamaChart').getContext('2d');
            var chartDataAgama = @json($agamaChartData);

            var agamaChart = new Chart(ctxAgama, {
                type: 'bar',
                data: chartDataAgama,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah Pemeluk (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Agama',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxTingkatPendidikan = document.getElementById('tingkatPendidikanChart').getContext('2d');
            var chartDataTingkatPendidikan = @json($tingkatPendidikanChartData);

            var tingkatPendidikanChart = new Chart(ctxTingkatPendidikan, {
                type: 'bar',
                data: chartDataTingkatPendidikan,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jenjang Pendidikan',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    }
                }
            });

            var ctxKebutuhanAir = document.getElementById('kebutuhanAirChart').getContext('2d');
            var chartDataKebutuhanAir = @json($kebutuhanAirChartData);

            var kebutuhanAirChart = new Chart(ctxKebutuhanAir, {
                type: 'bar',
                data: chartDataKebutuhanAir,
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jumlah Pelanggan (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Kategori Sumber Air',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });

            var ctxAsetTanah = document.getElementById('asetTanahChart').getContext('2d');
            var chartDataAsetTanah = @json($asetTanahChartData);

            var asetTanahChart = new Chart(ctxAsetTanah, {
                type: 'bar',
                data: chartDataAsetTanah,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jenis Kepemilikan',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah Pemilik (dalam Orang)',
                                font: {
                                    size: getResponsiveFontSize(),
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                font: {
                                    size: getResponsiveFontSize()
                                }
                            }
                        }
                    }
                }
            });

            window.addEventListener('resize', function () {
                const newFontSize = getResponsiveFontSize();
                pendapatanChart.options.scales.x.title.font.size = newFontSize;
                pendapatanChart.options.scales.x.ticks.font.size = newFontSize;
                pendapatanChart.options.scales.y.title.font.size = newFontSize;
                pendapatanChart.options.scales.y.ticks.font.size = newFontSize;
                pendapatanChart.options.plugins.legend.labels.font.size = newFontSize;
                pendapatanChart.update();

                pekerjaanChart.options.plugins.legend.labels.font.size = newFontSize;
                pekerjaanChart.options.plugins.legend.title.font.size = newFontSize;
                pekerjaanChart.update();

                usiaChart.options.scales.x.title.font.size = newFontSize;
                usiaChart.options.scales.x.ticks.font.size = newFontSize;
                usiaChart.options.scales.y.title.font.size = newFontSize;
                usiaChart.options.scales.y.ticks.font.size = newFontSize;
                usiaChart.options.plugins.legend.labels.font.size = newFontSize;
                usiaChart.update();

                kualitasBayiChart.options.scales.x.title.font.size = newFontSize;
                kualitasBayiChart.options.scales.x.ticks.font.size = newFontSize;
                kualitasBayiChart.options.scales.y.title.font.size = newFontSize;
                kualitasBayiChart.options.scales.y.ticks.font.size = newFontSize;
                kualitasBayiChart.update();

                kualitasIbuHamilChart.options.scales.x.title.font.size = newFontSize;
                kualitasIbuHamilChart.options.scales.x.ticks.font.size = newFontSize;
                kualitasIbuHamilChart.options.scales.y.title.font.size = newFontSize;
                kualitasIbuHamilChart.options.scales.y.ticks.font.size = newFontSize;
                kualitasIbuHamilChart.update();

                statusBalitaChart.options.scales.x.title.font.size = newFontSize;
                statusBalitaChart.options.scales.x.ticks.font.size = newFontSize;
                statusBalitaChart.options.scales.y.title.font.size = newFontSize;
                statusBalitaChart.options.scales.y.ticks.font.size = newFontSize;
                statusBalitaChart.update();

                imunisasiChart.options.scales.x.title.font.size = newFontSize;
                imunisasiChart.options.scales.x.ticks.font.size = newFontSize;
                imunisasiChart.options.scales.y.title.font.size = newFontSize;
                imunisasiChart.options.scales.y.ticks.font.size = newFontSize;
                imunisasiChart.update();

                rasioGuruMuridChart.options.scales.x.title.font.size = newFontSize;
                rasioGuruMuridChart.options.scales.x.ticks.font.size = newFontSize;
                rasioGuruMuridChart.options.scales.y.title.font.size = newFontSize;
                rasioGuruMuridChart.options.scales.y.ticks.font.size = newFontSize;
                rasioGuruMuridChart.options.plugins.legend.labels.font.size = newFontSize;
                rasioGuruMuridChart.update();

                statusPendidikanChart.options.scales.x.title.font.size = newFontSize;
                statusPendidikanChart.options.scales.x.ticks.font.size = newFontSize;
                statusPendidikanChart.options.scales.y.title.font.size = newFontSize;
                statusPendidikanChart.options.scales.y.ticks.font.size = newFontSize;
                statusPendidikanChart.update();

                agamaChart.options.scales.x.title.font.size = newFontSize;
                agamaChart.options.scales.x.ticks.font.size = newFontSize;
                agamaChart.options.scales.y.title.font.size = newFontSize;
                agamaChart.options.scales.y.ticks.font.size = newFontSize;
                agamaChart.update();

                tingkatPendidikanChart.options.scales.x.title.font.size = newFontSize;
                tingkatPendidikanChart.options.scales.x.ticks.font.size = newFontSize;
                tingkatPendidikanChart.options.scales.y.title.font.size = newFontSize;
                tingkatPendidikanChart.options.scales.y.ticks.font.size = newFontSize;
                tingkatPendidikanChart.options.plugins.legend.labels.font.size = newFontSize;
                tingkatPendidikanChart.update();

                kebutuhanAirChart.options.scales.x.title.font.size = newFontSize;
                kebutuhanAirChart.options.scales.x.ticks.font.size = newFontSize;
                kebutuhanAirChart.options.scales.y.title.font.size = newFontSize;
                kebutuhanAirChart.options.scales.y.ticks.font.size = newFontSize;
                kebutuhanAirChart.update();

                asetTanahChart.options.scales.x.title.font.size = newFontSize;
                asetTanahChart.options.scales.x.ticks.font.size = newFontSize;
                asetTanahChart.options.scales.y.title.font.size = newFontSize;
                asetTanahChart.options.scales.y.ticks.font.size = newFontSize;
                asetTanahChart.options.plugins.legend.labels.font.size = newFontSize;
                asetTanahChart.update();
            });
        });
    </script>
</body>
</html>
