<script>
import {useForm} from "@inertiajs/vue3";
export default {
    name: "LogoutButton",
    data() {
        return {
            form: useForm({})
        }
    },
    methods: {
        logout() {
            this.form.post(route('logout'))
        }
    }
}
</script>

<template>
    <a @click.prevent="logout" class="dropdown-item" href="#">Logout</a>
</template>
