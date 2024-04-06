<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import {Link} from "@inertiajs/vue3";
import RemoveButton from "@/Components/Buttons/RemoveButton.vue";

export default {
    name: "TypeIndex",
    props: ['action', 'types', 'newBtn', 'newRoute'],
    components: {RemoveButton, IndexCRUD, Dashboard, Link}
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="w-100">
                <div class="my-2 shadow-sm w-100 d-flex" v-for="type in types">
                    <div class="w-75 border-right p-2">{{ type.name }}</div>
                    <div class="w-25 fs-4 d-flex justify-content-end align-items-center">
                        <Link :href="route('product.types.edit', type)"><i title="Editar" class="bi bi-pencil-square text-warning mx-3"></i></Link>
                        <Link><RemoveButton :model="type" :form-route="route('product.types.destroy', type)"></RemoveButton></Link>
                    </div>
                </div>
            </div>
        </IndexCRUD>
    </Dashboard>
</template>


