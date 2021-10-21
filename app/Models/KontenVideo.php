<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenVideo extends Model
{
    use HasFactory;
    protected $table = 'konten_video';
    protected $fillable = [
        'judul',
        'deskripsi',
        'link',
        'bab',
        'kelas_id'
    ];

    protected $primaryKey = 'id';


    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }
}

