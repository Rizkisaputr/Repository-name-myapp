<?php

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Kategori::class)
                ->constrained('kategori')
                ->cascadeOnDelete();

            $table->foreignIdFor(Subkategori::class)
                ->constrained('subkategori')
                ->cascadeOnDelete();

            $table->string('nama_item');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->integer('durasi_menit')->default(0);
            $table->integer('jumlah_soal')->default(0);
            $table->decimal('harga', 15, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};