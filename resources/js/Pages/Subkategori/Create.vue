<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    kategori: {
        type: Array,
        default: () => [],
    },
    kategori_id: {
        type: [String, Number, null],
        default: null,
    },
    selectedKategori: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    kategori_id: props.kategori_id ?? "",
    nama_subkategori: "",
    deskripsi: "",
    is_active: true,
});

const submit = () => {
    form.post("/subkategori");
};
</script>

<template>
    <div class="min-h-screen bg-slate-100 p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">
                Tambah Subkategori
            </h1>
            <p class="text-sm text-slate-500">
                Tambahkan subkategori latihan soal.
            </p>
        </div>

        <div
            class="max-w-2xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm"
        >
            <form @submit.prevent="submit" class="space-y-5">
                <!-- Jika create dari kategori tertentu -->
                <div v-if="selectedKategori">
                    <label
                        class="mb-1 block text-sm font-semibold text-slate-700"
                    >
                        Kategori
                    </label>

                    <div
                        class="rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700"
                    >
                        {{ selectedKategori.nama_kategori }}
                    </div>

                    <div
                        v-if="form.errors.kategori_id"
                        class="mt-1 text-sm text-red-600"
                    >
                        {{ form.errors.kategori_id }}
                    </div>
                </div>

                <!-- Jika create dari menu subkategori biasa -->
                <div v-else>
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

                    <div
                        v-if="form.errors.kategori_id"
                        class="mt-1 text-sm text-red-600"
                    >
                        {{ form.errors.kategori_id }}
                    </div>
                </div>

                <div>
                    <label
                        class="mb-1 block text-sm font-semibold text-slate-700"
                    >
                        Nama Subkategori
                    </label>

                    <input
                        v-model="form.nama_subkategori"
                        type="text"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2"
                        placeholder="Contoh: Tes Wawasan Kebangsaan"
                    />

                    <div
                        v-if="form.errors.nama_subkategori"
                        class="mt-1 text-sm text-red-600"
                    >
                        {{ form.errors.nama_subkategori }}
                    </div>
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
                        placeholder="Masukkan deskripsi subkategori"
                    ></textarea>

                    <div
                        v-if="form.errors.deskripsi"
                        class="mt-1 text-sm text-red-600"
                    >
                        {{ form.errors.deskripsi }}
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

                    <div
                        v-if="form.errors.is_active"
                        class="mt-1 text-sm text-red-600"
                    >
                        {{ form.errors.is_active }}
                    </div>
                </div>

                <div class="flex gap-2">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 disabled:opacity-50"
                    >
                        Simpan
                    </button>

                    <Link
                        :href="
                            form.kategori_id
                                ? `/subkategori?kategori_id=${form.kategori_id}`
                                : '/subkategori'
                        "
                        class="rounded-lg bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-300"
                    >
                        Kembali
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>
