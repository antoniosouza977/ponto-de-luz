<script>
import Header from "@/Components/Admin/Dashboard/Header.vue";

export default {
    name: "Dashboard",
    components: {
        Header
    },
}
</script>

<template>
    <div class="container bg-card min-h-screen min-w-full min-h-full">
        <div class="sticky top-0 z-50 px-3">
            <Header></Header>
        </div>
        <div class="p-3 relative min-h-full">
            <slot></slot>
        </div>

    </div>

</template>
