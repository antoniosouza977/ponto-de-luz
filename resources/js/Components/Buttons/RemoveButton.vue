<script>
import {useForm} from "@inertiajs/vue3";
import {useToast} from "vue-toastification";

export default {
    name: "RemoveButton",
    props: ['model', 'formRoute', 'btn', 'class'],
    data() {
        return {
            toast: useToast(),
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
    <Button v-if="btn" @click.prevent="destroyModel" title="Deletar" severity="danger" rounded>
        Excluir
    </Button>
    <Button v-else @click.prevent="destroyModel" title="Deletar" severity="danger" rounded icon="pi pi-trash" :class="class"/>
</template>

