<script>
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";
import InputErrorFeedback from "@/Components/Admin/CRUD/InputErrorFeedback.vue";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute', 'category', 'types'],
    components: {InputErrorFeedback, FormCRUD, Dashboard},
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
            <div class="flex flex-wrap border rounded-lg border-green-200 bg-white">

                <div class="w-full p-3 font-bold">Dados da Categoria</div>

                <div class="lg:w-1/3 md:w-1/2 w-full flex flex-col p-3">
                    <label class="font-medium" for="name">Nome</label>
                    <InputText id="name" v-model="form.name" class="mt-3" :invalid="form.errors.name"/>
                    <InputErrorFeedback :error="form.errors.name" />
                </div>

                <div class="lg:w-1/3 md:w-1/2 w-full p-3">
                    <label class="font-medium" for="product_type_id">Tipo de Produto</label>
                    <Dropdown inputId="product_type_id" v-model="form.product_type_id" :options="types"
                              optionLabel="name" optionValue="id" class="w-full my-3" :invalid="form.errors.product_type_id"/>
                    <InputErrorFeedback :error="form.errors.product_type_id" />
                </div>
            </div>
        </FormCRUD>
    </Dashboard>

</template>

