<script setup>
import { Link, useForm } from "@inertiajs/vue3";

defineProps({
    kategori: Array,
    subkategori: Array,
});

const form = useForm({
    kategori_id: "",
    subkategori_id: "",
    nama_item: "",
    deskripsi: "",
    durasi_menit: 0,
    jumlah_soal: 0,
    harga: 0,
    is_active: true,
});

const submit = () => {
    form.post("/item");
};
</script>

<template>
    <div class="min-h-screen bg-slate-100 p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">Edit Item</h1>
            <p class="text-sm text-slate-500">
                Perbarui item paket latihan soal.
            </p>
        </div>

        <div
            class="max-w-3xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm"
        >
            <form @submit.prevent="submit" class="space-y-5">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label
                            class="mb-1 block text-sm font-semibold text-slate-700"
                        >
                            Kategori
                        </label>
                        <select
                            v-model="form.kategori_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2"
                        >
                            <option value="">Pilih kategori</option>
                            <option
                                v-for="row in kategori"
                                :key="row.id"
                                :value="row.id"
                            >
                                {{ row.nama_kategori }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="mb-1 block text-sm font-semibold text-slate-700"
                        >
                            Subkategori
                        </label>
                        <select
                            v-model="form.subkategori_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2"
                        >
                            <option value="">Pilih subkategori</option>
                            <option
                                v-for="row in subkategori"
                                :key="row.id"
                                :value="row.id"
                        </select>
                    </div>
                </div>

                <div>
                    <label
                        class="mb-1 block text-sm font-semibold text-slate-700"
                    >
                        Nama Item
                    </label>
                    <input
                        v-model="form.nama_item"
                        type="text"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2"
                    />
                </div>

                <div>
                    <label
                        class="mb-1 block text-sm font-semibold text-slate-700"
                    >
                        Deskripsi
                    </label>
                    <textarea
                        v-model="form.deskripsi"
                        rows="4"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2"
                    ></textarea>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div>
                        <label
                            class="mb-1 block text-sm font-semibold text-slate-700"
                        >
                            Durasi Menit
                        </label>
                        <input
                            v-model="form.durasi_menit"
                            type="number"
                            min="0"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2"
                        />
                    </div>

                    <div>
                        <label
                            class="mb-1 block text-sm font-semibold text-slate-700"
                        >
                            Jumlah Soal
                        </label>
                        <input
                            v-model="form.jumlah_soal"
                            type="number"
                            min="0"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2"
                        />
                    </div>

                    <div>
                        <label
                            class="mb-1 block text-sm font-semibold text-slate-700"
                        >
                            Harga
                        </label>
                        <input
                            v-model="form.harga"
                            type="number"
                            min="0"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2"
                        />
                    </div>
                </div>

                <div>
                    <label
                        class="mb-1 block text-sm font-semibold text-slate-700"
                    >
                        Status
                    </label>
                    <select
                        v-model="form.is_active"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2"
                    >
                        <option :value="true">Aktif</option>
                        <option :value="false">Nonaktif</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        Update
                    </button>

                    <Link
                        href="/item"
                        class="rounded-lg bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-300"
                    >
                        Kembali
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>
