<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "IndexCRUD",
    components : {Link},
    props: ['action', 'newBtn', 'newRoute']
}
</script>

<template>

    <div class="col-12">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ action }}</h6>
                <Link :href="newRoute" class="btn btn-primary">{{ newBtn }}</Link>
            </div>

            <div class="card-body">
                <div class="d-flex flex-row flex-wrap">
                    <slot></slot>
                </div>
            </div>

            <div class="card-footer d-flex" style="height: 52px">
            </div>

        </div>
    </div>

</template>

