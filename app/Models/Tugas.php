<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
        'prioritas',
        'selesai',
    ];

    protected $casts = [
        'deadline' => 'date',
        'selesai' => 'boolean',
    ];

    public function scopeBelumSelesai($query)
    {
        return $query->where('selesai', false);
    }
}