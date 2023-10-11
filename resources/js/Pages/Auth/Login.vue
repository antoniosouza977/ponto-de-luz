<template>
    <div class="container-fluid custom d-flex align-items-center justify-content-center">
        <form @submit.prevent="login" class="w-25 border rounded shadow-sm p-3">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input v-model="form.email" type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input v-model="form.password" type="password" name="password" id="password" class="form-control">
            </div>
            <div v-if="errors.email" class="my-1 text-danger fw-bold">
                {{ errors.email }}
            </div>
            <input type="submit" value="Logar" class="btn btn-primary">
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    props : {
        errors : Object
    },
    data() {
        return {
            form : useForm({
                email: null,
                password: null
            })
        }
    },
    methods: {
        login() {
            this.form.post(route('login.post'));
        }
    }
}
</script>

<style scoped>
    .custom {
        height: 100vh;
    }
</style>