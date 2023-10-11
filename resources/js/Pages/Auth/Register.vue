<template>
    <div class="container-fluid custom d-flex align-items-center justify-content-center">
        <form @submit.prevent="register" class="border p-3 rounded shadow-sm w-25 ">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input v-model="form.name" type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input v-model="form.email" type="email" name="email" id="email" class="form-control" required>
                <div v-if="errors.user" class="text-danger mt-2">
                    {{ errors.user.message }}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Senha</label>
                <input v-model="form.password" type="password" name="password" id="password" class="form-control" required>
                <div v-if="errors" class="text-danger mt-2">
                    {{ errors.password }}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pwd-confirm">Confirmação da senha</label>
                <input type="password" id="pwd-confirm" class="form-control">
            </div>
            <input class="btn btn-primary" type="submit" value="Registrar">
        </form>
    </div>

</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    props : {
        errors : Object,
    },
    data() {
        return {
            form : useForm({
                name : null,
                email: null,
                password: null
            })
        }
    },
    methods : {
        register () {
            this.form.post(route('register.post'))
        }
    }
}
</script>

<style scoped>
.custom {
    height: 100vh;
}
</style>