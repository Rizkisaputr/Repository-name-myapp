<script setup>
import { Link, router } from "@inertiajs/vue3";

defineProps({
    kategori: Object,
});

const hapusKategori = (id) => {
    if (confirm("Yakin ingin menghapus kategori ini?")) {
        router.delete(`/kategori/${id}`);
    }
};
</script>

<template>
    <div class="min-h-screen bg-slate-100 p-6">
        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Data Kategori</h1>
                <p class="text-sm text-slate-500">
                    Kelola kategori latihan soal.
                </p>
            </div>

            <Link
                href="/kategori/create"
                class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
            >
                + Tambah Kategori
            </Link>
        </div>

        <!-- TABLE -->
        <div
            class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm"
        >
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            No
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Nama Kategori
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Deskripsi
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Status
                        </th>
                        <th
                            class="px-4 py-3 text-right text-sm font-semibold text-slate-600"
                        >
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="(row, index) in kategori.data"
                        :key="row.id"
                        class="border-t border-slate-100 hover:bg-slate-50"
                    >
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ (kategori.from ?? 1) + index }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="font-semibold text-slate-800">
                                {{ row.nama_kategori }}
                            </div>
                            <div class="text-sm text-slate-500">
                                {{ row.slug ?? "-" }}
                            </div>
                        </td>

                        <td class="px-4 py-3 text-sm text-slate-600">
                            {{ row.deskripsi ?? "-" }}
                        </td>

                        <td class="px-4 py-3">
                            <span
                                v-if="row.is_active"
                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700"
                            >
                                Aktif
                            </span>

                            <span
                                v-else
                                class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700"
                            >
                                Nonaktif
                            </span>
                        </td>

                        <td class="px-4 py-3 text-right">
                            <!-- DETAIL KE SUBKATEGORI BERDASARKAN KATEGORI ID -->
                            <Link
                                :href="`/subkategori?kategori_id=${row.id}`"
                                class="mr-2 rounded-lg bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700 hover:bg-blue-200"
                            >
                                Detail
                            </Link>

                            <Link
                                :href="`/kategori/${row.id}/edit`"
                                class="mr-2 rounded-lg bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700 hover:bg-yellow-200"
                            >
                                Edit
                            </Link>

                            <button
                                @click="hapusKategori(row.id)"
                                class="rounded-lg bg-red-100 px-3 py-1 text-sm font-semibold text-red-700 hover:bg-red-200"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <tr v-if="kategori.data.length === 0">
                        <td
                            colspan="5"
                            class="px-4 py-6 text-center text-slate-500"
                        >
                            Belum ada data kategori.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- PAGINATION SIMPLE -->
        <div
            v-if="kategori.links && kategori.links.length > 3"
            class="mt-6 flex flex-wrap gap-2"
        >
            <Link
                v-for="link in kategori.links"
                :key="link.label"
                :href="link.url ?? '#'"
                v-html="link.label"
                class="rounded-lg border px-3 py-2 text-sm"
                :class="[
                    link.active
                        ? 'border-blue-600 bg-blue-600 text-white'
                        : 'border-slate-200 bg-white text-slate-700 hover:bg-slate-50',
                    !link.url ? 'pointer-events-none opacity-50' : '',
                ]"
            />
        </div>
    </div>
</template>
