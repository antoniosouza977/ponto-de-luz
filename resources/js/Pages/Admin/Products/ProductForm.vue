<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import {useForm} from "@inertiajs/vue3";
import {vMaska} from "maska";
import VueSelect from "vue-select";
import TrashIcon from "@/Components/Admin/CRUD/TrashIcon.vue";
import DraggImageComponent from "@/Components/Admin/CRUD/Products/DraggImageComponent.vue";

export default {
    name: "ProductForm",
    directives: {maska: vMaska},
    components: {DraggImageComponent, TrashIcon, Dashboard, FormCRUD, VueSelect},
    props: ['action', 'categories', 'flavors', 'formRoute', 'product'],
    data() {
        return {
            images: [],
            priceMask: {
                mask: "###.###.###,##",
                reversed: true
            },
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
                images: this.product ? this.product.images : []
            }),
            successMessage: 'Produto Salvo com Sucesso!'
        }
    },
    methods: {
        selectAllFlavors() {
            this.form.flavors_ids = this.flavors.map(flavor => {
                return flavor.id
            })
        }
    }
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :success-message="successMessage">
            <div class="d-flex flex-wrap border rounded">

                <h6 class="col-12 mt-2">Dados do produto</h6>

                <div class="col-xl-6 col-12 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="name" v-model="form.name">
                        <label class="form-label" for="name">Nome</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.name">{{ form.errors.name }}</div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="price" v-maska:[priceMask]
                               v-model="form.price">
                        <label class="form-label" for="price">Preço</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.price">{{ form.errors.price }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="stock" v-model="form.stock_quantity">
                        <label class="form-label" for="stock">Estoque</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.stock_quantity">{{ form.errors.stock_quantity }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 mb-3" style="height: 58px;">
                    <label class="m-0">Status</label>
                    <select class="form-select" aria-label="Status" v-model="form.status">
                        <option value="available" selected>Disponível</option>
                        <option value="promotion">Promoção</option>
                        <option value="unavailable">Indisponível</option>
                        <option value="out-of-stock">Sem estoque</option>
                    </select>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-3" style="height: 58px;">
                    <label class="m-0">Categoria</label>
                    <vue-select multiple :options="categories" label="name" :reduce="category => category.id"
                                placeholder="Selecione..." v-model="form.categories_ids"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.categories_ids">{{ form.errors.categories_ids }}</div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-3" style="height: 58px;">
                    <label class="m-0">Aromas</label>
                    <vue-select multiple :options="flavors" label="name" :reduce="flavor => flavor.id"
                                placeholder="Selecione..." v-model="form.flavors_ids"/>
                    <div style="height: 15px" class="text-danger">
                        <div v-if="form.errors.flavors_ids">{{ form.errors.flavors_ids }}</div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-3 d-flex align-items-end" style="height: 58px;">
                    <button @click.prevent="selectAllFlavors" class="btn btn-primary">Selecionar todos</button>
                </div>

                <div class="col-xl-6 col-12 my-3">
                    <div class="form-floating">
                        <textarea class="form-control" type="text" id="description" style="height: 100px"
                                  v-model="form.description"></textarea>
                        <label class="form-label" for="description">Descrição</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.description">{{ form.errors.description }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <DraggImageComponent :form="form"/>

        </FormCRUD>

    </Dashboard>
</template>
