<script>
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "FlavorIndex",
    props: ['action', 'flavors', 'newBtn', 'newRoute'],
    components: {RemoveButton, IndexCRUD, Dashboard, Link}
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="w-100">
                <div class="my-2 shadow-sm w-100 d-flex" v-for="flavor in flavors">
                    <div class="w-75 border-right p-2">{{ flavor.name }}</div>
                    <div class="w-25 fs-4 d-flex justify-content-end align-items-center">
                        <Link :href="route('flavors.edit', flavor)"><i title="Editar" class="bi bi-pencil-square text-warning mx-3"></i></Link>
                        <RemoveButton :model="flavor" :form-route="route('flavors.destroy', flavor)"></RemoveButton>
                    </div>
                </div>
            </div>
        </IndexCRUD>
    </Dashboard>
</template>

<style scoped>

</style>
