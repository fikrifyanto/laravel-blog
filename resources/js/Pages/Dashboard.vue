<template>
    <div class="grid grid-cols-5 min-h-screen">
        <Sidebar />
        <Header>
            <slot />
        </Header>
    </div>
</template>

<script setup>
import Sidebar from "../Components/Sidebar.vue";
import Header from "../Components/Header.vue";
</script>
