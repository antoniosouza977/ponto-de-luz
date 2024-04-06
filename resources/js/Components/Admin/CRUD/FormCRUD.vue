<script>
import {useToast} from "vue-toastification";
import BackButton from "@/Components/Buttons/BackButton.vue";

export default {
    name: "FormCRUD",
    components: {BackButton},
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
                    setTimeout(() => vue.form.clearErrors(), 3000)
                },
            })

        }
    }
}
</script>

<template>

    <div class="p-6 bg-white rounded-lg">
        <div class="flex items-center justify-between bg-title rounded-t-lg p-3">
            <h6 class="m-0 font-bold text-lg">{{ action }}</h6>
            <BackButton/>
        </div>

        <div class="p-3 bg-card">
            <slot></slot>
        </div>

        <div class="flex bg-card rounded-b-lg w-full justify-end p-3">
            <Button @click.prevent="submitForm" :disabled="form.processing" label="Salvar" rounded/>
        </div>
    </div>
</template>


