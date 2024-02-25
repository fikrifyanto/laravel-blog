<template>
    <div class="grid grid-cols-5 min-h-screen bg-slate">
        <Sidebar />
        <Header>
            <slot />
        </Header>
        <Popup />
    </div>
</template>

<script setup>
import Sidebar from "../Sections/Admin/Sidebar.vue";
import Header from "../Sections/Admin/Header.vue";
import Popup from "../Components/Popup.vue";
</script>
