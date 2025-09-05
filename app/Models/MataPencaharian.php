<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPencaharian extends Model
{
    use HasFactory;
    protected $table = 'mata_pencaharian';
    protected $fillable = [
        'perorangan',
        'usaha',
        'buruh',
        'jumlah',
        'id_tahun',
        'id_dusun',
        'id_sektor',
    ];

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'id_tahun');
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'id_dusun');
    }

    public function jenisSektor()
    {
        return $this->belongsTo(JenisSektor::class, 'id_sektor');
    }
}