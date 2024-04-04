<script>
import {useToast} from "vue-toastification";

export default {
    name: "FormCRUD",
    props: ['action', 'form', 'formRoute', 'successMessage'],
    data() {
        return {
            toast: useToast()
        }
    },
    methods: {
        submitForm() {
            const vue = this;

            vue.form.post(this.formRoute, {
                onSuccess: () => {
                    vue.form.reset()
                    vue.toast.success(vue.successMessage)
                },
                onError: () => {
                    setTimeout(() => vue.form.clearErrors(), 2000)
                },
            })

        }
    }
}
</script>

<template>

    <div class="flex items-center justify-between bg-gray-100 rounded-t-lg p-3">
        <h6 class="m-0 font-bold text-lg">{{ action }}</h6>
    </div>

    <div class="p-3 bg-white">
        <slot></slot>
    </div>

    <div class="flex bg-gray-100 rounded-b-lg w-full justify-end p-3">
        <Button @click.prevent="submitForm" :disabled="form.processing" label="Salvar" rounded/>
    </div>
</template>


