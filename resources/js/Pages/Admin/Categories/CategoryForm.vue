<script>
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";
import InputErrorFeedback from "@/Components/Admin/CRUD/InputErrorFeedback.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute', 'category', 'types'],
    components: {InputErrorFeedback, FormCRUD, Dashboard, Link},
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
                    <label class="font-medium" for="name">Nome da Categoria</label>
                    <InputText id="name" v-model="form.name" class="mt-3" :invalid="Boolean(form.errors.name)"/>
                    <InputErrorFeedback :error="form.errors.name"/>
                </div>

                <div class="lg:w-1/3 md:w-1/2 w-full p-3 flex items-center">
                    <div class="w-3/4">
                        <label class="font-medium" for="product_type_id">Tipo de Produto</label>
                        <Dropdown
                            v-model="form.product_type_id"
                            inputId="product_type_id"
                            class="w-full my-3"
                            :options="types"
                            optionLabel="name"
                            optionValue="id"
                            :invalid="Boolean(form.errors.product_type_id)"
                            :disabled="types.length === 0"/>
                        <InputErrorFeedback :error="form.errors.product_type_id"/>
                    </div>
                    <Link :href="route('product.types.create')">
                        <Button icon="pi pi-plus" class="ml-3" title="Novo Tipo"/>
                    </Link>
                </div>
            </div>
        </FormCRUD>
    </Dashboard>

</template>

