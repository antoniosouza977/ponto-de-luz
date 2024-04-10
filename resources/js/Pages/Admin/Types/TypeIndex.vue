<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import {Link, router} from "@inertiajs/vue3";
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import EditButton from "@/Components/Buttons/EditButton.vue";

export default {
    name: "TypeIndex",
    props: ['action', 'types', 'newBtn', 'newRoute'],
    components: {EditButton, RemoveButton, IndexCRUD, Dashboard, Link},
    methods: {
        goToProducts(type_id) {
            router.get(route('products.index', {
                type_id: type_id,
            }))
        }
    }
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div v-if="types.length" class="w-full rounded-lg min-h-full">

                <div class="p-3 pb-0 rounded-lg bg-white border border-green-200">
                    <div class="flex justify-between align-items-center p-2">
                        <div class="font-medium">Tipo de Produto</div>
                        <div class="text-end font-medium"></div>
                    </div>

                    <div class="flex w-full justify-between py-2 border-t border-green-200" v-for="type in types"
                         :key="type.id">
                        <div class="pl-2 flex items-center"><span>{{ type.name }}</span></div>
                        <div class="flex justify-end">
                            <Button @click.prevent="goToProducts(type.id)" label="Produtos" severity="info"
                                    class="mr-3" rounded/>
                            <EditButton :edit-route="route('product.types.edit', type)"/>
                            <RemoveButton class="mx-3" :model="type"
                                          :form-route="route('product.types.destroy', type)"/>
                        </div>
                    </div>
                </div>

            </div>
            <div v-else>
                <p>Nenhum Tipo de Produto Cadastrado.</p>
            </div>
        </IndexCRUD>
    </Dashboard>
</template>


