<template>
    <div class="grid grid-cols-5 min-h-screen">
        <Sidebar />
        <Header>
            <slot />
        </Header>
    </div>
</template>

<script setup>
import Sidebar from "../Sections/Admin/Sidebar.vue";
import Header from "../Sections/Admin/Header.vue";
</script>
