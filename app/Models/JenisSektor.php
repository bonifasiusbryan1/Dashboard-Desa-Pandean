<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSektor extends Model
{
    use HasFactory;
    protected $table = 'jenis_sektor';
    protected $fillable = ['nama_sektor'];

    public function pendapatanPerkapita()
    {
        return $this->hasMany(PendapatanPerkapita::class, 'id_sektor');
    }

    public function mataPencaharian()
    {
        return $this->hasMany(MataPencaharian::class, 'id_sektor');
    }
}