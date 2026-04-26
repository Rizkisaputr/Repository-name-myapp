<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KategoriFactory extends Factory
{
    public function definition(): array
    {
        $nama = fake('id_ID')->unique()->randomElement([
            'Tes CPNS',
            'Tes PPPK',
            'Tes UTBK',
            'Tes STAN',
            'Tes LPDP',
            'Tes Beasiswa',
            'Tes Kedinasan',
            'Tes Bahasa Inggris',
            'Tes Matematika',
            'Tes Penalaran Umum',
            'Tes Wawasan Kebangsaan',
            'Tes Intelegensia Umum',
            'Tes Karakteristik Pribadi',
            'Tes Skolastik',
            'Tes Akademik',
        ]);

        return [
            'nama_kategori' => $nama,
            'slug' => Str::slug($nama),
            'deskripsi' => fake('id_ID')->sentence(),
            'is_active' => fake('id_ID')->boolean(90),
        ];
    }
}