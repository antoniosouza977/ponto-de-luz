<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import IndexCRUD from "@/Components/Admin/CRUD/IndexCRUD.vue";
import {Link} from "@inertiajs/vue3";
import TrashIcon from "@/Components/Admin/CRUD/TrashIcon.vue";

export default {
    name: "CategoryIndex",
    props: ['action', 'categories', 'newBtn', 'newRoute'],
    components: {TrashIcon, IndexCRUD, Dashboard, Link}
}
</script>

<template>
    <Dashboard>
        <IndexCRUD v-bind="$props">
            <div class="w-100">
                <div class="my-2 shadow-sm w-100 d-flex" v-for="category in categories">
                    <div class="w-75 border-right p-2">{{ category.name }}</div>
                    <div class="w-25 fs-4 d-flex justify-content-end align-items-center">
                        <Link :href="route('categories.edit', category)"><i title="Editar" class="bi bi-pencil-square text-warning mx-3"></i></Link>
                        <TrashIcon :model="category" :form-route="route('categories.destroy', category)"></TrashIcon>
                    </div>
                </div>
            </div>
        </IndexCRUD>
    </Dashboard>
</template>

