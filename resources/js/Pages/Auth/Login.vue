<template>
    <section class="h-screen">
        <div class="container h-full px-6 py-24">
            <div
                class="flex h-full flex-wrap items-center justify-center lg:justify-between">
                <!-- Left column container with background-->
                <div class="mb-12 md:w-8/12 lg:w-6/12">
                    <img
                        src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full"
                        alt="Phone image"/>
                </div>

                <!-- Right column container with form -->
                <div class="md:w-8/12 lg:ms-6 lg:w-5/12 border p-6 rounded-lg">
                    <!-- Email input -->
                    <div class="relative p-3 mb-6">
                        <FloatLabel>
                            <InputText class="w-full" type="email" id="email" v-model="form.email"/>
                            <label for="email">E-mail</label>
                        </FloatLabel>
                    </div>

                    <!-- Password input -->
                    <div class="relative p-3 mb-6">
                        <FloatLabel>
                            <Password size="large"  id="password" v-model="form.password" toggleMask
                                      :feedback="false"/>
                            <label for="password">Senha</label>
                        </FloatLabel>
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem] flex items-center">
                            <InputSwitch v-model="form.remember" />
                            <label
                                class="ml-1 inline-block ps-[0.15rem] hover:cursor-pointer"
                                for="exampleCheck3">
                                Lembrar de mim
                            </label>
                        </div>

                        <!-- Forgot password link -->
<!--                        <a-->
<!--                            href="#!"-->
<!--                            class="text-primary focus:outline-none dark:text-primary-400"-->
<!--                        >Forgot password?</a-->
<!--                        >-->
                    </div>

                    <!-- Submit button -->
                    <Button
                        @click.prevent="login"
                        class="inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        Logar
                    </Button>

                    <!-- Divider -->
                    <div
                        class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                        <p
                            class="mx-4 mb-0 text-center font-semibold dark:text-neutral-200">
                            OR
                        </p>
                    </div>

                    <!-- Social login buttons -->
                    <a
                        class="mb-3 flex w-full items-center justify-center rounded bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        style="background-color: #3b5998"
                        href="#!"
                        role="button"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        <!-- Facebook -->
                        <span
                            class="me-2 fill-white [&>svg]:mx-auto [&>svg]:h-3.5 [&>svg]:w-3.5">
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 320 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                    d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
              </svg>
            </span>
                        Continue with Facebook
                    </a>
                    <a
                        class="mb-3 flex w-full items-center justify-center rounded bg-info px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-info-3 transition duration-150 ease-in-out hover:bg-info-accent-300 hover:shadow-info-2 focus:bg-info-accent-300 focus:shadow-info-2 focus:outline-none focus:ring-0 active:bg-info-600 active:shadow-info-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        style="background-color: #55acee"
                        href="#!"
                        role="button"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        <!-- X -->
                        <span class="me-2 fill-white [&>svg]:h-3.5 [&>svg]:w-3.5">
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
              </svg>
            </span>
                        Continue with X
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import {Link} from '@inertiajs/vue3'
import {useForm} from '@inertiajs/vue3'

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

