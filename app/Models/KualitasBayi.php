<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasBayi extends Model
{
    use HasFactory;
    protected $table = 'kualitas_bayi';
    protected $fillable = [
        'kategori', 
        'jumlah', 
        'id_tahun', 
        'id_dusun'];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'id_dusun');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'id_tahun');
    }
}
