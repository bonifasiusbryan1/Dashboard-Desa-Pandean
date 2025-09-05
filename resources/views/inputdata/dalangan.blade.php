<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    Input Data Kependudukan Dusun Dalangan
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
            @if (Auth::check())
                @php
                    $id_dusun = Auth::user()->id_dusun;
                @endphp
                    @if ($id_dusun == 1)
                        <a href="{{ route('dashboard.pandean') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Pandean
                        </a>
                        <a href="{{ route('dashboard.pandeankidul_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Pandean Kidul
                        </a>
                        <a href="{{ route('dashboard.sidadap_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Sidadap
                        </a>
                        <a href="{{ route('dashboard.pandeanlor_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Pandean Lor
                        </a>
                        <a href="{{ route('dashboard.dalangan_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Dalangan
                        </a>
                        <a href="{{ route('dashboard.digulan_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Digulan
                        </a>
                        <a href="{{ route('dashboard.tanggulangin_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Tanggulangin
                        </a>
                        <a href="{{ route('dashboard.wonolobo_2') }}" class="sidebar-item">
                            <i class="bi bi-clipboard-data-fill mr-3"></i> Wonolobo
                        </a>

                        <div class="sidebar-divider"></div>

                        <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Input Data</div>
                        <a href="{{ route('inputdata.pandeankidul') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Pandean Kidul
                        </a>
                        <a href="{{ route('inputdata.sidadap') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Sidadap
                        </a>
                        <a href="{{ route('inputdata.pandeanlor') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Pandean Lor
                        </a>
                        <a href="{{ route('inputdata.dalangan') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Dalangan
                        </a>
                        <a href="{{ route('inputdata.digulan') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Digulan
                        </a>
                        <a href="{{ route('inputdata.tanggulangin') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Tanggulangin
                        </a>
                        <a href="{{ route('inputdata.wonolobo') }}" class="sidebar-item">
                            <i class="bi bi-pencil-square mr-2"></i> Input Data Wonolobo
                        </a>
                        
                        <div class="sidebar-divider"></div>

                @elseif ($id_dusun == 5)
                    <a href="{{ route('dashboard.dalangan') }}" class="sidebar-item">
                        <i class="bi bi-clipboard-data-fill mr-3"></i> Dalangan
                    </a>

                    <div class="sidebar-divider"></div>

                    <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Input Data</div>
                    <a href="{{ route('inputdata.dalangan') }}" class="sidebar-item">
                        <i class="bi bi-pencil-square mr-2"></i> Input Data Dalangan
                    </a>
                        
                    <div class="sidebar-divider"></div>
                        
                @endif
            @endif

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

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="pendapatan-form" method="POST" action="{{ route('storePendapatandalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Pendapatan Perkapita</h2>
                <p class="text-sm text-gray-600">Merupakan jumlah pendapatan perkapita masyarakat dikelompokkan menurut sektor usaha dalam satuan rupiah.</p>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="pertanian" class="block mb-2 text-sm font-medium text-gray-900">Sektor Pertanian</label>
                    <input type="text" id="pertanian" name="pertanian"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 100.000" required readonly
                        value="{{ old('pertanian', isset($pendapatanPerkapita[2]) ? number_format((int)$pendapatanPerkapita[2], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="peternakan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Peternakan</label>
                    <input type="text" id="peternakan" name="peternakan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 100.000" required readonly
                        value="{{ old('peternakan', isset($pendapatanPerkapita[1]) ? number_format((int)$pendapatanPerkapita[1], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="jasaperdagangan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Jasa dan Perdagangan</label>
                    <input type="text" id="jasaperdagangan" name="jasaperdagangan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 100.000" required readonly
                        value="{{ old('jasaperdagangan', isset($pendapatanPerkapita[3]) ? number_format((int)$pendapatanPerkapita[3], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="industri" class="block mb-2 text-sm font-medium text-gray-900">Sektor Industri</label>
                    <input type="text" id="industri" name="industri"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 100.000" required readonly
                        value="{{ old('industri', isset($pendapatanPerkapita[4]) ? number_format((int)$pendapatanPerkapita[4], 0, ',', '.') : '') }}" />
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Submit
                </button>
                <button type="button" id="edit-button"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Edit
                </button>
                <button type="reset" id="reset-button"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Reset
                </button>
            </div>

            <div id="flash-area">
                @if (session('success_pendapatan'))
                    <div id="flash-success" class="auto-hide mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">Data berhasil disimpan.</span>
                    </div>
                @endif

                @if ($errors->has('pendapatan'))
                    <div id="flash-error" class="auto-hide mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">Mohon lengkapi data terlebih dahulu.</span>
                    </div>
                @endif
            </div>
        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="mata_pencaharian-form" method="POST" action="{{ route('storeMataPencahariandalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Mata Pencaharian</h2>
                <p class="text-sm text-gray-600">Merupakan distribusi tenaga kerja menurut sektornya.</p>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">Perorangan</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="peroranganpertanian" class="block mb-2 text-sm font-medium text-gray-900">Sektor Pertanian</label>
                    <input type="text" id="peroranganpertanian" name="peroranganpertanian"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('peroranganpertanian', isset($perorangan[2]) ? number_format((int)$perorangan[2], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="peroranganpeternakan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Peternakan</label>
                    <input type="text" id="peroranganpeternakan" name="peroranganpeternakan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('peroranganpeternakan', isset($perorangan[1]) ? number_format((int)$perorangan[1], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="peroranganjasaperdagangan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Jasa dan Perdagangan</label>
                    <input type="text" id="peroranganjasaperdagangan" name="peroranganjasaperdagangan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('peroranganjasaperdagangan', isset($perorangan[3]) ? number_format((int)$perorangan[3], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="peroranganindustri" class="block mb-2 text-sm font-medium text-gray-900">Sektor Industri</label>
                    <input type="text" id="peroranganindustri" name="peroranganindustri"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('peroranganindustri', isset($perorangan[4]) ? number_format((int)$perorangan[4], 0, ',', '.') : '') }}" />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">Usaha</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="usahapertanian" class="block mb-2 text-sm font-medium text-gray-900">Sektor Pertanian</label>
                    <input type="text" id="usahapertanian" name="usahapertanian"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('usahapertanian', isset($usaha[2]) ? number_format((int)$usaha[2], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="usahapeternakan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Peternakan</label>
                    <input type="text" id="usahapeternakan" name="usahapeternakan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('usahapeternakan', isset($usaha[1]) ? number_format((int)$usaha[1], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="usahajasaperdagangan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Jasa dan Perdagangan</label>
                    <input type="text" id="usahajasaperdagangan" name="usahajasaperdagangan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('usahajasaperdagangan', isset($usaha[3]) ? number_format((int)$usaha[3], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="usahaindustri" class="block mb-2 text-sm font-medium text-gray-900">Sektor Industri</label>
                    <input type="text" id="usahaindustri" name="usahaindustri"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('usahaindustri', isset($usaha[4]) ? number_format((int)$usaha[4], 0, ',', '.') : '') }}" />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">Buruh</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="buruhpertanian" class="block mb-2 text-sm font-medium text-gray-900">Sektor Pertanian</label>
                    <input type="text" id="buruhpertanian" name="buruhpertanian"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('buruhpertanian', isset($buruh[2]) ? number_format((int)$buruh[2], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="buruhpeternakan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Peternakan</label>
                    <input type="text" id="buruhpeternakan" name="buruhpeternakan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('buruhpeternakan', isset($buruh[1]) ? number_format((int)$buruh[1], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="buruhjasaperdagangan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Jasa dan Perdagangan</label>
                    <input type="text" id="buruhjasaperdagangan" name="buruhjasaperdagangan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('buruhjasaperdagangan', isset($buruh[3]) ? number_format((int)$buruh[3], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="buruhindustri" class="block mb-2 text-sm font-medium text-gray-900">Sektor Industri</label>
                    <input type="text" id="buruhindustri" name="buruhindustri"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 500" required readonly
                        value="{{ old('buruhindustri', isset($buruh[4]) ? number_format((int)$buruh[4], 0, ',', '.') : '') }}" />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">Jumlah</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="jumlahpertanian" class="block mb-2 text-sm font-medium text-gray-900">Sektor Pertanian</label>
                    <input type="text" id="jumlahpertanian" name="jumlahpertanian"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 1.000" required readonly
                        value="{{ old('jumlahpertanian', isset($jumlah[2]) ? number_format((int)$jumlah[2], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="jumlahpeternakan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Peternakan</label>
                    <input type="text" id="jumlahpeternakan" name="jumlahpeternakan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 1.000" required readonly
                        value="{{ old('jumlahpeternakan', isset($jumlah[1]) ? number_format((int)$jumlah[1], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="jumlahjasaperdagangan" class="block mb-2 text-sm font-medium text-gray-900">Sektor Jasa dan Perdagangan</label>
                    <input type="text" id="jumlahjasaperdagangan" name="jumlahjasaperdagangan"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 1.000" required readonly
                        value="{{ old('jumlahjasaperdagangan', isset($jumlah[3]) ? number_format((int)$jumlah[3], 0, ',', '.') : '') }}" />
                </div>
                <div>
                    <label for="jumlahindustri" class="block mb-2 text-sm font-medium text-gray-900">Sektor Industri</label>
                    <input type="text" id="jumlahindustri" name="jumlahindustri"
                        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: 1.000" required readonly
                        value="{{ old('jumlahindustri', isset($jumlah[4]) ? number_format((int)$jumlah[4], 0, ',', '.') : '') }}" />
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Submit
                </button>
                <button type="button" id="edit-button-mp"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Edit
                </button>
                <button type="reset" id="reset-button-mp"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Reset
                </button>
            </div>

            <div id="flash-area">
                @if (session('success_mata_pencaharian'))
                    <div class="auto-hide mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">Data berhasil disimpan.</span>
                    </div>
                @endif

                @if ($errors->has('mata_pencaharian'))
                    <div class="auto-hide mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">Mohon lengkapi data terlebih dahulu.</span>
                    </div>
                @endif
            </div>
        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="pekerjaan-form" method="POST" action="{{ route('storePekerjaandalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Pekerjaan</h2>
                <p class="text-sm text-gray-600">Merupakan data pekerjaan masing-masing penduduk.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="petani" class="block mb-2 text-sm font-medium text-gray-900">Petani</label>
                    <input type="text" id="petani" name="petani" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly />
                </div>
                <div>
                    <label for="peternak" class="block mb-2 text-sm font-medium text-gray-900">Peternak</label>
                    <input type="text" id="peternak" name="peternak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly />
                </div>
                <div>
                    <label for="pemilikusaha" class="block mb-2 text-sm font-medium text-gray-900">Pemilik Usaha</label>
                    <input type="text" id="pemilikusaha" name="pemilikusaha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly />
                </div>
                <div>
                    <label for="pedagangkelontong" class="block mb-2 text-sm font-medium text-gray-900">Pedagang Barang Kelontong</label>
                    <input type="text" id="pedagangkelontong" name="pedagangkelontong" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly />
                </div>
                <div>
                    <label for="perangkatdesa" class="block mb-2 text-sm font-medium text-gray-900">Perangkat Desa</label>
                    <input type="text" id="perangkatdesa" name="perangkatdesa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly />
                </div>
                <div>
                    <label for="pelajar" class="block mb-2 text-sm font-medium text-gray-900">Pelajar</label>
                    <input type="text" id="pelajar" name="pelajar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly />
                </div>
                <div>
                    <label for="lainlain" class="block mb-2 text-sm font-medium text-gray-900">Lain-lain</label>
                    <input type="text" id="lainlain" name="lainlain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 300" required readonly />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-pekerjaan" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-pekerjaan" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_pekerjaan'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_pekerjaan') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="usia-form" method="POST" action="{{ route('storeUsiadalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Usia</h2>
                <p class="text-sm text-gray-600">Merupakan jumlah tiap gender untuk rentang tertentu.</p>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">0-5 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="0-5tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="0-5tahunl" name="0-5tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="0-5tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="0-5tahunp" name="0-5tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">6-10 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="6-10tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="6-10tahunl" name="6-10tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="6-10tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="6-10tahunp" name="6-10tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">11-15 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="11-15tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="11-15tahunl" name="11-15tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="11-15tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="11-15tahunp" name="11-15tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">16-20 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="16-20tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="16-20tahunl" name="16-20tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="16-20tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="16-20tahunp" name="16-20tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">21-25 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="21-25tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="21-25tahunl" name="21-25tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="21-25tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="21-25tahunp" name="21-25tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">26-30 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="26-30tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="26-30tahunl" name="26-30tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="26-30tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="26-30tahunp" name="26-30tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">31-35 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="31-35tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="31-35tahunl" name="31-35tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="31-35tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="31-35tahunp" name="31-35tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">36-40 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="36-40tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="36-40tahunl" name="36-40tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="36-40tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="36-40tahunp" name="36-40tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">41-45 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="41-45tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="41-45tahunl" name="41-45tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="41-45tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="41-45tahunp" name="41-45tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">46-50 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="46-50tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="46-50tahunl" name="46-50tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="46-50tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="46-50tahunp" name="46-50tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">51-55 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="51-55tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="51-55tahunl" name="51-55tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="51-55tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="51-55tahunp" name="51-55tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">56-60 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="56-60tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="56-60tahunl" name="56-60tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="56-60tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="56-60tahunp" name="56-60tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">61-65 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="61-65tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="61-65tahunl" name="61-65tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="61-65tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="61-65tahunp" name="61-65tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">66-70 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="66-70tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="66-70tahunl" name="66-70tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="66-70tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="66-70tahunp" name="66-70tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">71-75 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="71-75tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="71-75tahunl" name="71-75tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="71-75tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="71-75tahunp" name="71-75tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <p class="mb-1 text-base font-bold text-gray-900">>75 Tahun</p>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="75tahunl" class="block mb-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    <input type="text" id="75tahunl" name="75tahunl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
                <div>
                    <label for="75tahunp" class="block mb-2 text-sm font-medium text-gray-900">Perempuan</label>
                    <input type="text" id="75tahunp" name="75tahunp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 50" required readonly />
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-usia" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-usia" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_usia'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_usia') }}</span>
                </div>
            @endif
    
        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="kualitasbayi-form" method="POST" action="{{ route('storeKualitasBayidalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Kualitas Bayi</h2>
                <p class="text-sm text-gray-600">Merupakan gambaran kualitas bayi yang lahir.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="keguguran" class="block mb-2 text-sm font-medium text-gray-900">Keguguran</label>
                    <input type="text" id="keguguran" name="keguguran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="meninggal" class="block mb-2 text-sm font-medium text-gray-900">Meninggal</label>
                    <input type="text" id="meninggal" name="meninggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="sehat" class="block mb-2 text-sm font-medium text-gray-900">Sehat</label>
                    <input type="text" id="sehat" name="sehat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="kelainan" class="block mb-2 text-sm font-medium text-gray-900">Kelainan Fisik atau Mental</label>
                    <input type="text" id="kelainan" name="kelainan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-kualitasbayi" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-kualitasbayi" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_kualitasbayi'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_kualitasbayi') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="kualitasibuhamil-form" method="POST" action="{{ route('storeKualitasIbuHamildalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Kualitas Ibu Hamil</h2>
                <p class="text-sm text-gray-600">Merupakan gambaran kualitas ibu hamil yang melahirkan.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="diperiksa" class="block mb-2 text-sm font-medium text-gray-900">Diperiksa</label>
                    <input type="text" id="diperiksa" name="diperiksa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="selamatlahir" class="block mb-2 text-sm font-medium text-gray-900">Selamat Melahirkan</label>
                    <input type="text" id="selamatlahir" name="selamatlahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="wafatlahir" class="block mb-2 text-sm font-medium text-gray-900">Wafat Melahirkan</label>
                    <input type="text" id="wafatlahir" name="wafatlahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-kualitasibuhamil" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-kualitasibuhamil" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_kualitasibuhamil'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_kualitasibuhamil') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="statusbalita-form" method="POST" action="{{ route('storeStatusBalitadalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Status Balita</h2>
                <p class="text-sm text-gray-600">Merupakan data status gizi balita.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="bergiziburuk" class="block mb-2 text-sm font-medium text-gray-900">Bergizi Buruk</label>
                    <input type="text" id="bergiziburuk" name="bergiziburuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="bergizibaik" class="block mb-2 text-sm font-medium text-gray-900">Bergizi Baik</label>
                    <input type="text" id="bergizibaik" name="bergizibaik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="bergizikurang" class="block mb-2 text-sm font-medium text-gray-900">Bergizi Buruk</label>
                    <input type="text" id="bergizikurang" name="bergizikurang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="bergizilebih" class="block mb-2 text-sm font-medium text-gray-900">Bergizi Lebih</label>
                    <input type="text" id="bergizilebih" name="bergizilebih" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
                <div>
                    <label for="jumlahkeluarga" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Keluarga</label>
                    <input type="text" id="jumlahkeluarga" name="jumlahkeluarga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-statusbalita" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-statusbalita" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_statusbalita'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_statusbalita') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="imunisasi-form" method="POST" action="{{ route('storeImunisasidalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Imunisasi</h2>
                <p class="text-sm text-gray-600">Merupakan data pemberian imunisasi kepada balita.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="dpt1" class="block mb-2 text-sm font-medium text-gray-900">DPT-1, BCG, dan Polio-1</label>
                    <input type="text" id="dpt1" name="dpt1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 5" required readonly />
                </div>
                <div>
                    <label for="dpt2" class="block mb-2 text-sm font-medium text-gray-900">DPT-2 dan Polio-2</label>
                    <input type="text" id="dpt2" name="dpt2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 5" required readonly />
                </div>
                <div>
                    <label for="dpt3" class="block mb-2 text-sm font-medium text-gray-900">DPT-3 dan Polio-3</label>
                    <input type="text" id="dpt3" name="dpt3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 5" required readonly />
                </div>
                <div>
                    <label for="campak" class="block mb-2 text-sm font-medium text-gray-900">Campak</label>
                    <input type="text" id="campak" name="campak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 5" required readonly />
                </div>
                <div>
                    <label for="cacar" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Keluarga</label>
                    <input type="text" id="cacar" name="cacar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 5" required readonly />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-imunisasi" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-imunisasi" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_imunisasi'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_imunisasi') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="rasiogurumurid-form" method="POST" action="{{ route('storeRasioGuruMuriddalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Rasio Guru-Murid</h2>
                <p class="text-sm text-gray-600">Merupakan gambaran antara jumlah guru dengan murid per tingkat pendidikan.</p>
            </div>

            @foreach (['TK', 'SD', 'SMP', 'SMA', 'SLB'] as $tingkat)
                <p class="mb-1 text-base font-bold text-gray-900">{{ $tingkat }}</p>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="{{ strtolower($tingkat) }}g" class="block mb-2 text-sm font-medium text-gray-900">Guru</label>
                        <input type="text" id="{{ strtolower($tingkat) }}g" name="{{ strtolower($tingkat) }}g" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 5" required readonly value="{{ $rasioGuruMurid[$tingkat]->jumlah_guru ?? '' }}" />
                    </div>
                    <div>
                        <label for="{{ strtolower($tingkat) }}m" class="block mb-2 text-sm font-medium text-gray-900">Murid</label>
                        <input type="text" id="{{ strtolower($tingkat) }}m" name="{{ strtolower($tingkat) }}m" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly value="{{ $rasioGuruMurid[$tingkat]->jumlah_murid ?? '' }}" />
                    </div>
                </div>
            @endforeach

            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-rasiogurumurid" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-rasiogurumurid" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_rasiogurumurid'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_rasiogurumurid') }}</span>
                </div>
            @endif
        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="statuspendidikan-form" method="POST" action="{{ route('storeStatusPendidikandalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Status Pendidikan</h2>
                <p class="text-sm text-gray-600">Merupakan data anak yang masih atau tidak sekolah.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="masihsekolah" class="block mb-2 text-sm font-medium text-gray-900">Masih Sekolah</label>
                    <input type="text" id="masihsekolah" name="masihsekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly value="{{ $statusPendidikan['Masih Sekolah'] ?? '' }}" />
                </div>
                <div>
                    <label for="tidaksekolah" class="block mb-2 text-sm font-medium text-gray-900">Tidak Sekolah</label>
                    <input type="text" id="tidaksekolah" name="tidaksekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 10" required readonly value="{{ $statusPendidikan['Tidak Sekolah'] ?? '' }}" />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-statuspendidikan" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-statuspendidikan" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_statuspendidikan'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_statuspendidikan') }}</span>
                </div>
            @endif
        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="agama-form" method="POST" action="{{ route('storeAgamadalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Agama</h2>
                <p class="text-sm text-gray-600">Merupakan data jumlah umat beragama.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="islam" class="block mb-2 text-sm font-medium text-gray-900">Islam</label>
                    <input type="text" id="islam" name="islam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly value="{{ $agamaData['Islam'] ?? '' }}" />
                </div>
                <div>
                    <label for="kristen" class="block mb-2 text-sm font-medium text-gray-900">Kristen</label>
                    <input type="text" id="kristen" name="kristen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly value="{{ $agamaData['Kristen'] ?? '' }}" />
                </div>
                <div>
                    <label for="katholik" class="block mb-2 text-sm font-medium text-gray-900">Katholik</label>
                    <input type="text" id="katholik" name="katholik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly value="{{ $agamaData['Katholik'] ?? '' }}" />
                </div>
                <div>
                    <label for="buddha" class="block mb-2 text-sm font-medium text-gray-900">Buddha</label>
                    <input type="text" id="buddha" name="buddha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly value="{{ $agamaData['Buddha'] ?? '' }}" />
                </div>
                <div>
                    <label for="konghucu" class="block mb-2 text-sm font-medium text-gray-900">Konghucu</label>
                    <input type="text" id="konghucu" name="konghucu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly value="{{ $agamaData['Konghucu'] ?? '' }}" />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-agama" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-agama" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_agama'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_agama') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="tingkatpendidikan-form" method="POST" action="{{ route('storeTingkatPendidikandalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Tingkat Pendidikan</h2>
                <p class="text-sm text-gray-600">Merupakan data warga yang sedang/sudah menempuh tingkat pendidikan tertentu.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="tingkat1" class="block mb-2 text-sm font-medium text-gray-900">Buta Aksara</label>
                    <input type="text" id="tingkat1" name="tingkat1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat2" class="block mb-2 text-sm font-medium text-gray-900">TK</label>
                    <input type="text" id="tingkat2" name="tingkat2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat3" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat SD</label>
                    <input type="text" id="tingkat3" name="tingkat3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat4" class="block mb-2 text-sm font-medium text-gray-900">Tidak Tamat SD</label>
                    <input type="text" id="tingkat4" name="tingkat4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat5" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat SMP</label>
                    <input type="text" id="tingkat5" name="tingkat5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat6" class="block mb-2 text-sm font-medium text-gray-900">Tidak Tamat SMP</label>
                    <input type="text" id="tingkat6" name="tingkat6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat7" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat SMA</label>
                    <input type="text" id="tingkat7" name="tingkat7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat8" class="block mb-2 text-sm font-medium text-gray-900">Tidak Tamat SMA</label>
                    <input type="text" id="tingkat8" name="tingkat8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat9" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat Diploma</label>
                    <input type="text" id="tingkat9" name="tingkat9" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat10" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat S1</label>
                    <input type="text" id="tingkat10" name="tingkat10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat11" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat S2</label>
                    <input type="text" id="tingkat11" name="tingkat11" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat12" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat S3</label>
                    <input type="text" id="tingkat12" name="tingkat12" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
                <div>
                    <label for="tingkat13" class="block mb-2 text-sm font-medium text-gray-900">Sedang atau Tamat SLB A/B/C</label>
                    <input type="text" id="tingkat13" name="tingkat13" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 20" required readonly/>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-tingkatpendidikan" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-tingkatpendidikan" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_tingkatpendidikan'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_tingkatpendidikan') }}</span>
                </div>
            @endif

        </form>
    </div>

    <div class="container mx-auto mt-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="kebutuhanair-form" method="POST" action="{{ route('storeKebutuhanAirdalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Kebutuhan Air</h2>
                <p class="text-sm text-gray-600">Merupakan data kategori sumber air yang mayoritas digunakan.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="air1" class="block mb-2 text-sm font-medium text-gray-900">Sumur Gali</label>
                    <input type="text" id="air1" name="air1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly/>
                </div>
                <div>
                    <label for="air2" class="block mb-2 text-sm font-medium text-gray-900">PAM</label>
                    <input type="text" id="air2" name="air2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly/>
                </div>
                <div>
                    <label for="air3" class="block mb-2 text-sm font-medium text-gray-900">Hidran Umum</label>
                    <input type="text" id="air3" name="air3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly/>
                </div>
                <div>
                    <label for="air4" class="block mb-2 text-sm font-medium text-gray-900">Mata Air</label>
                    <input type="text" id="air4" name="air4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly/>
                </div>
                <div>
                    <label for="air5" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Keluarga</label>
                    <input type="text" id="air5" name="air5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 100" required readonly/>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-kebutuhanair" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-kebutuhanair" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_kebutuhanair'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_kebutuhanair') }}</span>
                </div>
            @endif
        </form>
    </div>

    <div class="container mx-auto mt-4 mb-4 px-4">
        <form class="bg-white p-8 rounded-lg shadow-md" id="asettanah-form" method="POST" action="{{ route('storeAsetTanahdalangan') }}">
            @csrf
            <div class="text-center mb-6">
                <h2 class="text-base md:text-lg font-bold text-gray-900">Aset Tanah</h2>
                <p class="text-sm text-gray-600">Merupakan data kepemilikan tanah golongan tertentu.</p>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                @php
                    $jenisTanah = [
                        'Tidak Memiliki Tanah',
                        'Memiliki Tanah Kurang dari 0,2 Ha',
                        'Memiliki Tanah Antara 0,21 - 0,3 Ha',
                        'Memiliki Tanah Antara 0,31 - 0,4 Ha',
                        'Memiliki Tanah Antara 0,41 - 0,5 Ha',
                        'Memiliki Tanah Antara 0,51 - 0,6 Ha',
                        'Memiliki Tanah Antara 0,61 - 0,7 Ha',
                        'Memiliki Tanah Antara 0,71 - 0,8 Ha',
                        'Memiliki Tanah Antara 0,81 - 0,9 Ha',
                        'Memiliki Tanah Antara 0,91 - 1,0 Ha',
                        'Memiliki Tanah Antara 1,01 - 5,0 Ha',
                        'Memiliki Tanah Antara 5,01 - 10,0 Ha',
                        'Memiliki Tanah Lebih dari 10 Ha'
                    ];
                @endphp
                @foreach ($jenisTanah as $index => $jenis)
                    <div>
                        <label for="aset{{ $index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $jenis }}</label>
                        <input type="text" id="aset{{ $index + 1 }}" name="aset{{ $index + 1 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $asetTanahData[$jenis]->jumlah ?? '' }}" placeholder="Contoh: 50" required readonly />
                    </div>
                @endforeach
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                <button type="button" id="edit-button-asettanah" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                <button type="reset" id="reset-button-asettanah" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
            </div>

            @if (session('success_asettanah'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success_asettanah') }}</span>
                </div>
            @endif
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const Utils = {
                adjustLogoutStyles() {
                    const width = window.innerWidth;
                    const button = document.getElementById('logout-button');
                    const icon = document.getElementById('logout-icon');
                    const text = document.getElementById('logout-text');
                    if (!button || !icon || !text) return;
                    if (width < 768) {
                        button.style.padding = '2px 10px';
                        icon.style.height = '16px'; icon.style.width = '16px';
                        text.style.fontSize = '12px';
                    } else {
                        button.style.padding = '4px 10px';
                        icon.style.height = '20px'; icon.style.width = '20px';
                        text.style.fontSize = '14px';
                    }
                },

                onlyAllowNumbers(event) {
                    const charCode = event.which ? event.which : event.keyCode;
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) event.preventDefault();
                },

                limitToThreeCharacters(event) {
                    let value = event.target.value.replace(/\D/g, '');
                    if (value.length > 3) value = value.slice(0, 3);
                    event.target.value = value;
                },

                limitToTenCharacters(event) {
                    let value = event.target.value.replace(/\D/g, '');
                    if (value.length > 10) value = value.slice(0, 10);
                    event.target.value = value;
                },

                showInlineError(form, message) {
                    const area = form.querySelector('#flash-area');
                    if (!area) return;
            
                    const old = form.querySelector('#client-error');
                    if (old) old.remove();

                    const div = document.createElement('div');
                    div.id = 'client-error';
                    div.className = 'auto-hide mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative';
                    div.setAttribute('role', 'alert');
                    div.innerHTML = '<strong class="font-bold">Gagal!</strong> <span class="block sm:inline">' + message + '</span>';
                    area.appendChild(div);

                    setTimeout(() => { div.remove(); }, 5000);
                },

                validateForm(formId, inputIds) {
                    const form = document.getElementById(formId);
                    const inputs = inputIds.map(id => document.getElementById(id)).filter(Boolean);
                    if (!form) return;

                    form.addEventListener('submit', function (event) {
                        let allFilled = true;
                        inputs.forEach(function (input) {
                            if (input.value.trim() === '') {
                                allFilled = false;
                                input.classList.add('border-red-500');
                            } else {
                                input.classList.remove('border-red-500');
                            }
                        });

                        if (!allFilled) {
                            event.preventDefault();
                            Utils.showInlineError(form, 'Mohon lengkapi data terlebih dahulu.');
                        }
                    });
                },

                autoHideFlashes() {
                    document.querySelectorAll('.auto-hide').forEach(el => {
                        setTimeout(() => { el.remove(); }, 5000);
                    });
                },

                getResponsiveFontSize() {
                    const width = window.innerWidth;
                    if (width > 1200) return 12;
                    if (width > 768) return 10;
                    return 8;
                },

                formatRupiahOnInput(input) {
                    const oldVal = input.value;
                    const selStart = input.selectionStart;

                    const digits = oldVal.replace(/\D/g, '').slice(0, 10);

                    const formatted = digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                    const leftDigitsCount = selStart != null
                        ? oldVal.slice(0, selStart).replace(/\D/g, '').length
                        : digits.length;

                    input.value = formatted;

                    if (selStart != null) {
                        let newPos = 0, counted = 0;
                        while (newPos < formatted.length && counted < leftDigitsCount) {
                            if (/\d/.test(formatted.charAt(newPos))) counted++;
                            newPos++;
                        }
                        input.setSelectionRange(newPos, newPos);
                    }
                }
            };

            class FormManager {
                constructor(config) {
                    this.formId = config.formId;
                    this.inputIds = config.inputIds;
                    this.editButtonId = config.editButtonId;
                    this.resetButtonId = config.resetButtonId;
                    this.initialData = {};
                    this.init();
                }

                init() {
                    this.setupElements();
                    this.setupEventListeners();
                    this.setupInputValidation();
                    this.storeInitialData();
                    Utils.validateForm(this.formId, this.inputIds);
                    Utils.autoHideFlashes();
                }

                setupElements() {
                    this.form = document.getElementById(this.formId);
                    this.editButton = document.getElementById(this.editButtonId);
                    this.resetButton = document.getElementById(this.resetButtonId);
                }

                setupEventListeners() {
                    if (this.editButton) {
                        this.editButton.addEventListener('click', () => this.enableEditing());
                    }
                    if (this.resetButton) {
                        this.resetButton.addEventListener('click', (event) => this.resetForm(event));
                    }
                    if (this.form) {
                        this.form.addEventListener('submit', () => this.handleSubmit());
                    }
                }

                setupInputValidation() {
                    this.inputIds.forEach(id => {
                        const input = document.getElementById(id);
                        if (input) {
                            input.addEventListener('keypress', Utils.onlyAllowNumbers);
                            if (this.formId === 'pendapatan-form' || this.formId === 'mata_pencaharian-form') {
                                input.addEventListener('input', () => Utils.formatRupiahOnInput(input));
                                if (input.value) Utils.formatRupiahOnInput(input);
                            } else {
                                input.addEventListener('input', Utils.limitToThreeCharacters);
                            }
                        }
                    });
                }

                storeInitialData() {
                    this.inputIds.forEach(id => {
                        const input = document.getElementById(id);
                        if (input) this.initialData[id] = input.value;
                    });
                }

                enableEditing() {
                    this.toggleReadonly(false);
                }

                resetForm(event) {
                    event.preventDefault();
                    this.inputIds.forEach(id => {
                        const input = document.getElementById(id);
                        if (input) {
                            input.value = this.initialData[id] || '';
                        }
                    });
                    this.toggleReadonly(true);
                }

                handleSubmit() {
                    
                }

                toggleReadonly(isReadonly) {
                    this.inputIds.forEach(id => {
                        const input = document.getElementById(id);
                        if (!input) return;
                        input.readOnly = isReadonly;

                        if (isReadonly) {
                            input.classList.add('bg-gray-50', 'cursor-pointer');
                            input.classList.remove('bg-white');
                        } else {
                            input.classList.remove('bg-gray-50', 'cursor-pointer');
                            input.classList.add('bg-white');
                        }
                    });
                }
            }

            const SidebarManager = {
                init() {
                    this.sidebar = document.getElementById('sidebar');
                    this.overlay = document.getElementById('overlay');
                    this.hamburger = document.querySelector('.hamburger');
                    this.setupEventListeners();
                    this.highlightCurrentPage();
                },
                setupEventListeners() {
                    if (this.hamburger) this.hamburger.addEventListener('click', () => this.toggleSidebar());
                    if (this.overlay) this.overlay.addEventListener('click', () => this.closeSidebar());
                    document.addEventListener('click', (event) => {
                        if (this.sidebar && this.overlay && this.hamburger) {
                            const isClickInsideSidebar = this.sidebar.contains(event.target);
                            const isClickOnHamburger = this.hamburger.contains(event.target);
                            if (!isClickInsideSidebar && !isClickOnHamburger && window.innerWidth < 768) {
                                this.closeSidebar();
                            }
                        }
                    });
                },
                toggleSidebar() {
                    if (this.sidebar && this.overlay) {
                        this.sidebar.classList.toggle('open');
                        this.overlay.classList.toggle('open');
                    }
                },
                closeSidebar() {
                    if (this.sidebar && this.overlay) {
                        this.sidebar.classList.remove('open');
                        this.overlay.classList.remove('open');
                    }
                },
                highlightCurrentPage() {
                    const currentLocation = window.location.href;
                    const sidebarItems = document.querySelectorAll('.sidebar-item');
                    sidebarItems.forEach(item => {
                        if (item.href === currentLocation) item.classList.add('active');
                    });
                }
            };

            const formConfigs = [
                {
                    formId: 'pendapatan-form',
                    inputIds: ['pertanian', 'peternakan', 'jasaperdagangan', 'industri'],
                    editButtonId: 'edit-button',
                    resetButtonId: 'reset-button'
                },
                {
                    formId: 'mata_pencaharian-form',
                    inputIds: [
                        'peroranganpertanian', 'peroranganpeternakan', 'peroranganjasaperdagangan', 'peroranganindustri',
                        'usahapertanian', 'usahapeternakan', 'usahajasaperdagangan', 'usahaindustri',
                        'buruhpertanian', 'buruhpeternakan', 'buruhjasaperdagangan', 'buruhindustri',
                        'jumlahpertanian', 'jumlahpeternakan', 'jumlahjasaperdagangan', 'jumlahindustri'
                    ],
                    editButtonId: 'edit-button-mp',
                    resetButtonId: 'reset-button-mp'
                },
                {
                    formId: 'pekerjaan-form',
                    inputIds: ['petani', 'peternak', 'pemilikusaha', 'pedagangkelontong', 'perangkatdesa', 'pelajar', 'lainlain'],
                    editButtonId: 'edit-button-pekerjaan',
                    resetButtonId: 'reset-button-pekerjaan'
                },
                {
                    formId: 'usia-form',
                    inputIds: [
                        '0-5tahunl', '0-5tahunp', '6-10tahunl', '6-10tahunp', '11-15tahunl', '11-15tahunp',
                        '16-20tahunl', '16-20tahunp', '21-25tahunl', '21-25tahunp', '26-30tahunl', '26-30tahunp',
                        '31-35tahunl', '31-35tahunp', '36-40tahunl', '36-40tahunp', '41-45tahunl', '41-45tahunp',
                        '46-50tahunl', '46-50tahunp', '51-55tahunl', '51-55tahunp', '56-60tahunl', '56-60tahunp',
                        '61-65tahunl', '61-65tahunp', '66-70tahunl', '66-70tahunp', '71-75tahunl', '71-75tahunp',
                        '75tahunl', '75tahunp'
                    ],
                    editButtonId: 'edit-button-usia',
                    resetButtonId: 'reset-button-usia'
                },
                {
                    formId: 'kualitasbayi-form',
                    inputIds: ['keguguran', 'meninggal', 'sehat', 'kelainan'],
                    editButtonId: 'edit-button-kualitasbayi',
                    resetButtonId: 'reset-button-kualitasbayi'
                },
                {
                    formId: 'kualitasibuhamil-form',
                    inputIds: ['diperiksa', 'selamatlahir', 'wafatlahir'],
                    editButtonId: 'edit-button-kualitasibuhamil',
                    resetButtonId: 'reset-button-kualitasibuhamil'
                },
                {
                    formId: 'statusbalita-form',
                    inputIds: ['bergiziburuk', 'bergizibaik', 'bergizikurang', 'bergizilebih', 'jumlahkeluarga'],
                    editButtonId: 'edit-button-statusbalita',
                    resetButtonId: 'reset-button-statusbalita'
                },
                {
                    formId: 'imunisasi-form',
                    inputIds: ['dpt1', 'dpt2', 'dpt3', 'campak', 'cacar'],
                    editButtonId: 'edit-button-imunisasi',
                    resetButtonId: 'reset-button-imunisasi'
                },
                {
                    formId: 'rasiogurumurid-form',
                    inputIds: ['tkg', 'tkm', 'sdg', 'sdm', 'smpg', 'smpm', 'smag', 'smam', 'slbg', 'slbm'],
                    editButtonId: 'edit-button-rasiogurumurid',
                    resetButtonId: 'reset-button-rasiogurumurid'
                },
                {
                    formId: 'statuspendidikan-form',
                    inputIds: ['masihsekolah', 'tidaksekolah'],
                    editButtonId: 'edit-button-statuspendidikan',
                    resetButtonId: 'reset-button-statuspendidikan'
                },
                {
                    formId: 'agama-form',
                    inputIds: ['islam', 'kristen', 'katholik', 'buddha', 'konghucu'],
                    editButtonId: 'edit-button-agama',
                    resetButtonId: 'reset-button-agama'
                },
                {
                    formId: 'tingkatpendidikan-form',
                    inputIds: [
                        'tingkat1', 'tingkat2', 'tingkat3', 'tingkat4', 'tingkat5', 'tingkat6',
                        'tingkat7', 'tingkat8', 'tingkat9', 'tingkat10', 'tingkat11', 'tingkat12', 'tingkat13'
                    ],
                    editButtonId: 'edit-button-tingkatpendidikan',
                    resetButtonId: 'reset-button-tingkatpendidikan'
                },
                {
                    formId: 'kebutuhanair-form',
                    inputIds: ['air1', 'air2', 'air3', 'air4', 'air5'],
                    editButtonId: 'edit-button-kebutuhanair',
                    resetButtonId: 'reset-button-kebutuhanair'
                },
                {
                    formId: 'asettanah-form',
                    inputIds: [
                        'aset1', 'aset2', 'aset3', 'aset4', 'aset5', 'aset6', 'aset7', 'aset8', 'aset9', 'aset10', 'aset11', 'aset12', 'aset13'
                    ],
                    editButtonId: 'edit-button-asettanah',
                    resetButtonId: 'reset-button-asettanah'
                }
            ];

            Utils.adjustLogoutStyles();
            window.addEventListener('load', Utils.adjustLogoutStyles);
            window.addEventListener('resize', Utils.adjustLogoutStyles);
            
            SidebarManager.init();
            
            formConfigs.forEach(config => {
                new FormManager(config);
            });
        });
    </script>
</body>
</html>
