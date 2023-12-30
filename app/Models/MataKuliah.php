<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_matkul';
    public $incrementing = false;

    protected $fillable = ['kode_matkul', 'nama', 'semester', 'sks', 'dosen_pengampu'];
    // protected $fillable = ['kode_matkul', 'nama', 'semester', 'sks', 'dosen_pengampu', 'created_at', 'updated_at' ];

    public function jadwalKuliah()
    {
        return $this->hasMany(JadwalKuliah::class, 'kode_matkul', 'kode_matkul');
    }

    // Relasi ke tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'kode_matkul', 'kode_matkul');
}
}
