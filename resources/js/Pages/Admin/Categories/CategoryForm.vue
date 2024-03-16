<script>
import FormCRUD from "@/Components/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute', 'category'],
    components: {FormCRUD, Dashboard},
    data() {
        return {
            form: useForm({
                id: this.category ? this.category.id : null,
                name: this.category ? this.category.name : null,
            }),
            successMessage: 'Categoria salva com sucesso!'
        }
    },
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :formRoute="formRoute" :successMessage="successMessage">
            <div class="col-xl-3 col-12">
                <div class="form-group p-3">
                    <label class="form-label" for="name">Nome</label>
                    <input class="form-control" type="text" id="name" v-model="form.name">
                    <div class="my-3 text-danger" v-if="form.errors">{{ form.errors.name }}</div>
                </div>
            </div>
        </FormCRUD>
    </Dashboard>

</template>

