<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
    use HasFactory;

    protected $table = 'completed_tasks';
    protected $primaryKey = 'id_completed';

    protected $fillable = [
        'id_tugas',
        'id_user',
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function Tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas', 'id_tugas');
    }
}
