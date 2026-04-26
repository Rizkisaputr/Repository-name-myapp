<script setup>
import { Link, router } from "@inertiajs/vue3";

defineProps({
    admins: Array,
});

const hapus = (id) => {
    if (confirm("Yakin hapus data ini?")) {
        router.delete(`/admins/${id}`);
    }
};
</script>

<template>
    <div class="page">
        <div class="page-header">
            <div>
                <h1 class="title">Data Admin</h1>
            </div>

            <Link href="/admins/create" class="btn btn-primary">
                + Tambah Admin
            </Link>
        </div>

        <div class="card">
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-if="admins.length === 0">
                            <td colspan="7" class="empty-state">
                                Belum ada data admin.
                            </td>
                        </tr>

                        <tr v-for="admin in admins" :key="admin.id">
                            <td>{{ admin.id }}</td>
                            <td>{{ admin.name }}</td>
                            <td>{{ admin.email }}</td>
                            <td>
                                {{
                                    admin.jenis_kelamin === "L"
                                        ? "Laki-laki"
                                        : "Perempuan"
                                }}
                            </td>
                            <td>{{ admin.no_telepon }}</td>
                            <td>{{ admin.alamat }}</td>
                            <td class="actions">
                                <Link
                                    :href="`/admins/${admin.id}/edit`"
                                    class="btn btn-warning btn-sm"
                                >
                                    Edit
                                </Link>

                                <button
                                    type="button"
                                    @click="hapus(admin.id)"
                                    class="btn btn-danger btn-sm"
                                >
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped>
.page {
    padding: 24px;
    background: #f5f7fb;
    min-height: 100vh;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.title {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    color: #1f2937;
}

.subtitle {
    margin: 6px 0 0;
    color: #6b7280;
    font-size: 14px;
}

.card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    overflow: hidden;
}

.table-wrapper {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table thead th {
    background: #f9fafb;
    color: #374151;
    text-align: left;
    padding: 14px 16px;
    font-size: 14px;
    border-bottom: 1px solid #e5e7eb;
}

.table tbody td {
    padding: 14px 16px;
    border-bottom: 1px solid #f1f5f9;
    color: #111827;
    font-size: 14px;
    vertical-align: top;
}

.table tbody tr:hover {
    background: #fafcff;
}

.text-center {
    text-align: center;
}

.actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.empty-state {
    text-align: center;
    color: #6b7280;
    padding: 24px !important;
}

.btn {
    display: inline-block;
    padding: 10px 14px;
    border-radius: 10px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
    transition: 0.2s ease;
}

.btn:hover {
    opacity: 0.92;
}

.btn-primary {
    background: #2563eb;
    color: white;
}

.btn-warning {
    background: #f59e0b;
    color: white;
}

.btn-danger {
    background: #ef4444;
    color: white;
}

.btn-sm {
    padding: 8px 12px;
    font-size: 13px;
}
</style>
