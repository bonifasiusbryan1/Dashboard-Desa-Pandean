<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PandeanController;
use App\Http\Controllers\PandeanKidulController;
use App\Http\Controllers\SidadapController;
use App\Http\Controllers\PandeanLorController;
use App\Http\Controllers\DalanganController;
use App\Http\Controllers\DigulanController;
use App\Http\Controllers\TanggulanginController;
use App\Http\Controllers\WonoloboController;

//Login dan Logout
Route::get('/', [PenggunaController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [PenggunaController::class, 'login'])->name('login');
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

//Dashboard
Route::view('/dashboard/pandean', 'dashboard.pandean')->name('dashboard.pandean');
Route::view('/dashboard/pandeankidul', 'dashboard.pandeankidul')->name('dashboard.pandeankidul');
Route::view('/dashboard/sidadap', 'dashboard.sidadap')->name('dashboard.sidadap');
Route::view('/dashboard/pandeanlor', 'dashboard.pandeanlor')->name('dashboard.pandeanlor');
Route::view('/dashboard/dalangan', 'dashboard.dalangan')->name('dashboard.dalangan');
Route::view('/dashboard/digulan', 'dashboard.digulan')->name('dashboard.digulan');
Route::view('/dashboard/tanggulangin', 'dashboard.tanggulangin')->name('dashboard.tanggulangin');
Route::view('/dashboard/wonolobo', 'dashboard.wonolobo')->name('dashboard.wonolobo');

//Charts Pandean
Route::get('/dashboard/pandean', [PandeanController::class, 'pandeanData'])->name('dashboard.pandean');

//Charts Pandean Kidul
Route::get('/dashboard/pandeankidul', [PandeanKidulController::class, 'pandeankidulData'])->name('dashboard.pandeankidul');

Route::get('/dashboard/pandeankidul_2', [PandeanKidulController::class, 'pandeankidulData_2'])->name('dashboard.pandeankidul_2');

//Charts Sidadap
Route::get('/dashboard/sidadap', [SidadapController::class, 'sidadapData'])->name('dashboard.sidadap');

Route::get('/dashboard/sidadap_2', [SidadapController::class, 'sidadapData_2'])->name('dashboard.sidadap_2');

//Charts Pandean Lor
Route::get('/dashboard/pandeanlor', [PandeanLorController::class, 'pandeanlorData'])->name('dashboard.pandeanlor');

Route::get('/dashboard/pandeanlor_2', [PandeanLorController::class, 'pandeanlorData_2'])->name('dashboard.pandeanlor_2');

//Charts Dalangan
Route::get('/dashboard/dalangan', [DalanganController::class, 'dalanganData'])->name('dashboard.dalangan');

Route::get('/dashboard/dalangan_2', [DalanganController::class, 'dalanganData_2'])->name('dashboard.dalangan_2');

//Charts Digulan
Route::get('/dashboard/digulan', [DigulanController::class, 'digulanData'])->name('dashboard.digulan');

Route::get('/dashboard/digulan_2', [DigulanController::class, 'digulanData_2'])->name('dashboard.digulan_2');

//Charts Tanggulangin
Route::get('/dashboard/tanggulangin', [TanggulanginController::class, 'tanggulanginData'])->name('dashboard.tanggulangin');

Route::get('/dashboard/tanggulangin_2', [TanggulanginController::class, 'tanggulanginData_2'])->name('dashboard.tanggulangin_2');

//Charts Wonolobo
Route::get('/dashboard/wonolobo', [WonoloboController::class, 'wonoloboData'])->name('dashboard.wonolobo');

Route::get('/dashboard/wonolobo_2', [WonoloboController::class, 'wonoloboData_2'])->name('dashboard.wonolobo_2');

//Input Data Pandean Kidul
Route::get('/inputdata/pandeankidul', [PandeanKidulController::class, 'formPendapatan'])->name('inputdata.pandeankidul');
Route::post('/store-pendapatanpandeankidul', [PandeanKidulController::class, 'storePendapatan'])->name('storePendapatanpandeankidul');

Route::get('/inputdata/mata_pencaharianpandeankidul', [PandeanKidulController::class, 'formMataPencaharian'])->name('inputdata.mata_pencaharianpandeankidul');
Route::post('/store-mata_pencaharianpandeankidul', [PandeanKidulController::class, 'storeMataPencaharian'])->name('storeMataPencaharianpandeankidul');

Route::get('/inputdata/pekerjaanpandeankidul', [PandeanKidulController::class, 'formPekerjaan'])->name('inputdata.pekerjaanpandeankidul');
Route::post('/store-pekerjaanpandeankidul', [PandeanKidulController::class, 'storePekerjaan'])->name('storePekerjaanpandeankidul');

Route::get('/inputdata/usiamcandeankidul', [PandeanKidulController::class, 'formUsia'])->name('inputdata.usiamcandeankidul');
Route::post('/store-usiapandeankidul', [PandeanKidulController::class, 'storeUsia'])->name('storeUsiapandeankidul');

Route::get('/inputdata/kualitas_bayipandeankidul', [PandeanKidulController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayipandeankidul');
Route::post('/store-kualitas_bayipandeankidul', [PandeanKidulController::class, 'storeKualitasBayi'])->name('storeKualitasBayipandeankidul');

Route::get('/inputdata/kualitas_ibuhamilpandeankidul', [PandeanKidulController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamilpandeankidul');
Route::post('/store-kualitas_ibuhamilpandeankidul', [PandeanKidulController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamilpandeankidul');

Route::get('/inputdata/status_balipandeankidul', [PandeanKidulController::class, 'formStatusBalita'])->name('inputdata.status_balipandeankidul');
Route::post('/store-status_balitapandeankidul', [PandeanKidulController::class, 'storeStatusBalita'])->name('storeStatusBalitapandeankidul');

Route::get('/inputdata/imunisasipandeankidul', [PandeanKidulController::class, 'formImunisasi'])->name('inputdata.imunisasipandeankidul');
Route::post('/store-imunisasipandeankidul', [PandeanKidulController::class, 'storeImunisasi'])->name('storeImunisasipandeankidul');

Route::get('/inputdata/rasio_guru_muridpandeankidul', [PandeanKidulController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_muridpandeankidul');
Route::post('/store-rasio_guru_muridpandeankidul', [PandeanKidulController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMuridpandeankidul');

Route::get('/inputdata/status_pendidikanpandeankidul', [PandeanKidulController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikanpandeankidul');
Route::post('/store-status_pendidikanpandeankidul', [PandeanKidulController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikanpandeankidul');

Route::get('/inputdata/agamapandeankidul', [PandeanKidulController::class, 'formAgama'])->name('inputdata.agamapandeankidul');
Route::post('/store-agamapandeankidul', [PandeanKidulController::class, 'storeAgama'])->name('storeAgamapandeankidul');

Route::get('/inputdata/tingkat_pendidikanpandeankidul', [PandeanKidulController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikanpandeankidul');
Route::post('/store-tingkat_pendidikanpandeankidul', [PandeanKidulController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikanpandeankidul');

Route::get('/inputdata/kebutuhan_airpandeankidul', [PandeanKidulController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_airpandeankidul');
Route::post('/store-kebutuhan_airpandeankidul', [PandeanKidulController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAirpandeankidul');

Route::get('/inputdata/aset_tanahpandeankidul', [PandeanKidulController::class, 'formAsetTanah'])->name('inputdata.aset_tanahpandeankidul');
Route::post('/store-aset_tanahpandeankidul', [PandeanKidulController::class, 'storeAsetTanah'])->name('storeAsetTanahpandeankidul');

//Input Data Sidadap
Route::get('/inputdata/sidadap', [SidadapController::class, 'formPendapatan'])->name('inputdata.sidadap');
Route::post('/store-pendapatansidadap', [SidadapController::class, 'storePendapatan'])->name('storePendapatansidadap');

Route::get('/inputdata/mata_pencahariansidadap', [SidadapController::class, 'formMataPencaharian'])->name('inputdata.mata_pencahariansidadap');
Route::post('/store-mata_pencahariansidadap', [SidadapController::class, 'storeMataPencaharian'])->name('storeMataPencahariansidadap');

Route::get('/inputdata/pekerjaansidadap', [SidadapController::class, 'formPekerjaan'])->name('inputdata.pekerjaansidadap');
Route::post('/store-pekerjaansidadap', [SidadapController::class, 'storePekerjaan'])->name('storePekerjaansidadap');

Route::get('/inputdata/usiasidadap', [SidadapController::class, 'formUsia'])->name('inputdata.usiasidadap');
Route::post('/store-usiasidadap', [SidadapController::class, 'storeUsia'])->name('storeUsiasidadap');

Route::get('/inputdata/kualitas_bayisidadap', [SidadapController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayisidadap');
Route::post('/store-kualitas_bayisidadap', [SidadapController::class, 'storeKualitasBayi'])->name('storeKualitasBayisidadap');

Route::get('/inputdata/kualitas_ibuhamilsidadap', [SidadapController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamilsidadap');
Route::post('/store-kualitas_ibuhamilsidadap', [SidadapController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamilsidadap');

Route::get('/inputdata/status_balitasidadap', [SidadapController::class, 'formStatusBalita'])->name('inputdata.status_balitasidadap');
Route::post('/store-status_balitasidadap', [SidadapController::class, 'storeStatusBalita'])->name('storeStatusBalitasidadap');

Route::get('/inputdata/imunisasisidadap', [SidadapController::class, 'formImunisasi'])->name('inputdata.imunisasisidadap');
Route::post('/store-imunisasisidadap', [SidadapController::class, 'storeImunisasi'])->name('storeImunisasisidadap');

Route::get('/inputdata/rasio_guru_muridsidadap', [SidadapController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_muridsidadap');
Route::post('/store-rasio_guru_muridsidadap', [SidadapController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMuridsidadap');

Route::get('/inputdata/status_pendidikansidadap', [SidadapController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikansidadap');
Route::post('/store-status_pendidikansidadap', [SidadapController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikansidadap');

Route::get('/inputdata/agamasidadap', [SidadapController::class, 'formAgama'])->name('inputdata.agamasidadap');
Route::post('/store-agamasidadap', [SidadapController::class, 'storeAgama'])->name('storeAgamasidadap');

Route::get('/inputdata/tingkat_pendidikansidadap', [SidadapController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikansidadap');
Route::post('/store-tingkat_pendidikansidadap', [SidadapController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikansidadap');

Route::get('/inputdata/kebutuhan_airsidadap', [SidadapController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_airsidadap');
Route::post('/store-kebutuhan_airsidadap', [SidadapController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAirsidadap');

Route::get('/inputdata/aset_tanahsidadap', [SidadapController::class, 'formAsetTanah'])->name('inputdata.aset_tanahsidadap');
Route::post('/store-aset_tanahsidadap', [SidadapController::class, 'storeAsetTanah'])->name('storeAsetTanahsidadap');

//Input Data Pandean Lor
Route::get('/inputdata/pandeanlor', [PandeanLorController::class, 'formPendapatan'])->name('inputdata.pandeanlor');
Route::post('/store-pendapatanpandeanlor', [PandeanLorController::class, 'storePendapatan'])->name('storePendapatanpandeanlor');

Route::get('/inputdata/mata_pencaharianpandeanlor', [PandeanLorController::class, 'formMataPencaharian'])->name('inputdata.mata_pencaharianpandeanlor');
Route::post('/store-mata_pencaharianpandeanlor', [PandeanLorController::class, 'storeMataPencaharian'])->name('storeMataPencaharianpandeanlor');

Route::get('/inputdata/pekerjaanpandeanlor', [PandeanLorController::class, 'formPekerjaan'])->name('inputdata.pekerjaanpandeanlor');
Route::post('/store-pekerjaanpandeanlor', [PandeanLorController::class, 'storePekerjaan'])->name('storePekerjaanpandeanlor');

Route::get('/inputdata/usiapandeanlor', [PandeanLorController::class, 'formUsia'])->name('inputdata.usiapandeanlor');
Route::post('/store-usiapandeanlor', [PandeanLorController::class, 'storeUsia'])->name('storeUsiapandeanlor');

Route::get('/inputdata/kualitas_bayipandeanlor', [PandeanLorController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayipandeanlor');
Route::post('/store-kualitas_bayipandeanlor', [PandeanLorController::class, 'storeKualitasBayi'])->name('storeKualitasBayipandeanlor');

Route::get('/inputdata/kualitas_ibuhamilpandeanlor', [PandeanLorController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamilpandeanlor');
Route::post('/store-kualitas_ibuhamilpandeanlor', [PandeanLorController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamilpandeanlor');

Route::get('/inputdata/status_balitapandeanlor', [PandeanLorController::class, 'formStatusBalita'])->name('inputdata.status_balitapandeanlor');
Route::post('/store-status_balitapandeanlor', [PandeanLorController::class, 'storeStatusBalita'])->name('storeStatusBalitapandeanlor');

Route::get('/inputdata/imunisasipandeanlor', [PandeanLorController::class, 'formImunisasi'])->name('inputdata.imunisasipandeanlor');
Route::post('/store-imunisasipandeanlor', [PandeanLorController::class, 'storeImunisasi'])->name('storeImunisasipandeanlor');

Route::get('/inputdata/rasio_guru_muridpandeanlor', [PandeanLorController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_muridpandeanlor');
Route::post('/store-rasio_guru_muridpandeanlor', [PandeanLorController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMuridpandeanlor');

Route::get('/inputdata/status_pendidikanpandeanlor', [PandeanLorController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikanpandeanlor');
Route::post('/store-status_pendidikanpandeanlor', [PandeanLorController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikanpandeanlor');

Route::get('/inputdata/agamapandeanlor', [PandeanLorController::class, 'formAgama'])->name('inputdata.agamapandeanlor');
Route::post('/store-agamapandeanlor', [PandeanLorController::class, 'storeAgama'])->name('storeAgamapandeanlor');

Route::get('/inputdata/tingkat_pendidikanpandeanlor', [PandeanLorController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikanpandeanlor');
Route::post('/store-tingkat_pendidikanpandeanlor', [PandeanLorController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikanpandeanlor');

Route::get('/inputdata/kebutuhan_airpandeanlor', [PandeanLorController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_airpandeanlor');
Route::post('/store-kebutuhan_airpandeanlor', [PandeanLorController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAirpandeanlor');

Route::get('/inputdata/aset_tanahpandeanlor', [PandeanLorController::class, 'formAsetTanah'])->name('inputdata.aset_tanahpandeanlor');
Route::post('/store-aset_tanahpandeanlor', [PandeanLorController::class, 'storeAsetTanah'])->name('storeAsetTanahpandeanlor');

//Input Data Dalangan
Route::get('/inputdata/dalangan', [DalanganController::class, 'formPendapatan'])->name('inputdata.dalangan');
Route::post('/store-pendapatandalangan', [DalanganController::class, 'storePendapatan'])->name('storePendapatandalangan');

Route::get('/inputdata/mata_pencahariandalangan', [DalanganController::class, 'formMataPencaharian'])->name('inputdata.mata_pencahariandalangan');
Route::post('/store-mata_pencahariandalangan', [DalanganController::class, 'storeMataPencaharian'])->name('storeMataPencahariandalangan');

Route::get('/inputdata/pekerjaandalangan', [DalanganController::class, 'formPekerjaan'])->name('inputdata.pekerjaandalangan');
Route::post('/store-pekerjaandalangan', [DalanganController::class, 'storePekerjaan'])->name('storePekerjaandalangan');

Route::get('/inputdata/usiadalangan', [DalanganController::class, 'formUsia'])->name('inputdata.usiadalangan');
Route::post('/store-usiadalangan', [DalanganController::class, 'storeUsia'])->name('storeUsiadalangan');

Route::get('/inputdata/kualitas_bayidalangan', [DalanganController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayidalangan');
Route::post('/store-kualitas_bayidalangan', [DalanganController::class, 'storeKualitasBayi'])->name('storeKualitasBayidalangan');

Route::get('/inputdata/kualitas_ibuhamildalangan', [DalanganController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamildalangan');
Route::post('/store-kualitas_ibuhamildalangan', [DalanganController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamildalangan');

Route::get('/inputdata/status_balitadalangan', [DalanganController::class, 'formStatusBalita'])->name('inputdata.status_balitadalangan');
Route::post('/store-status_balitadalangan', [DalanganController::class, 'storeStatusBalita'])->name('storeStatusBalitadalangan');

Route::get('/inputdata/imunisasidalangan', [DalanganController::class, 'formImunisasi'])->name('inputdata.imunisasidalangan');
Route::post('/store-imunisasidalangan', [DalanganController::class, 'storeImunisasi'])->name('storeImunisasidalangan');

Route::get('/inputdata/rasio_guru_muriddalangan', [DalanganController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_muriddalangan');
Route::post('/store-rasio_guru_muriddalangan', [DalanganController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMuriddalangan');

Route::get('/inputdata/status_pendidikandalangan', [DalanganController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikandalangan');
Route::post('/store-status_pendidikandalangan', [DalanganController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikandalangan');

Route::get('/inputdata/agamadialangan', [DalanganController::class, 'formAgama'])->name('inputdata.agamadalangan');
Route::post('/store-agamadalangan', [DalanganController::class, 'storeAgama'])->name('storeAgamadalangan');

Route::get('/inputdata/tingkat_pendidikandalangan', [DalanganController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikandalangan');
Route::post('/store-tingkat_pendidikandalangan', [DalanganController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikandalangan');

Route::get('/inputdata/kebutuhan_airdalangan', [DalanganController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_airdalangan');
Route::post('/store-kebutuhan_airdalangan', [DalanganController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAirdalangan');

Route::get('/inputdata/aset_tanahdalangan', [DalanganController::class, 'formAsetTanah'])->name('inputdata.aset_tanahdalangan');
Route::post('/store-aset_tanahdalangan', [DalanganController::class, 'storeAsetTanah'])->name('storeAsetTanahdalangan');

//Input Data Digulan
Route::get('/inputdata/digulan', [DigulanController::class, 'formPendapatan'])->name('inputdata.digulan');
Route::post('/store-pendapatandigulan', [DigulanController::class, 'storePendapatan'])->name('storePendapatandigulan');

Route::get('/inputdata/mata_pencahariandigulan', [DigulanController::class, 'formMataPencaharian'])->name('inputdata.mata_pencahariandigulan');
Route::post('/store-mata_pencahariandigulan', [DigulanController::class, 'storeMataPencaharian'])->name('storeMataPencahariandigulan');

Route::get('/inputdata/pekerjaandigulan', [DigulanController::class, 'formPekerjaan'])->name('inputdata.pekerjaandigulan');
Route::post('/store-pekerjaandigulan', [DigulanController::class, 'storePekerjaan'])->name('storePekerjaandigulan');

Route::get('/inputdata/usiadigulan', [DigulanController::class, 'formUsia'])->name('inputdata.usiadigulan');
Route::post('/store-usiadigulan', [DigulanController::class, 'storeUsia'])->name('storeUsiadigulan');

Route::get('/inputdata/kualitas_bayidigulan', [DigulanController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayidigulan');
Route::post('/store-kualitas_bayidigulan', [DigulanController::class, 'storeKualitasBayi'])->name('storeKualitasBayidigulan');

Route::get('/inputdata/kualitas_ibuhamildigulan', [DigulanController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamildigulan');
Route::post('/store-kualitas_ibuhamildigulan', [DigulanController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamildigulan');

Route::get('/inputdata/status_balitadigulan', [DigulanController::class, 'formStatusBalita'])->name('inputdata.status_balitadigulan');
Route::post('/store-status_balitadigulan', [DigulanController::class, 'storeStatusBalita'])->name('storeStatusBalitadigulan');

Route::get('/inputdata/imunisasidigulan', [DigulanController::class, 'formImunisasi'])->name('inputdata.imunisasidigulan');
Route::post('/store-imunisasidigulan', [DigulanController::class, 'storeImunisasi'])->name('storeImunisasidigulan');

Route::get('/inputdata/rasio_guru_muriddigulan', [DigulanController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_muriddigulan');
Route::post('/store-rasio_guru_muriddigulan', [DigulanController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMuriddigulan');

Route::get('/inputdata/status_pendidikandigulan', [DigulanController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikandigulan');
Route::post('/store-status_pendidikandigulan', [DigulanController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikandigulan');

Route::get('/inputdata/agadigulan', [DigulanController::class, 'formAgama'])->name('inputdata.agamadigulan');
Route::post('/store-agadigulan', [DigulanController::class, 'storeAgama'])->name('storeAgamadigulan');

Route::get('/inputdata/tingkat_pendidikandigulan', [DigulanController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikandigulan');
Route::post('/store-tingkat_pendidikandigulan', [DigulanController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikandigulan');

Route::get('/inputdata/kebutuhan_airdigulan', [DigulanController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_airdigulan');
Route::post('/store-kebutuhan_airdigulan', [DigulanController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAirdigulan');

Route::get('/inputdata/aset_tanahdigulan', [DigulanController::class, 'formAsetTanah'])->name('inputdata.aset_tanahdigulan');
Route::post('/store-aset_tanahdigulan', [DigulanController::class, 'storeAsetTanah'])->name('storeAsetTanahdigulan');

//Input Data Tanggulangin
Route::get('/inputdata/tanggulangin', [TanggulanginController::class, 'formPendapatan'])->name('inputdata.tanggulangin');
Route::post('/store-pendapatantantanggulangin', [TanggulanginController::class, 'storePendapatan'])->name('storePendapatantantanggulangin');

Route::get('/inputdata/mata_pencahariantanggulangin', [TanggulanginController::class, 'formMataPencaharian'])->name('inputdata.mata_pencahariantanggulangin');
Route::post('/store-mata_pencahariantanggulangin', [TanggulanginController::class, 'storeMataPencaharian'])->name('storeMataPencahariantanggulangin');

Route::get('/inputdata/pekerjaantanggulangin', [TanggulanginController::class, 'formPekerjaan'])->name('inputdata.pekerjaantanggulangin');
Route::post('/store-pekerjaantanggulangin', [TanggulanginController::class, 'storePekerjaan'])->name('storePekerjaantanggulangin');

Route::get('/inputdata/usiatanggulangin', [TanggulanginController::class, 'formUsia'])->name('inputdata.usiatanggulangin');
Route::post('/store-usiatanggulangin', [TanggulanginController::class, 'storeUsia'])->name('storeUsiatanggulangin');

Route::get('/inputdata/kualitas_bayitanggulangin', [TanggulanginController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayitanggulangin');
Route::post('/store-kualitas_bayitanggulangin', [TanggulanginController::class, 'storeKualitasBayi'])->name('storeKualitasBayitanggulangin');

Route::get('/inputdata/kualitas_ibuhamiltanggulangin', [TanggulanginController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamiltanggulangin');
Route::post('/store-kualitas_ibuhamiltanggulangin', [TanggulanginController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamiltanggulangin');

Route::get('/inputdata/status_balitatanggulangin', [TanggulanginController::class, 'formStatusBalita'])->name('inputdata.status_balitatanggulangin');
Route::post('/store-status_balitatanggulangin', [TanggulanginController::class, 'storeStatusBalita'])->name('storeStatusBalitatanggulangin');

Route::get('/inputdata/imunisasitanggulangin', [TanggulanginController::class, 'formImunisasi'])->name('inputdata.imunisasitanggulangin');
Route::post('/store-imunisasitanggulangin', [TanggulanginController::class, 'storeImunisasi'])->name('storeImunisasitanggulangin');

Route::get('/inputdata/rasio_guru_muridtanggulangin', [TanggulanginController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_muridtanggulangin');
Route::post('/store-rasio_guru_muridtanggulangin', [TanggulanginController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMuridtanggulangin');

Route::get('/inputdata/status_pendidikantanggulangin', [TanggulanginController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikantanggulangin');
Route::post('/store-status_pendidikantanggulangin', [TanggulanginController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikantanggulangin');

Route::get('/inputdata/agamatanggulangin', [TanggulanginController::class, 'formAgama'])->name('inputdata.agamatanggulangin');
Route::post('/store-agamatanggulangin', [TanggulanginController::class, 'storeAgama'])->name('storeAgamatanggulangin');

Route::get('/inputdata/tingkat_pendidikantanggulangin', [TanggulanginController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikantanggulangin');
Route::post('/store-tingkat_pendidikantanggulangin', [TanggulanginController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikantanggulangin');

Route::get('/inputdata/kebutuhan_airtanggulangin', [TanggulanginController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_airtanggulangin');
Route::post('/store-kebutuhan_airtanggulangin', [TanggulanginController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAirtanggulangin');

Route::get('/inputdata/aset_tanahtanggulangin', [TanggulanginController::class, 'formAsetTanah'])->name('inputdata.aset_tanahtanggulangin');
Route::post('/store-aset_tanahtanggulangin', [TanggulanginController::class, 'storeAsetTanah'])->name('storeAsetTanahtanggulangin');

//Input Data Wonolobo
Route::get('/inputdata/wonolobo', [WonoloboController::class, 'formPendapatan'])->name('inputdata.wonolobo');
Route::post('/store-pendapatan', [WonoloboController::class, 'storePendapatan'])->name('storePendapatan');

Route::get('/inputdata/mata_pencaharian', [WonoloboController::class, 'formMataPencaharian'])->name('inputdata.mata_pencaharian');
Route::post('/store-mata_pencaharian', [WonoloboController::class, 'storeMataPencaharian'])->name('storeMataPencaharian');

Route::get('/inputdata/pekerjaan', [WonoloboController::class, 'formPekerjaan'])->name('inputdata.pekerjaan');
Route::post('/store-pekerjaan', [WonoloboController::class, 'storePekerjaan'])->name('storePekerjaan');

Route::get('/inputdata/usia', [WonoloboController::class, 'formUsia'])->name('inputdata.usia');
Route::post('/store-usia', [WonoloboController::class, 'storeUsia'])->name('storeUsia');

Route::get('/inputdata/kualitas_bayi', [WonoloboController::class, 'formKualitasBayi'])->name('inputdata.kualitas_bayi');
Route::post('/store-kualitas_bayi', [WonoloboController::class, 'storeKualitasBayi'])->name('storeKualitasBayi');

Route::get('/inputdata/kualitas_ibuhamil', [WonoloboController::class, 'formKualitasIbuHamil'])->name('inputdata.kualitas_ibuhamil');
Route::post('/store-kualitas_ibuhamil', [WonoloboController::class, 'storeKualitasIbuHamil'])->name('storeKualitasIbuHamil');

Route::get('/inputdata/status_balita', [WonoloboController::class, 'formStatusBalita'])->name('inputdata.status_balita');
Route::post('/store-status_balita', [WonoloboController::class, 'storeStatusBalita'])->name('storeStatusBalita');

Route::get('/inputdata/imunisasi', [WonoloboController::class, 'formImunisasi'])->name('inputdata.imunisasi');
Route::post('/store-imunisasi', [WonoloboController::class, 'storeImunisasi'])->name('storeImunisasi');

Route::get('/inputdata/rasio_guru_murid', [WonoloboController::class, 'formRasioGuruMurid'])->name('inputdata.rasio_guru_murid');
Route::post('/store-rasio_guru_murid', [WonoloboController::class, 'storeRasioGuruMurid'])->name('storeRasioGuruMurid');

Route::get('/inputdata/status_pendidikan', [WonoloboController::class, 'formStatusPendidikan'])->name('inputdata.status_pendidikan');
Route::post('/store-status_pendidikan', [WonoloboController::class, 'storeStatusPendidikan'])->name('storeStatusPendidikan');

Route::get('/inputdata/agama', [WonoloboController::class, 'formAgama'])->name('inputdata.agama');
Route::post('/store-agama', [WonoloboController::class, 'storeAgama'])->name('storeAgama');

Route::get('/inputdata/tingkat_pendidikan', [WonoloboController::class, 'formTingkatPendidikan'])->name('inputdata.tingkat_pendidikan');
Route::post('/store-tingkat_pendidikan', [WonoloboController::class, 'storeTingkatPendidikan'])->name('storeTingkatPendidikan');

Route::get('/inputdata/kebutuhan_air', [WonoloboController::class, 'formKebutuhanAir'])->name('inputdata.kebutuhan_air');
Route::post('/store-kebutuhan_air', [WonoloboController::class, 'storeKebutuhanAir'])->name('storeKebutuhanAir');

Route::get('/inputdata/aset_tanah', [WonoloboController::class, 'formAsetTanah'])->name('inputdata.aset_tanah');
Route::post('/store-aset_tanah', [WonoloboController::class, 'storeAsetTanah'])->name('storeAsetTanah');