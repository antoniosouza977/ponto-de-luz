<script>
import axios from "axios";
import {router} from "@inertiajs/vue3";
import {useToast} from "vue-toastification";

export default {
    name: "ProducstFilter",
    data() {
        return {
            toast: useToast(),

            gettingFilters: false,
            sidebar_visible: false,

            queryParameters: {
                category_id: route().params.category_id ? Number(route().params.category_id) : "",
                flavor_id: route().params.flavor_id ? Number(route().params.flavor_id) : "",
            },
            filters: {
                categories: [],
                flavors: [],
            },
        }
    },
    methods: {
        async getFilters() {
            this.gettingFilters = true;
            await axios.get(route('api.product.filters.index')).then(response => {
                this.filters = response.data;
            })

            this.gettingFilters = false;
            this.sidebar_visible = true;
        },
        doQuery() {
            if (this.isValidQuery()) return router.get(route('products.index'), this.queryParameters);

            return this.toast.warning('Ops, você não selecionou nenhum filtro.')
        },
        resrtQuery() {
            if (this.isValidQuery()) return router.get(route('products.index'));

            return this.toast.warning('Nada foi filtrado ainda.')
        },
        isValidQuery() {
            for (let queryParametersKey in this.queryParameters) {
                if (this.queryParameters[queryParametersKey] === "") {
                    delete this.queryParameters[queryParametersKey];
                }
            }
            return Object.keys(this.queryParameters).length !== 0;
        }
    },
}
</script>

<template>
    <div class="p-3 flex justify-content-center">
        <Sidebar v-model:visible="sidebar_visible" header="Buscar Produtos">
            <div class="w-full flex justify-end my-3">
                <Button icon="pi pi-refresh" class="mx-3" title="Limpar Busca" @click="resrtQuery()"/>
                <Button icon="pi pi-search" title="Filtrar" @click="doQuery()"/>
            </div>
            <div class="border border-green-200 p-3 rounded-lg mb-3">
                <label class="font-bold" for="category_id">Categoria</label>
                <Dropdown inputId="category_id" v-model="queryParameters.category_id" :options="filters.categories"
                          optionLabel="name" optionValue="id" class="w-full my-3"/>
            </div>
            <div class="border border-green-200 p-3 rounded-lg mb-3">
                <label class="font-bold" for="flavor_id">Aroma</label>
                <Dropdown inputId="flavor_id" v-model="queryParameters.flavor_id" :options="filters.flavors"
                          optionLabel="name" optionValue="id" class="w-full my-3"/>
            </div>
        </Sidebar>
        <div class="w-full flex justify-end">
            <Button icon="pi pi-search" @click="getFilters" label="Buscar Produtos" :loading="gettingFilters"/>
        </div>
    </div>
</template>

