<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "TrashIcon",
    props: ['model', 'formRoute'],
    data() {
        return {
            form: useForm(this.model)
        }
    },
    methods: {
        destroyModel() {
            const vue = this;

            this.$swal.fire({
                title : 'Confirmar Exclusão',
                text: 'Tem certeza que deseja excluir o registro?',
                showDenyButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: 'Não'
            }).then( alert => {
                if (alert.isConfirmed) {
                    vue.form.post(vue.formRoute)
                }
            });

        }
    }
}
</script>

<template>
    <i @click.prevent="destroyModel" title="Deletar" class="bi bi-trash3 text-danger mx-3 fs-4"></i>
</template>

