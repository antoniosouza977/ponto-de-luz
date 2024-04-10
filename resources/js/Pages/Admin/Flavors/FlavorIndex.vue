<script>
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {Link} from "@inertiajs/vue3";
import EditButton from "@/Components/Buttons/EditButton.vue";
import {router} from "@inertiajs/vue3";
import FlavorTag from "@/Components/Misc/FlavorTag.vue";

export default {
    name: "FlavorIndex",
    props: ['action', 'flavors', 'newBtn', 'newRoute'],
    components: {FlavorTag, EditButton, RemoveButton, IndexCRUD, Dashboard, Link},
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
            <div v-if="flavors.length" class="w-full rounded-lg min-h-full">
                <div class="p-3 bg-white rounded-lg border pb-0 border-green-200">
                    <div class="flex justify-between align-items-center p-2">
                        <div class="font-medium md:w-1/3 w-1/2">Nome</div>
                        <div class="font-medium text-center md:w-1/3 md:block hidden">Tags</div>
                        <div class="text-end font-medium md:w-1/3 w-1/2"></div>
                    </div>

                    <div class="flex justify-between w-full py-2 border-t border-green-200"
                         v-for="flavor in flavors" :key="flavor.id">
                        <div class="pl-2 flex items-center md:w-1/3 w-1/2"><span>{{ flavor.name }}</span></div>
                        <div class="pl-2 flex items-center text-center md:w-1/3 md:block hidden">
                            <FlavorTag display_full="true" :flavor="flavor" />
                            <FlavorTag :flavor="flavor" />
                        </div>
                        <div class=" flex justify-end md:w-1/3 w-1/2">
                            <Button @click.prevent="goToProducts(flavor.id)" label="Produtos" severity="info"
                                    class="mr-3" rounded/>
                            <EditButton :edit-route="route('flavors.edit', flavor)"/>
                            <RemoveButton class="mx-3" :model="flavor"
                                          :form-route="route('flavors.destroy', flavor)"/>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p>Nenhuma Fragância Cadastrada.</p>
            </div>
        </IndexCRUD>
    </Dashboard>
</template>

<style scoped>

</style>
