<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "IndexCRUD",
    components: {Link},
    props: ['action', 'newBtn', 'newRoute']
}
</script>

<template>


    <div class="rounded-lg min-h-full border border-green-200">

        <div class="bg-card rounded-lg">
            <div class="flex items-center justify-between bg-title rounded-t-lg p-3 m-0">
                <div class="ml-3 font-bold text-lg flex items-center">
                    <span>{{ action }}</span>
                </div>
                <Link :href="newRoute">
                    <Button :label="newBtn" icon="pi pi-plus" rounded/>
                </Link>
            </div>

            <div class="p-6">
                <slot></slot>
            </div>
        </div>

    </div>


</template>

