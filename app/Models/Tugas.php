<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';

    protected $fillable = [
        'nama',
        'kode_matkul',
        'instruksi',
        'deadline',
    ];


    public function MataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul', 'kode_matkul');
    }
    public function Completed()
    {
        return $this->belongsTo(Completed::class, 'id_tugas', 'id_tugas');
    }
}
