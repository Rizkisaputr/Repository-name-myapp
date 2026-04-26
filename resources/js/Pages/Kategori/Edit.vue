<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    kategori: Object,
});

const form = useForm({
    nama_kategori: props.kategori.nama_kategori,
    deskripsi: props.kategori.deskripsi ?? "",
    is_active: Boolean(props.kategori.is_active),
});

const submit = () => {
    form.put(`/kategori/${props.kategori.id}`);
};
</script>

<template>
    <div class="min-h-screen bg-slate-100 p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">Edit Kategori</h1>
            <p class="text-sm text-slate-500">
                Perbarui data kategori latihan soal.
            </p>
        </div>

        <div
            class="max-w-2xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm"
        >
            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label
                        class="mb-1 block text-sm font-semibold text-slate-700"
                    >
                        Nama Kategori
                    </label>
                    <input
                        v-model="form.nama_kategori"
                        type="text"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2"
                    />
                    <div
                        v-if="form.errors.nama_kategori"
                        class="mt-1 text-sm text-red-600"
                    >
                        {{ form.errors.nama_kategori }}
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
                        href="/kategori"
                        class="rounded-lg bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-300"
                    >
                        Kembali
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>
