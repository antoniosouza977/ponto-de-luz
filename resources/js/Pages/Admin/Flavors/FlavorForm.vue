<script>
import {useForm} from "@inertiajs/vue3";
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";

export default {
    name: "FlavorForm",
    components: {Dashboard, FormCRUD},
    props: ['action', 'formRoute', 'flavor'],
    data() {
        return {
            form: useForm({
                id: this.flavor ? this.flavor.id : null,
                name: this.flavor ? this.flavor.name : null
            }),
            successMessage: 'Aroma salvo com sucesso!'
        }
    }
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :formRoute="formRoute" :successMessage="successMessage">
            <div class="d-flex flex-row flex-wrap">

                <div class="col-xl-3 col-12">
                    <div class="form-group p-3">
                        <label class="form-label" for="name">Nome</label>
                        <input class="form-control" type="text" id="name" v-model="form.name">
                        <div class="my-3 text-danger" v-if="form.errors">{{ form.errors.name }}</div>
                    </div>
                </div>
            </div>
        </FormCRUD>
    </Dashboard>
</template>

