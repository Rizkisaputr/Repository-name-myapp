<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Item;

class Subkategori extends Model
{
    use HasFactory;

    protected $table = 'subkategori';

    protected $fillable = [
        'kategori_id',
        'nama_subkategori',
        'slug',
        'deskripsi',
        'is_active',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}