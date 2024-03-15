<script>
import FormCard from "@/Components/CRUD/FormCard.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute'],
    components: {FormCard, Dashboard},
    data() {
        return {
            form: useForm({
                name: null
            }),
            successMessage: 'Categoria salva com sucesso!'
        }
    },
}
</script>

<template>
    <Dashboard>
        <FormCard v-bind="$props" :form="form" :formRoute="formRoute" :successMessage="successMessage">
            <div class="col-xl-3 col-12">
                <div class="form-group p-3">
                    <label class="form-label" for="name">Nome</label>
                    <input class="form-control" type="text" id="name" v-model="form.name">
                    <div class="my-3 text-danger" v-if="form.errors">{{ form.errors.name }}</div>
                </div>
            </div>
        </FormCard>
    </Dashboard>

</template>

