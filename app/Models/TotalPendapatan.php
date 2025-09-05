<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalPendapatan extends Model
{
    use HasFactory;
    protected $table = 'total_pendapatan';
    protected $fillable = [
        'jumlah',
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