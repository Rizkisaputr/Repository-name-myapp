<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    admin: Object,
});

const form = useForm({
    name: props.admin.name ?? "",
    email: props.admin.email ?? "",
    password: "",
    jenis_kelamin: props.admin.jenis_kelamin ?? "",
    no_telepon: props.admin.no_telepon ?? "",
    alamat: props.admin.alamat ?? "",
});

const submit = () => {
    form.put(`/admins/${props.admin.id}`);
};
</script>

<template>
    <div class="page">
        <div class="form-card">
            <div class="form-header">
                <h1>Edit Admin</h1>
                <p>Perbarui data admin.</p>
            </div>

            <form @submit.prevent="submit" class="form-grid">
                <div class="form-group">
                    <label>Name</label>
                    <input v-model="form.name" type="text" class="input" />
                    <div class="error">{{ form.errors.name }}</div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input v-model="form.email" type="email" class="input" />
                    <div class="error">{{ form.errors.email }}</div>
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input
                        v-model="form.password"
                        type="password"
                        class="input"
                    />
                    <div class="error">{{ form.errors.password }}</div>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select v-model="form.jenis_kelamin" class="input">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <div class="error">{{ form.errors.jenis_kelamin }}</div>
                </div>

                <div class="form-group">
                    <label>No Telepon</label>
                    <input
                        v-model="form.no_telepon"
                        type="text"
                        class="input"
                    />
                    <div class="error">{{ form.errors.no_telepon }}</div>
                </div>

                <div class="form-group form-group-full">
                    <label>Alamat</label>
                    <textarea
                        v-model="form.alamat"
                        class="input textarea"
                    ></textarea>
                    <div class="error">{{ form.errors.alamat }}</div>
                </div>

                <div class="form-actions">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="form.processing"
                    >
                        Update
                    </button>
                    <Link href="/admins" class="btn btn-secondary"
                        >Kembali</Link
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
.page {
    padding: 24px;
    background: #f5f7fb;
    min-height: 100vh;
}

.form-card {
    max-width: 900px;
    margin: 0 auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    padding: 24px;
}

.form-header h1 {
    margin: 0;
    font-size: 28px;
    color: #1f2937;
}

.form-header p {
    margin: 8px 0 20px;
    color: #6b7280;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group-full {
    grid-column: 1 / -1;
}

label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #374151;
}

.input {
    border: 1px solid #d1d5db;
    border-radius: 12px;
    padding: 12px 14px;
    font-size: 14px;
    outline: none;
}

.input:focus {
    border-color: #2563eb;
}

.textarea {
    min-height: 110px;
    resize: vertical;
}

.error {
    color: #dc2626;
    font-size: 13px;
    margin-top: 6px;
    min-height: 18px;
}

.form-actions {
    grid-column: 1 / -1;
    display: flex;
    gap: 10px;
    margin-top: 8px;
}

.btn {
    display: inline-block;
    padding: 10px 16px;
    border-radius: 10px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary {
    background: #2563eb;
    color: white;
}

.btn-secondary {
    background: #e5e7eb;
    color: #111827;
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>
