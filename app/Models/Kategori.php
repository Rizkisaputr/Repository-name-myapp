<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'slug',
        'deskripsi',
        'is_active',
    ];

    public function subkategori()
    {
        return $this->hasMany(Subkategori::class, 'kategori_id', 'id');
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}