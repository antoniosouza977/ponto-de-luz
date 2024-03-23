<script>
import { useToast } from "vue-toastification";

export default {
    name: "FormCRUD",
    props: ['action', 'form', 'formRoute', 'successMessage'],
    data() {
        return {
            toast : useToast()
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
    <div class="col-xxl-9 col-12">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ action }}</h6>
            </div>

            <div class="card-body">
                <form enctype="multipart/form-data">
                    <slot></slot>
                </form>
            </div>

            <div class="card-footer d-flex" style="height: 63px">
                <div class="d-flex w-100 justify-content-end">
                    <button @click.prevent="submitForm" :disabled="form.processing"
                            class="btn btn-primary">
                        Salvar
                    </button>
                </div>
            </div>

        </div>
    </div>
</template>


