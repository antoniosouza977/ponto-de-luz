<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "EditButton",
    props: ['editRoute', 'btn'],
    components: {Link}
}
</script>

<template>
    <Link  :href="editRoute">
        <Button v-if="btn" label="Editar" severity="warning" rounded class="mx-3" />
        <Button v-else icon="pi pi-pencil" title="Editar" severity="warning" rounded aria-label="Editar" />
    </Link>
</template>

<style scoped>

</style>
