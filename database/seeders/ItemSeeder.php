<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = Kategori::first();
        $subkategori = Subkategori::first();

        if (!$kategori || !$subkategori) {
            echo "Kategori atau Subkategori masih kosong. Jalankan seeder kategori dan subkategori dulu.";
            return;
        }

        $data = [
            [
                'nama_item' => 'Paket Latihan CPNS Dasar',
                'deskripsi' => 'Paket latihan soal CPNS untuk pemula.',
                'durasi_menit' => 90,
                'jumlah_soal' => 100,
                'harga' => 50000,
            ],
            [
                'nama_item' => 'Paket Latihan TWK',
                'deskripsi' => 'Latihan soal Tes Wawasan Kebangsaan.',
                'durasi_menit' => 60,
                'jumlah_soal' => 50,
                'harga' => 25000,
            ],
            [
                'nama_item' => 'Paket Latihan TIU',
                'deskripsi' => 'Latihan soal Tes Intelegensia Umum.',
                'durasi_menit' => 60,
                'jumlah_soal' => 50,
                'harga' => 25000,
            ],
            [
                'nama_item' => 'Paket Latihan TKP',
                'deskripsi' => 'Latihan soal Tes Karakteristik Pribadi.',
                'durasi_menit' => 60,
                'jumlah_soal' => 50,
                'harga' => 25000,
            ],
            [
                'nama_item' => 'Paket Tryout UTBK',
                'deskripsi' => 'Paket tryout UTBK lengkap.',
                'durasi_menit' => 120,
                'jumlah_soal' => 120,
                'harga' => 75000,
            ],
            [
                'nama_item' => 'Paket Penalaran Umum',
                'deskripsi' => 'Latihan soal penalaran umum untuk UTBK dan SNBT.',
                'durasi_menit' => 60,
                'jumlah_soal' => 40,
                'harga' => 30000,
            ],
            [
                'nama_item' => 'Paket Pengetahuan Kuantitatif',
                'deskripsi' => 'Latihan soal kuantitatif dan numerik.',
                'durasi_menit' => 60,
                'jumlah_soal' => 40,
                'harga' => 30000,
            ],
            [
                'nama_item' => 'Paket Literasi Bahasa Indonesia',
                'deskripsi' => 'Latihan soal literasi Bahasa Indonesia.',
                'durasi_menit' => 60,
                'jumlah_soal' => 45,
                'harga' => 30000,
            ],
            [
                'nama_item' => 'Paket Literasi Bahasa Inggris',
                'deskripsi' => 'Latihan soal literasi Bahasa Inggris.',
                'durasi_menit' => 60,
                'jumlah_soal' => 45,
                'harga' => 30000,
            ],
            [
                'nama_item' => 'Paket Matematika Dasar',
                'deskripsi' => 'Latihan soal matematika dasar untuk berbagai ujian.',
                'durasi_menit' => 60,
                'jumlah_soal' => 50,
                'harga' => 35000,
            ],
            [
                'nama_item' => 'Paket Kemampuan Verbal',
                'deskripsi' => 'Latihan soal sinonim, antonim, analogi, dan pemahaman bacaan.',
                'durasi_menit' => 60,
                'jumlah_soal' => 60,
                'harga' => 35000,
            ],
            [
                'nama_item' => 'Paket Kemampuan Numerik',
                'deskripsi' => 'Latihan soal angka, deret, perbandingan, dan aritmetika.',
                'durasi_menit' => 60,
                'jumlah_soal' => 60,
                'harga' => 35000,
            ],
            [
                'nama_item' => 'Paket Kemampuan Logika',
                'deskripsi' => 'Latihan soal logika dasar dan penalaran analitis.',
                'durasi_menit' => 60,
                'jumlah_soal' => 60,
                'harga' => 35000,
            ],
            [
                'nama_item' => 'Paket Psikotes Kepribadian',
                'deskripsi' => 'Latihan soal psikotes kepribadian untuk seleksi kerja.',
                'durasi_menit' => 75,
                'jumlah_soal' => 80,
                'harga' => 45000,
            ],
            [
                'nama_item' => 'Paket Tes Potensi Akademik',
                'deskripsi' => 'Latihan soal TPA untuk seleksi kampus, kerja, dan beasiswa.',
                'durasi_menit' => 90,
                'jumlah_soal' => 100,
                'harga' => 55000,
            ],
            [
                'nama_item' => 'Paket Grammar Practice',
                'deskripsi' => 'Latihan grammar Bahasa Inggris dari dasar sampai menengah.',
                'durasi_menit' => 60,
                'jumlah_soal' => 50,
                'harga' => 30000,
            ],
            [
                'nama_item' => 'Paket Reading Comprehension',
                'deskripsi' => 'Latihan pemahaman bacaan Bahasa Inggris.',
                'durasi_menit' => 60,
                'jumlah_soal' => 50,
                'harga' => 30000,
            ],
            [
                'nama_item' => 'Paket Listening Practice',
                'deskripsi' => 'Latihan listening Bahasa Inggris untuk persiapan TOEFL dan IELTS.',
                'durasi_menit' => 60,
                'jumlah_soal' => 40,
                'harga' => 35000,
            ],
            [
                'nama_item' => 'Paket Vocabulary Building',
                'deskripsi' => 'Latihan kosakata Bahasa Inggris untuk ujian dan tes akademik.',
                'durasi_menit' => 45,
                'jumlah_soal' => 50,
                'harga' => 25000,
            ],
            [
                'nama_item' => 'Paket Simulasi Tryout Premium',
                'deskripsi' => 'Paket simulasi tryout lengkap dengan waktu pengerjaan seperti ujian asli.',
                'durasi_menit' => 120,
                'jumlah_soal' => 150,
                'harga' => 100000,
            ],
        ];

        foreach ($data as $row) {
            Item::updateOrCreate(
                [
                    'kategori_id' => $kategori->id,
                    'subkategori_id' => $subkategori->id,
                    'slug' => Str::slug($row['nama_item']),
                ],
                [
                    'nama_item' => $row['nama_item'],
                    'deskripsi' => $row['deskripsi'],
                    'durasi_menit' => $row['durasi_menit'],
                    'jumlah_soal' => $row['jumlah_soal'],
                    'harga' => $row['harga'],
                    'is_active' => true,
                ]
            );
        }
    }
}