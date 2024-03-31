<script>
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute', 'category', 'types'],
    components: {FormCRUD, Dashboard},
    data() {
        return {
            form: useForm({
                id: this.category ? this.category.id : null,
                name: this.category ? this.category.name : null,
                product_type_id: this.category ? this.category.product_type_id : null,
            }),
            successMessage: 'Categoria salva com sucesso!'
        }
    },
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

                <div class="col-xl-3 col-12">
                    <div class="form-group p-3">
                        <label class="form-label" for="product_type_id">Tipo</label>
                        <select class="form-select" type="text" id="product_type_id" v-model="form.product_type_id">
                            <option v-for="type in types" :value="type.id">{{type.name}}</option>
                        </select>
                        <div class="my-3 text-danger" v-if="form.errors">{{ form.errors.product_type_id }}</div>
                    </div>
                </div>
            </div>
        </FormCRUD>
    </Dashboard>

</template>

