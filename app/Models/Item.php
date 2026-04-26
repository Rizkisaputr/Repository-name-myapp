<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $fillable = [
        'kategori_id',
        'subkategori_id',
        'nama_item',
        'slug',
        'deskripsi',
        'durasi_menit',
        'jumlah_soal',
        'harga',
        'is_active',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'subkategori_id', 'id');
    }
}