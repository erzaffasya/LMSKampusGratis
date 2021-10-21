<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    protected $primaryKey = 'id';

    public function get_dokumen()
    {
    	return $this->hasMany(KontenDokumen::class);
    }

    public function get_video()
    {
    	return $this->hasMany(KontenVideo::class);
    }
}
