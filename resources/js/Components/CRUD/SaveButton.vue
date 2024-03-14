<script>


export default {
    name: "SaveButton",
    props: ['form', 'formRoute', 'message'],
    methods: {
        async submitForm() {
            await this.form.post(this.formRoute, this.form)

        }
    }
}
</script>

<template>
    <button @click.prevent="submitForm" class="btn btn-primary">
        Salvar
    </button>
</template>

