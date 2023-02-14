<template>
    <div class="flex min-h-full">
        <!-- Sidebar -->
        <Sidebar />

        <div class="flex-1">
            <header class="h-8 shadow bg-white">
                Header
            </header>

            <!-- Content -->
            <main>
                <router-view></router-view>
            </main>
        </div>
    </div>
</template>

<script setup>
    import Sidebar from "./Sidebar.vue";

    const {title} = defineProps({
        title: String
    })
</script>