<script>
import {useToast} from "vue-toastification";
import {router} from "@inertiajs/vue3";

export default {
    name: "BackButton",
    methods: {
        bacK() {
            if (this.$page.props.previousUrl === 'empty') return useToast().warning('Pagina Anterior inválida!');
            return router.get(this.$page.props.previousUrl)
        }
    }
}
</script>

<template>
    <Button @click.prevent="bacK" icon="pi pi-arrow-left" severity="info" rounded/>
</template>

