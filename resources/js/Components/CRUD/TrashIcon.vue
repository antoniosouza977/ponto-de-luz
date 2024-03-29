<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "TrashIcon",
    props: ['model', 'formRoute', 'btn'],
    data() {
        return {
            form: useForm(this.model)
        }
    },
    methods: {
        destroyModel() {
            const vue = this;

            this.$swal.fire({
                title: 'Confirmar Exclusão',
                text: 'Tem certeza que deseja excluir o registro?',
                showDenyButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: 'Não'
            }).then(alert => {
                if (alert.isConfirmed) {
                    vue.form.post(vue.formRoute, {
                        onSuccess: (resp) => {
                            vue.form.images = {...resp}
                            vue.toast.success('Registro deletado com sucesso!')
                        }
                    })
                }
            });

        }
    }
}
</script>

<template>
    <button v-if="btn" @click.prevent="destroyModel" title="Deletar" class="btn btn-danger mx-2">
        Excluir
    </button>
    <a v-else href="#" @click.prevent="destroyModel" title="Deletar" class="bi bi-trash3 text-danger mx-3 fs-4"></a>
</template>

