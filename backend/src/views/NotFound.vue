<template>
    <div class="flex justify-center items-center min-h-full w-full">
        <div class="flex">
            <div class="text-indigo-600 text-7xl px-8 font-bold border-r">
                404
            </div>
            <div class="px-8">
                <h1 class="text-5xl font-bold mb-2">Page Not Found</h1>
                <p class="text-gray-600 mb-8">
                    Sorry, we couldn't find the page you're looking for.
                </p>
                <div>
                    <router-link
                        :to="{ name: 'app.dashboard' }"
                        class="rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Go back home
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup></script>

<style></style>
