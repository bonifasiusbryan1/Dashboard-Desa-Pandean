<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RasioGuruMurid extends Model
{
    use HasFactory;
    protected $table = 'rasio_gurumurid';
    protected $fillable = [
        'tingkat_pendidikan',
        'jumlah_guru',
        'jumlah_murid',
        'id_tahun',
        'id_dusun',
    ];

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'id_tahun');
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'id_dusun');
    }
}
