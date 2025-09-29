<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;
    protected $table = 'surat_kategori';
    protected $fillable = ['nama', 'keterangan'];

    public $timestamps = false;

    public function relasi_arsip()
    {
        return $this->hasMany(Arsip::class, 'kategori');
    }
}
