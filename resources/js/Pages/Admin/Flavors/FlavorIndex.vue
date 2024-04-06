<script>
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {Link} from "@inertiajs/vue3";
import EditButton from "@/Components/Buttons/EditButton.vue";
import {router} from "@inertiajs/vue3";

export default {
    name: "FlavorIndex",
    props: ['action', 'flavors', 'newBtn', 'newRoute'],
    components: {EditButton, RemoveButton, IndexCRUD, Dashboard, Link},
    methods: {
        goToProducts(flavor_id) {
            return router.get(route('products.index'), {
                flavor_id: flavor_id,
            })
        }
    }
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="w-full rounded-lg min-h-full">
                <div class="p-3 bg-white rounded-lg border pb-0 border-green-200">
                    <div class="flex justify-between align-items-center p-2">
                        <div class="font-medium">Aroma</div>
                        <div class="text-end font-medium"></div>
                    </div>

                    <div class="flex justify-between w-full py-2 border-t border-green-200"
                         v-for="flavor in flavors" :key="flavor.id">
                        <div class="pl-2 flex items-center"><span>{{ flavor.name }}</span></div>
                        <div class=" flex justify-end">
                            <Button @click.prevent="goToProducts(flavor.id)" label="Produtos" severity="info"
                                    class="mr-3" rounded/>
                            <EditButton :edit-route="route('flavors.edit', flavor)"/>
                            <RemoveButton class="mx-3" :model="flavor"
                                          :form-route="route('flavors.destroy', flavor)"/>
                        </div>
                    </div>
                </div>
            </div>
        </IndexCRUD>
    </Dashboard>
</template>

<style scoped>

</style>
