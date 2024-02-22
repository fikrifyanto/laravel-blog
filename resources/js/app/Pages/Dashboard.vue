<template>
    <div class="grid grid-cols-5 min-h-screen">
        <Sidebar />
        <Header>
            <slot />
        </Header>
    </div>
</template>

<script setup>
import Sidebar from "../Components/Admin/Sidebar.vue";
import Header from "../Components/Admin/Header.vue";
</script>
