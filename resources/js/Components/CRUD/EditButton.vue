<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "EditButton",
    props: ['editRoute', 'btn'],
    components: {Link}
}
</script>

<template>
    <Link v-if="btn" :href="editRoute" class="btn btn-warning mx-2">
        Editar
    </Link>
    <Link v-else :href="editRoute"><i title="Editar" class="bi bi-pencil-square text-warning mx-3"></i></Link>
</template>

<style scoped>

</style>
