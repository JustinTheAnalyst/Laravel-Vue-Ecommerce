<template>
    <div class="flex min-h-full bg-gray-200">
        <!-- Sidebar -->
        <Sidebar :class="{ '-ml-[200px]': !sidebarOpened }" />

        <div class="flex-1">
            <!-- Top Header -->
            <NavBar @toggle-sidebar="toggleSidebar" />

            <!-- Content -->
            <main class="p-6">
                <router-view></router-view>
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import NavBar from "./NavBar.vue";
import Sidebar from "./Sidebar.vue";

const { title } = defineProps({
    title: String,
});

const sidebarOpened = ref(true);

function toggleSidebar() {
    sidebarOpened.value = !sidebarOpened.value;
}

onMounted(() => {
    handleSidebarOpened();
    window.addEventListener("resize", handleSidebarOpened);
});

onUnmounted(() => {
    window.removeEventListener("resize", handleSidebarOpened);
});

function handleSidebarOpened() {
    sidebarOpened.value = window.outerWidth > 768 ? true : false;
}
</script>
