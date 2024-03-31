<script>
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute', 'type'],
    components: {FormCRUD, Dashboard},
    data() {
        return {
            form: useForm({
                id: this.type ? this.type.id : null,
                name: this.type ? this.type.name : null,
                active: this.type ? this.type.active : 1,
            }),
            successMessage: 'Tipo de Produto salvo com sucesso!'
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
                        <label class="form-label" for="active">Ativo</label>
                        <select class="form-select" type="text" id="active" v-model="form.active">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <div class="my-3 text-danger" v-if="form.errors">{{ form.errors.active }}</div>
                    </div>
                </div>
            </div>
        </FormCRUD>
    </Dashboard>

</template>

