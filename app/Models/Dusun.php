<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;
    protected $table = 'dusun';
    protected $fillable = ['nama_dusun'];

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_dusun');
    }

    public function pendapatanPerkapita()
    {
        return $this->hasMany(PendapatanPerkapita::class, 'id_dusun');
    }

    public function mataPencaharian()
    {
        return $this->hasMany(MataPencaharian::class, 'id_dusun');
    }

    public function totalPendapatan()
    {
        return $this->hasMany(TotalPendapatan::class, 'id_dusun');
    }

    public function asetTanah()
    {
        return $this->hasMany(AsetTanah::class, 'id_dusun');
    }

    public function tingkatPendidikan()
    {
        return $this->hasMany(TingkatPendidikan::class, 'id_dusun');
    }

    public function wajibBelajar()
    {
        return $this->hasMany(WajibBelajar::class, 'id_dusun');
    }

    public function rasioGuruMurid()
    {
        return $this->hasMany(RasioGuruMurid::class, 'id_dusun');
    }

    public function kualitasIbuHamil()
    {
        return $this->hasMany(KualitasIbuHamil::class, 'id_dusun');
    }

    public function imunisasi()
    {
        return $this->hasMany(Imunisasi::class, 'id_dusun');
    }

    public function kualitasBayi()
    {
        return $this->hasMany(KualitasBayi::class, 'id_dusun');
    }

    public function kebutuhanAir()
    {
        return $this->hasMany(KebutuhanAir::class, 'id_dusun');
    }

    public function statusBalita()
    {
        return $this->hasMany(StatusBalita::class, 'id_dusun');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'id_dusun');
    }

    public function usia()
    {
        return $this->hasMany(Usia::class, 'id_dusun');
    }

    public function agama()
    {
        return $this->hasMany(Agama::class, 'id_dusun');
    }
}