<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import {Link} from "@inertiajs/vue3";
import TrashIcon from "@/Components/Admin/CRUD/TrashIcon.vue";
import EditButton from "@/Components/Admin/CRUD/EditButton.vue";
import ProductStatus from "@/Components/Admin/CRUD/Products/ProductStatus.vue";
import Paginator from '@/Components/Paginator.vue'


export default {
    name: "ProductIndex",
    props: ['action', 'products', 'newBtn', 'newRoute'],
    components: {ProductStatus, EditButton, TrashIcon, IndexCRUD, Dashboard, Link, Paginator}
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="w-full flex flex-wrap">
                <div class="xl:w-1/3 lg:w-1/2 w-full p-3" v-for="product in products.data">
                    <div class="h-100  border rounded-lg border-green-200 shadow-xl">
                        <Carousel :value="product.images" >
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
                        <div class="p-3 border-t border-green-200">
                            <div class="text-xl font-bold mb-3">{{ product.name }}</div>
                            <div class="border border-green-200 rounded-lg p-2 mb-2">
                                <h6 class="m-0 mb-1 font-bold">Categorias</h6>
                                <span class="d-inline-block border border-green-200 p-1 mr-1 rounded"
                                      v-for="category in product.categories">{{ category.name }}</span>
                            </div>

                            <div class="border border-green-200 rounded p-2 mb-2">
                                <h6 class="m-0 mb-1 font-bold">Aromas</h6>
                                <span class="d-inline-block border border-green-200 p-1 mr-1 rounded"
                                      v-for="flavor in product.flavors">{{ flavor.name }}</span>
                            </div>

                            <div class="border border-green-200 rounded p-2 mb-2 d-flex flex-wrap">
                                <h6 class="m-0 mb-1 font-bold w-100">Informações</h6>
                                <div class="col-xl-4 col-gl-6 col-12 p-0">Valor: R$ {{ product.price }}</div>
                                <div class="col-xl-3 col-gl-6 col-12 p-0">Estoque: {{ product.stock_quantity }}</div>
                                <ProductStatus :product="product"/>
                            </div>
                        </div>
                        <div class="border-t border-green-200 flex justify-end items-center p-3">
                            <EditButton :btn="true" :edit-route="route('products.edit', product)"/>
                            <TrashIcon :btn="true" :model="product"
                                       :form-route="route('products.destroy', product)"></TrashIcon>
                        </div>
                    </div>
                </div>

            </div>

            <Paginator v-if="products.per_page < products.total" :links="products.links"/>

        </IndexCRUD>
    </Dashboard>
</template>
