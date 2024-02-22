<template>
    <div class="grid grid-cols-5 min-h-screen">
        <Sidebar />
        <div class="col-span-4">
            <Header />
            <div class="p-4"></div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from "../Components/Sidebar.vue";
import Header from "../Components/Header.vue";
</script>
