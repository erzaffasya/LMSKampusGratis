<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenDokumen extends Model
{
    use HasFactory;
    protected $table = 'konten_dokumen';
    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'bab',
    ];

    protected $primaryKey = 'id';


    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }
}
