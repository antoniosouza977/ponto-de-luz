<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import {Link} from "@inertiajs/vue3";
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import EditButton from "@/Components/Buttons/EditButton.vue";
import ProductStatus from "@/Components/Admin/CRUD/Products/ProductStatus.vue";
import Paginator from '@/Components/Paginator.vue'
import ProducstFilter from "@/Components/Admin/CRUD/Products/ProducstFilter.vue";
import maskCurrency from "@/helpers.js";
import FlavorTag from "@/Components/Misc/FlavorTag.vue";


export default {
    name: "ProductIndex",
    methods: {maskCurrency},
    props: ['action', 'products', 'newBtn', 'newRoute'],
    components: {
        FlavorTag,
        ProductStatus, EditButton, RemoveButton, IndexCRUD, Dashboard, Link, Paginator, ProducstFilter}
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="p-3" v-if="products.data.length">
                <div class="flex  items-center w-full justify-between px-3">
                    <span class="ml-3 p-1 font-bold text-gl">Total: {{ products.total }}</span>
                    <ProducstFilter/>
                </div>
                <div class="w-full flex flex-wrap">
                    <div class="xl:w-1/4 lg:w-1/3 w-full p-3 " v-for="product in products.data">
                        <div class="h-100 bg-white border rounded-lg border-green-200 drop-shadow-lg min-h-full">
                            <Carousel :value="product.images">
                                <template #item="image">
                                    <div class="border-1 surface-border border-round">
                                        <div class="my-3 pt-3">
                                            <div class="relative mx-auto">
                                                <img :src="'/storage/'+image.data.path" class="w-full rounded-lg"/>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </Carousel>
                            <div class="p-3 border-t">
                                <div class="text-xl font-bold mb-3">{{ product.name }}</div>

                                <Fieldset legend="Categorias">
                                            <span class="d-inline-block border p-1 mr-1 rounded"
                                                  v-for="category in product.categories">
                                                {{ category.name }}
                                            </span>
                                </Fieldset>

                                <Fieldset legend="Aromas">
                                    <template v-for="flavor in product.flavors">
                                        <FlavorTag :flavor="flavor" />
                                    </template>
                                </Fieldset>

                                <Fieldset legend="Informações">
                                    <div class="flex flex-wrap">
                                        <div class="w-full">Valor: R$
                                            {{ maskCurrency(product.price) }}
                                        </div>
                                        <div class="md:w-1/2 w-full">Estoque: {{
                                                product.stock_quantity
                                            }}
                                        </div>
                                        <ProductStatus :product="product"/>
                                    </div>
                                </Fieldset>

                            </div>
                            <div class="border-t flex justify-end items-center p-3">
                                <EditButton :btn="true" :edit-route="route('products.edit', product)"/>
                                <RemoveButton :btn="true" :model="product"
                                              :form-route="route('products.destroy', product)"></RemoveButton>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div v-else>
                <p>Nenhum Produto Cadastrado.</p>
            </div>
            <Paginator v-if="products.per_page < products.total" :links="products.links"/>

        </IndexCRUD>
    </Dashboard>
</template>
