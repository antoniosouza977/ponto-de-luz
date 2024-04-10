<script>
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {useForm} from "@inertiajs/vue3";
import InputErrorFeedback from "@/Components/Admin/CRUD/InputErrorFeedback.vue";

export default {
    name: "CategoryForm",
    props: ['action', 'formRoute', 'type'],
    components: {InputErrorFeedback, FormCRUD, Dashboard},
    data() {
        return {
            form: useForm({
                id: this.type ? this.type.id : null,
                name: this.type ? this.type.name : null,
                active: this.type ? this.type.active : 1,
            }),
            activeOptions: [
                {
                    label: 'Ativo',
                    value: 1
                },
                {
                    label: 'Inativo',
                    value: 0
                }
            ],
            successMessage: 'Tipo de Produto salvo com sucesso!'
        }
    },
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :formRoute="formRoute" :successMessage="successMessage">
            <div class="flex flex-wrap border rounded-lg border-green-200 bg-white">

                <div class="w-full p-3 font-bold">Dados do Tipo de Produto</div>

                <div class="lg:w-1/3 md:w-1/2 w-full flex flex-col p-3">
                    <label class="font-medium" for="name">Nome do Tipo de Produto</label>
                    <InputText id="name" v-model="form.name" class="mt-3" :invalid="Boolean(form.errors.name)"/>
                    <InputErrorFeedback :error="form.errors.name"/>
                </div>

                <div class="lg:w-1/3 md:w-1/2 w-full p-3">
                    <label class="font-medium" for="active">Status</label>
                    <Dropdown
                        v-model="form.active"
                        inputId="active"
                        class="w-full my-3"
                        :options="activeOptions"
                        optionLabel="label"
                        optionValue="value"
                        :invalid="Boolean(form.errors.active)"/>
                    <InputErrorFeedback :error="form.errors.active"/>
                </div>
            </div>
        </FormCRUD>
    </Dashboard>

</template>

