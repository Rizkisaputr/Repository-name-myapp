<script setup>
import { Link, router } from "@inertiajs/vue3";

defineProps({
    item: Object,
    kategori: Object,
    subkategori: Object,
    kategori_id: [String, Number, null],
    subkategori_id: [String, Number, null],
});

const hapusItem = (id) => {
    if (confirm("Yakin ingin menghapus item ini?")) {
        router.delete(`/item/${id}`);
    }
};
</script>

<template>
    <div class="min-h-screen bg-slate-100 p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Data Item</h1>

                <p class="text-sm text-slate-500">
                    <span v-if="subkategori">
                        Item untuk subkategori
                        {{ subkategori.nama_subkategori }}.
                    </span>
                    <span v-else-if="kategori">
                        Item untuk kategori {{ kategori.nama_kategori }}.
                    </span>
                    <span v-else> Kelola item latihan soal. </span>
                </p>
            </div>

            <Link
                :href="
                    kategori_id && subkategori_id
                        ? `/item/create?kategori_id=${kategori_id}&subkategori_id=${subkategori_id}`
                        : '/item/create'
                "
                class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
            >
                + Tambah Item
            </Link>
        </div>

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
                            Kategori
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Subkategori
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Item
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Durasi
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Soal
                        </th>
                        <th
                            class="px-4 py-3 text-sm font-semibold text-slate-600"
                        >
                            Harga
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
                        v-for="(row, index) in item.data"
                        :key="row.id"
                        class="border-t border-slate-100 hover:bg-slate-50"
                    >
                        <td class="px-4 py-3 text-sm">
                            {{ (item.from ?? 1) + index }}
                        </td>

                        <td
                            class="px-4 py-3 text-sm font-semibold text-slate-700"
                        >
                            {{ row.kategori?.nama_kategori ?? "-" }}
                        </td>

                        <td
                            class="px-4 py-3 text-sm font-semibold text-slate-700"
                        >
                            {{ row.subkategori?.nama_subkategori ?? "-" }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="font-semibold text-slate-800">
                                {{ row.nama_item }}
                            </div>
                            <div class="text-sm text-slate-500">
                                {{ row.deskripsi ?? "-" }}
                            </div>
                        </td>

                        <td class="px-4 py-3 text-sm">
                            {{ row.durasi_menit }} menit
                        </td>

                        <td class="px-4 py-3 text-sm">
                            {{ row.jumlah_soal }} soal
                        </td>

                        <td class="px-4 py-3 text-sm font-semibold">
                            Rp {{ Number(row.harga).toLocaleString("id-ID") }}
                        </td>

                        <td class="px-4 py-3 text-right">
                            <Link
                                :href="`/item/${row.id}/edit?kategori_id=${row.kategori_id}&subkategori_id=${row.subkategori_id}`"
                                class="mr-2 rounded-lg bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700 hover:bg-yellow-200"
                            >
                                Edit
                            </Link>

                            <button
                                @click="hapusItem(row.id)"
                                class="rounded-lg bg-red-100 px-3 py-1 text-sm font-semibold text-red-700 hover:bg-red-200"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <tr v-if="item.data.length === 0">
                        <td
                            colspan="8"
                            class="px-4 py-6 text-center text-slate-500"
                        >
                            Belum ada data item.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div
            v-if="item.links && item.links.length > 3"
            class="mt-6 flex flex-wrap gap-2"
        >
            <Link
                v-for="link in item.links"
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
