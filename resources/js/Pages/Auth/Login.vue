<template>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="/images/login.png"
                         class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 border rounded p-3 shadow-sm">
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4" style="height: 112px;">
                            <label class="form-label" for="email" >Email</label>
                            <input type="email" id="email" class="form-control form-control-lg" v-model="form.email" />
                            <div class="text-danger mt-2" v-if="form.errors.email">{{form.errors.email}}</div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4" style="height: 112px;">
                            <label class="form-label" for="email" >Senha</label>
                            <input type="password" id="email" class="form-control form-control-lg" v-model="form.password"/>
                            <div class="text-danger mt-2" v-if="form.errors.password">{{form.errors.password}}</div>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember" v-model="form.remember"/>
                                <label class="form-check-label" for="remember"> Lembre de mim </label>
                            </div>
                            <a href="#!">Esqueceu a senha?</a>
                        </div>

                        <!-- Submit button -->
                        <button @click.prevent="login" class="btn btn-primary btn-lg btn-block">Logar</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

export default {
    components: {
        Link
    },
    data() {
        return {
            form: useForm({
                email: null,
                password: null,
                remember: false
            })
        }
    },
    methods: {
        login() {
            this.form.post(route('login.post'))
        }
    }
}
</script>

