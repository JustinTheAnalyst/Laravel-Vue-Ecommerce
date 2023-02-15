<template>
    <div class="flex min-h-full bg-gray-200">
        <!-- Sidebar -->
        <Sidebar :class="{ '-ml-[200px]': !sidebarOpened }" />

        <div class="flex-1">
            <!-- Top Header -->
            <TopHeader @toggle-sidebar="toggleSidebar" />

            <!-- Content -->
            <main class="p-6">
                <router-view></router-view>
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import Sidebar from "./Sidebar.vue";
import TopHeader from "./TopHeader.vue";

const { title } = defineProps({
    title: String,
});

const sidebarOpened = ref(true);

function toggleSidebar() {
    sidebarOpened.value = !sidebarOpened.value;
}
</script>
