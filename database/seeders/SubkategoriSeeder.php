<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubkategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = Kategori::first();

        if (!$kategori) {
            echo "Kategori masih kosong. Jalankan KategoriSeeder dulu.";
            return;
        }

        $data = [
            'Tes Wawasan Kebangsaan',
            'Tes Intelegensia Umum',
            'Tes Karakteristik Pribadi',
            'Penalaran Umum',
            'Pengetahuan Kuantitatif',
            'Literasi Bahasa Indonesia',
            'Literasi Bahasa Inggris',
            'Matematika Dasar',
            'Kemampuan Verbal',
            'Kemampuan Numerik',
            'Kemampuan Logika',
            'Psikotes Kepribadian',
            'Tes Potensi Akademik',
            'Grammar Practice',
            'Reading Comprehension',
            'Listening Practice',
            'Vocabulary Building',
            'Analogi Verbal',
            'Deret Angka',
            'Simulasi Tryout',
        ];

        foreach ($data as $nama) {
            Subkategori::updateOrCreate(
                [
                    'kategori_id' => $kategori->id,
                    'slug' => Str::slug($nama),
                ],
                [
                    'nama_subkategori' => $nama,
                    'deskripsi' => 'Latihan soal ' . $nama . ' untuk kategori ' . $kategori->nama_kategori . '.',
                    'is_active' => true,
                ]
            );
        }
    }
}