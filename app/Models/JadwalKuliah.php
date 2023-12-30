<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kuliah';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'kode_matkul',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
        'created_at',
    ];

    // Relasi ke mata_kuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul', 'kode_matkul');
    }
}
