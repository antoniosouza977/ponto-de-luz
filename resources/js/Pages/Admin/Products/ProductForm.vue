<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import {useForm} from "@inertiajs/vue3";
import VueSelect from "vue-select";
import TrashIcon from "@/Components/Admin/CRUD/TrashIcon.vue";
import DraggImageComponent from "@/Components/Admin/CRUD/Products/DraggImageComponent.vue";

export default {
    name: "ProductForm",
    components: {DraggImageComponent, TrashIcon, Dashboard, FormCRUD, VueSelect},
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
                id: this.product.id || null,
                name: this.product.name || null,
                description: this.product.description || null,
                price: this.product.price || null,
                stock_quantity: this.product.stock_quantity || null,
                status: this.product.status || 'available',
                categories_ids: this.product && this.product.categories.length ? this.product.categories.map(element => {
                    return element.id
                }) : null,
                flavors_ids: this.product && this.product.flavors.length ? this.product.flavors.map(element => {
                    return element.id
                }) : null,
                images: this.product.images || []
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
            <div class="flex flex-wrap border border-green-200 rounded p-3">
                <div class="2xl:w-1/4 md:w-1/2 w-full p-3 mb-3">
                    <label for="nome">Nome do Produto</label>
                    <InputText class="w-full mt-3" id="nome" v-model="form.name"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>
                </div>

                <div class="2xl:w-1/4 md:w-1/2 w-full p-3 mb-3">
                    <label for="price">Valor do Produto</label>
                    <InputNumber class="w-full mt-3" id="price" v-model="form.price" inputId="locale-user"
                                 :minFractionDigits="2"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.price">{{ form.errors.price }}</div>
                    </div>
                </div>

                <div class="2xl:w-1/4 md:w-1/2 w-full p-3 mb-3">
                    <label for="stock">Estoque do Produto</label>
                    <InputNumber class="w-full mt-3" id="stock" v-model="form.stock_quantity"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.stock_quantity">{{ form.errors.stock_quantity }}</div>
                    </div>
                </div>

                <div class="2xl:w-1/4 md:w-1/2 w-full p-3 mb-3">
                    <label for="status">Status</label>
                    <Dropdown inputId="status" v-model="form.status" :options="statusOptions"
                              optionLabel="label" optionValue="value" class="w-full my-3"/>
                </div>


                <div class="2xl:w-1/4 md:w-1/2 w-full p-3">
                    <label>Categorias</label>
                    <MultiSelect v-model="form.categories_ids" :options="categories" filter optionLabel="name"
                                 optionValue="id" placeholder="Selecione as Categorias"
                                 :maxSelectedLabels="3" class="w-full md:w-20rem"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.categories_ids">{{ form.errors.categories_ids }}</div>
                    </div>
                </div>

                <div class="2xl:w-1/4 md:w-1/2 w-full p-3">
                    <label>Aromas</label>
                    <MultiSelect v-model="form.flavors_ids" :options="flavors" filter optionLabel="name"
                                 optionValue="id" placeholder="Selecione os Aromas"
                                 :maxSelectedLabels="3" class="w-full md:w-20rem"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.flavors_ids">{{ form.errors.flavors_ids }}</div>
                    </div>
                </div>


            </div>

            <div class="border border-green-200 rounded p-3 my-3">
                <div class="xl:w-1/2 w-full flex flex-col ">
                    <label class="w-full" for="description">Descrição</label>
                    <Textarea class="w-full mt-3 p-3" v-model="form.description" autoResize rows="5" id="description"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.description">{{ form.errors.description }}</div>
                    </div>
                </div>
            </div>

            <DraggImageComponent :form="form"/>

        </FormCRUD>

    </Dashboard>
</template>
