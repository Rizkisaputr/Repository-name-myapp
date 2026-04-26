<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => 'CPNS',
                'deskripsi' => 'Latihan soal untuk persiapan seleksi CPNS.',
            ],
            [
                'nama_kategori' => 'PPPK',
                'deskripsi' => 'Latihan soal untuk persiapan seleksi PPPK.',
            ],
            [
                'nama_kategori' => 'UTBK',
                'deskripsi' => 'Latihan soal untuk persiapan UTBK SNBT.',
            ],
            [
                'nama_kategori' => 'STAN',
                'deskripsi' => 'Latihan soal untuk persiapan masuk STAN.',
            ],
            [
                'nama_kategori' => 'LPDP',
                'deskripsi' => 'Latihan soal untuk persiapan seleksi beasiswa LPDP.',
            ],
            [
                'nama_kategori' => 'BUMN',
                'deskripsi' => 'Latihan soal untuk persiapan seleksi BUMN.',
            ],
            [
                'nama_kategori' => 'Kedinasan',
                'deskripsi' => 'Latihan soal untuk persiapan sekolah kedinasan.',
            ],
            [
                'nama_kategori' => 'TNI POLRI',
                'deskripsi' => 'Latihan soal untuk persiapan seleksi TNI dan POLRI.',
            ],
            [
                'nama_kategori' => 'Psikotes Kerja',
                'deskripsi' => 'Latihan soal psikotes untuk seleksi kerja.',
            ],
            [
                'nama_kategori' => 'TOEFL',
                'deskripsi' => 'Latihan soal untuk meningkatkan kemampuan TOEFL.',
            ],
            [
                'nama_kategori' => 'IELTS',
                'deskripsi' => 'Latihan soal untuk persiapan tes IELTS.',
            ],
            [
                'nama_kategori' => 'SNBT',
                'deskripsi' => 'Latihan soal untuk persiapan Seleksi Nasional Berdasarkan Tes.',
            ],
            [
                'nama_kategori' => 'Ujian Sekolah',
                'deskripsi' => 'Latihan soal untuk persiapan ujian sekolah.',
            ],
            [
                'nama_kategori' => 'Ujian Nasional',
                'deskripsi' => 'Latihan soal untuk persiapan ujian nasional.',
            ],
            [
                'nama_kategori' => 'Beasiswa',
                'deskripsi' => 'Latihan soal untuk persiapan seleksi beasiswa.',
            ],
            [
                'nama_kategori' => 'Tes Potensi Akademik',
                'deskripsi' => 'Latihan soal untuk mengukur kemampuan akademik.',
            ],
            [
                'nama_kategori' => 'Tes Bahasa Inggris',
                'deskripsi' => 'Latihan soal grammar, vocabulary, reading, dan listening.',
            ],
            [
                'nama_kategori' => 'Matematika Dasar',
                'deskripsi' => 'Latihan soal matematika dasar untuk berbagai ujian.',
            ],
            [
                'nama_kategori' => 'Logika dan Penalaran',
                'deskripsi' => 'Latihan soal logika, analisis, dan penalaran umum.',
            ],
            [
                'nama_kategori' => 'Tryout Premium',
                'deskripsi' => 'Paket latihan dan simulasi tryout premium berbagai ujian.',
            ],
        ];

        foreach ($data as $item) {
            Kategori::updateOrCreate(
                ['slug' => Str::slug($item['nama_kategori'])],
                [
                    'nama_kategori' => $item['nama_kategori'],
                    'deskripsi' => $item['deskripsi'],
                    'is_active' => true,
                ]
            );
        }
    }
}