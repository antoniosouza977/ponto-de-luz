<script>

import SidebarDropDown from "@/Components/Admin/Dashboard/SidebarDropDown.vue";

export default {
    props: {
        toggleSidebar: Function
    },
    components: {SidebarDropDown},
    data() {
        return {
            productsOptions: [
                {
                    label: "Lista de Produtos",
                    route: 'products.index'
                },
                {
                    label: "Novo Produto",
                    route: 'products.create'
                }
            ],
            flavorsOptions: [
                {
                    label: "Lista de Fragâncias",
                    route: 'flavors.index'
                },
                {
                    label: "Nova Fragâncias",
                    route: 'flavors.create'
                }
            ],
            categoriesOptions: [
                {
                    label: "Lista de Categorias",
                    route: 'categories.index'
                },
                {
                    label: "Nova Categoria",
                    route: 'categories.create'
                }
            ],
            typesOptions: [
                {
                    label: "Lista de Tipos de Produtos",
                    route: 'product.types.index'
                },
                {
                    label: "Novo Tipo de Produto",
                    route: 'product.types.create'
                }
            ]
        }
    }
}
</script>

<template>
    <div class="flex flex-column h-full text-nowrap">
        <div class="flex align-items-center justify-content-between px-4 pt-3 flex-shrink-0">
            <div class="flex items-center text-lg font-medium text-nowrap">
<!--            <img src="/imgs/logo-ponto-de-luz.PNG" style="width: 75px;" />-->
                Ponto de Luz
            </div>
            <Button icon="pi pi-times" class="hover:bg-green-400 hover:text-white" severity="success" rounded outlined aria-label="Fechar" @click.prevent="toggleSidebar" />
        </div>
        <div class="overflow-y-auto">
            <ul class="list-none p-3 m-0">
                <li>
                    <div
                        v-ripple
                        v-styleclass="{
                                selector: '@next',
                                enterClass: 'hidden',
                                enterActiveClass: 'slidedown',
                                leaveToClass: 'hidden',
                                leaveActiveClass: 'slideup'
                            }"
                        class="p-3 flex align-items-center justify-content-between text-600 cursor-pointer p-ripple"
                    >
                        <span class="font-medium">Cadastros</span>
                        <i class="pi pi-chevron-down"></i>
                    </div>
                    <ul class="list-none p-0 m-0 overflow-hidden">
                        <SidebarDropDown icon="pi-shopping-cart" mainRoute="products" title="Produtos" :options="productsOptions" />
                        <SidebarDropDown icon="pi-sparkles" mainRoute="flavors" title="Fragâncias" :options="flavorsOptions" />
                        <SidebarDropDown icon="pi-hashtag" mainRoute="categories" title="Categorias" :options="categoriesOptions" />
                        <SidebarDropDown icon="pi-thumbtack" mainRoute="product.types" title="Tipos" :options="typesOptions" />
                    </ul>
                </li>
            </ul>
            <ul class="list-none p-3 m-0">
                <li>
                    <div
                        v-ripple
                        v-styleclass="{
                                selector: '@next',
                                enterClass: 'hidden',
                                enterActiveClass: 'slidedown',
                                leaveToClass: 'hidden',
                                leaveActiveClass: 'slideup'
                            }"
                        class="p-3 flex align-items-center justify-content-between text-600 cursor-pointer p-ripple"
                    >
                        <span class="font-medium">APPLICATION</span>
                        <i class="pi pi-chevron-down"></i>
                    </div>
                    <ul class="list-none p-0 m-0 overflow-hidden">
                        <li>
                            <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                <i class="pi pi-folder mr-2"></i>
                                <span class="font-medium">Projects</span>
                            </a>
                        </li>
                        <li>
                            <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                <i class="pi pi-chart-bar mr-2"></i>
                                <span class="font-medium">Performance</span>
                            </a>
                        </li>
                        <li>
                            <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                <i class="pi pi-cog mr-2"></i>
                                <span class="font-medium">Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <hr class="mb-3 mx-3 border-top-1 border-none surface-border" />
            <a v-ripple class="m-3 flex align-items-center cursor-pointer p-3 gap-2 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                <!--                <Avatar image="/images/avatar/amyelsner.png" shape="circle" />-->
                <span class="font-bold">Amy Elsner</span>
            </a>
        </div>
    </div>
</template>

<style scoped>
@import "primeflex/primeflex.css";
</style>

