<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import EditButton from "@/Components/Buttons/EditButton.vue";
import {router} from "@inertiajs/vue3";

export default {
    name: "CategoryIndex",
    props: ['action', 'categories', 'newBtn', 'newRoute'],
    components: {EditButton, RemoveButton, IndexCRUD, Dashboard},
    methods: {
        goToProducts(category_id) {
            router.get(route('products.index', {
                category_id: category_id,
            }))
        }
    }
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="w-full rounded-lg min-h-full">

                <div class="p-3 pb-0 rounded-lg bg-white border border-green-200">
                    <div class="flex justify-between align-items-center p-2">
                        <div class="w-1/3 font-medium">Categoria</div>
                        <div class="text-center w-1/3 hidden md:block font-medium">Tipo de Produto</div>
                        <div class="text-end w-1/3 font-medium"></div>
                    </div>

                    <div class="flex w-full py-2 border-t border-green-200" v-for="category in categories"
                         :key="category.id">
                        <div class="w-1/3 pl-2 flex items-center"><span>{{ category.name }}</span></div>
                        <div class="w-1/3 hidden md:flex justify-center items-center "><span>{{
                                category.type.name
                            }}</span>
                        </div>
                        <div class="md:w-1/3 w-2/3 flex justify-end">
                            <Button @click.prevent="goToProducts(category.id)" label="Produtos" severity="info"
                                    class="mr-3" rounded/>
                            <EditButton :edit-route="route('categories.edit', category)"/>
                            <RemoveButton class="mx-3" :model="category"
                                          :form-route="route('categories.destroy', category)"/>
                        </div>
                    </div>
                </div>

            </div>
        </IndexCRUD>
    </Dashboard>
</template>

