<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import {useForm} from "@inertiajs/vue3";
import VueSelect from "vue-select";
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import DraggImageComponent from "@/Components/Admin/CRUD/Products/DraggImageComponent.vue";
import InputErrorFeedback from "@/Components/Admin/CRUD/InputErrorFeedback.vue";

export default {
    name: "ProductForm",
    components: {InputErrorFeedback, DraggImageComponent, RemoveButton, Dashboard, FormCRUD, VueSelect},
    props: ['action', 'categories', 'flavors', 'formRoute', 'product'],
    data() {
        return {
            statusOptions: [
                {label: 'Disponível', value: 'available'},
                {label: 'Promoção', value: 'promotion'},
                {label: 'Indisponível', value: 'unavailable'},
                {label: 'Sem estoque', value: 'out-of-stock'}
            ],
            form: useForm({
                id: this.product ? this.product.id : null,
                name: this.product ? this.product.name : null,
                description: this.product ? this.product.description : null,
                price: this.product ? this.product.price : null,
                stock_quantity: this.product ? this.product.stock_quantity : null,
                status: this.product ? this.product.status : 'available',
                categories_ids: this.product && this.product.categories.length ? this.product.categories.map(element => {
                    return element.id
                }) : null,
                flavors_ids: this.product && this.product.flavors.length ? this.product.flavors.map(element => {
                    return element.id
                }) : null,
                images: this.product && this.product.images ? this.product.images : []
            }),
            successMessage:
                'Produto Salvo com Sucesso!'
        }
    }
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :success-message="successMessage">
            <div class="flex flex-wrap border border-green-200 rounded mb-3 bg-white">
                <div class="w-full p-3 font-bold">Dados do Produto</div>
                <div class=" xl:w-1/2 w-full">
                    <div class="flex flex-wrap">
                        <div class="md:w-1/2 w-full p-3">
                            <label class="font-medium" for="nome">Nome do Produto</label>
                            <InputText class="w-full mt-3" id="nome" v-model="form.name"
                                       :invalid="Boolean(form.errors.name)"/>
                            <InputErrorFeedback :error="form.errors.name"/>
                        </div>

                        <div class="md:w-1/2 w-full p-3">
                            <label class="font-medium" for="price">Valor do Produto</label>
                            <InputNumber class="w-full mt-3" id="price" v-model="form.price" inputId="locale-user"
                                         :minFractionDigits="2" :invalid="Boolean(form.errors.price)"/>
                            <InputErrorFeedback :error="form.errors.price"/>
                        </div>

                        <div class="md:w-1/2 w-full p-3">
                            <label class="font-medium" for="stock">Estoque do Produto</label>
                            <InputNumber class="w-full mt-3" id="stock" v-model="form.stock_quantity"
                                         :invalid="Boolean(form.errors.stock_quantity)"/>
                            <InputErrorFeedback :error="form.errors.stock_quantity"/>
                        </div>

                        <div class="md:w-1/2 w-full p-3">
                            <label class="font-medium" for="status">Status</label>
                            <Dropdown inputId="status" v-model="form.status" :options="statusOptions"
                                      optionLabel="label" optionValue="value" class="w-full my-3"
                                      :invalid="Boolean(form.errors.status)"/>
                        </div>


                        <div class="md:w-1/2 w-full p-3">
                            <label class="font-medium">Categorias</label>
                            <MultiSelect v-model="form.categories_ids" :options="categories" filter optionLabel="name"
                                         optionValue="id" placeholder="Selecione as Categorias"
                                         :maxSelectedLabels="3" class="w-full mt-3 md:w-20rem"
                                         :invalid="Boolean(form.errors.categories_ids)"/>
                            <InputErrorFeedback :error="form.errors.categories_ids"/>
                        </div>

                        <div class="md:w-1/2 w-full p-3">
                            <label class="font-medium">Aromas</label>
                            <MultiSelect v-model="form.flavors_ids" :options="flavors" filter optionLabel="name"
                                         optionValue="id" placeholder="Selecione os Aromas"
                                         :maxSelectedLabels="3" class="w-full mt-3 md:w-20rem"
                                         :invalid="Boolean(form.errors.flavors_ids)"/>
                            <InputErrorFeedback :error="form.errors.flavors_ids"/>
                        </div>


                    </div>
                </div>

                <div class="p-3 xl:w-1/2 w-full ">
                    <div class=" min-h-full">
                        <div class="w-full flex flex-col ">
                            <label class="font-medium w-full" for="description">Descrição</label>
                            <Textarea class="w-full mt-3 p-3" v-model="form.description" autoResize rows="11"
                                      id="description" :invalid="Boolean(form.errors.description)"/>
                            <InputErrorFeedback :error="form.errors.description"/>
                        </div>
                    </div>
                </div>
            </div>


            <DraggImageComponent :form="form"/>


        </FormCRUD>

    </Dashboard>
</template>
