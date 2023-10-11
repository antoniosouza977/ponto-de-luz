<template>
    <div class="custom-container">
        <Sidebar/>
    </div>
</template>

<script>
import Sidebar from '@/Components/Admin/Sidebar.vue'

export default {
    components: {
        Sidebar
    }
}
</script>

<style scoped>
    .custom-container {
        width: 100vw;
        height: 100vh;
        padding: 0px;
        margin: 0px;
    }
</style>