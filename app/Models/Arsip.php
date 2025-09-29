<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $table = 'surat_arsip';
    protected $fillable = ['nomor_surat', 'kategori', 'judul', 'pdf', 'created_at'];

    public $timestamps = false;

    public function relasi_kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori');
    }
}
