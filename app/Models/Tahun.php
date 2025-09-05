<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    protected $table = 'tahun';
    protected $fillable = ['tahun'];

    public function pendapatanPerkapita()
    {
        return $this->hasMany(PendapatanPerkapita::class, 'id_tahun');
    }

    public function mataPencaharian()
    {
        return $this->hasMany(MataPencaharian::class, 'id_tahun');
    }

    public function totalPendapatan()
    {
        return $this->hasMany(TotalPendapatan::class, 'id_tahun');
    }

    public function asetTanah()
    {
        return $this->hasMany(AsetTanah::class, 'id_tahun');
    }

    public function tingkatPendidikan()
    {
        return $this->hasMany(TingkatPendidikan::class, 'id_tahun');
    }

    public function wajibBelajar()
    {
        return $this->hasMany(WajibBelajar::class, 'id_tahun');
    }

    public function rasioGuruMurid()
    {
        return $this->hasMany(RasioGuruMurid::class, 'id_tahun');
    }

    public function kualitasIbuHamil()
    {
        return $this->hasMany(KualitasIbuHamil::class, 'id_tahun');
    }

    public function imunisasi()
    {
        return $this->hasMany(Imunisasi::class, 'id_tahun');
    }

    public function kualitasBayi()
    {
        return $this->hasMany(KualitasBayi::class, 'id_tahun');
    }

    public function kebutuhanAir()
    {
        return $this->hasMany(KebutuhanAir::class, 'id_tahun');
    }

    public function statusBalita()
    {
        return $this->hasMany(StatusBalita::class, 'id_tahun');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'id_tahun');
    }

    public function usia()
    {
        return $this->hasMany(Usia::class, 'id_tahun');
    }

    public function agama()
    {
        return $this->hasMany(Agama::class, 'id_tahun');
    }
}