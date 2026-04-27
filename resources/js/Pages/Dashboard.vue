<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard Admin Zlate " />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard Admin Zlate
            </h2>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <Link
                        href="/kategori"
                        class="rounded-xl bg-white p-5 shadow hover:shadow-md"
                    >
                        <h3 class="text-lg font-bold">Kategori</h3>
                        <p class="text-sm text-gray-500">
                            Kelola data kategori
                        </p>
                    </Link>
                    <Link
                        href="/subkategori"
                        class="rounded-xl bg-white p-5 shadow hover:shadow-md"
                    >
                        <h3 class="text-lg font-bold">Subkategori</h3>
                        <p class="text-sm text-gray-500">
                            Kelola data subkategori
                        </p>
                    </Link>
                    <Link
                        href="/item"
                        class="rounded-xl bg-white p-5 shadow hover:shadow-md"
                    >
                        <h3 class="text-lg font-bold">Item</h3>
                        <p class="text-sm text-gray-500">Kelola data item</p>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
