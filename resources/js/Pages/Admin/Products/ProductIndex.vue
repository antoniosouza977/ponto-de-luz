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
            <div class="w-100 d-flex flex-wrap">
                <div class="col-xl-4 col-lg-6 col-12 mb-3" v-for="product in products.data">
                    <div class="card h-100">
                        <div class="card-header p-0">
                            <div v-if="product.images.length" :id="'carousel' + product.id"
                                 class="carousel carousel-fade">
                                <div class="carousel-inner">
                                    <div v-for="(image,index) in product.images" class="carousel-item"
                                         :class="{active: index === 0}">
                                        <img :src="'/storage/'+image.path" class="d-block w-100" alt="">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        :data-bs-target="'#' + 'carousel' + product.id" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        :data-bs-target="'#' + 'carousel' + product.id" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div v-else>
                                <img src="/images/image_not_found.jpeg" class="d-block w-100"
                                     alt="imagem nao encontrada">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ product.name }}</h5>
                            <div class="border rounded p-2 mb-2">
                                <h6 class="card-title m-0 mb-1 fw-bold">Categorias</h6>
                                <span class="d-inline-block border p-1 mr-1 rounded"
                                      v-for="category in product.categories">{{ category.name }}</span>
                            </div>

                            <div class="border rounded p-2 mb-2">
                                <h6 class="card-title m-0 mb-1 fw-bold">Aromas</h6>
                                <span class="d-inline-block border p-1 mr-1 rounded"
                                      v-for="flavor in product.flavors">{{ flavor.name }}</span>
                            </div>

                            <div class="border rounded p-2 mb-2 d-flex flex-wrap">
                                <h6 class="card-title m-0 mb-1 fw-bold w-100">Informações</h6>
                                <div class="col-xl-4 col-gl-6 col-12 p-0">Valor: R$ {{ product.price }}</div>
                                <div class="col-xl-3 col-gl-6 col-12 p-0">Estoque: {{ product.stock_quantity }}</div>
                                <ProductStatus :product="product"/>
                            </div>
                        </div>
                        <div class="card-footer fs-4 d-flex justify-content-end align-items-center">
                            <EditButton :btn="true" :edit-route="route('products.edit', product)"/>
                            <TrashIcon :btn="true" :model="product"
                                       :form-route="route('products.destroy', product)"></TrashIcon>
                        </div>
                    </div>
                </div>

            </div>

            <Paginator v-if="products.per_page < products.total" :links="products.links" />

        </IndexCRUD>
    </Dashboard>
</template>
