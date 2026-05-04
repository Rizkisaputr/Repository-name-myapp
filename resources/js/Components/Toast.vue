<script setup>
import { ref, watch } from "vue";

const props = defineProps({
    message: {
        type: String,
        default: "",
    },
    type: {
        type: String,
        default: "success",
    },
});

const show = ref(false);

watch(
    () => props.message,
    (value) => {
        if (value) {
            show.value = true;

            setTimeout(() => {
                show.value = false;
            }, 3000);
        }
    },
    { immediate: true },
);

const typeClass = {
    success: "border-green-200 bg-green-50 text-green-700",
    error: "border-red-200 bg-red-50 text-red-700",
};

const dotClass = {
    success: "bg-green-500",
    error: "bg-red-500",
};
</script>

<template>
    <div class="pointer-events-none fixed right-5 top-5 z-50 w-full max-w-sm">
        <Transition name="toast">
            <div
                v-if="show && message"
                class="pointer-events-auto rounded-xl border p-4 shadow-lg"
                :class="typeClass[type]"
            >
                <div class="flex items-start gap-3">
                    <div
                        class="mt-1.5 h-2.5 w-2.5 rounded-full"
                        :class="dotClass[type]"
                    ></div>

                    <div class="flex-1">
                        <div class="text-sm font-bold">
                            {{ type === "success" ? "Berhasil" : "Gagal" }}
                        </div>
                        <div class="mt-1 text-sm">
                            {{ message }}
                        </div>
                    </div>

                    <button
                        type="button"
                        @click="show = false"
                        class="text-xl leading-none opacity-60 hover:opacity-100"
                    >
                        ×
                    </button>
                </div>
            </div>
        </Transition>
    </div>
</template>

<style scoped>
.toast-enter-active,
.toast-leave-active {
    transition: all 0.25s ease;
}

.toast-enter-from,
.toast-leave-to {
    opacity: 0;
    transform: translateX(20px);
}
</style>
