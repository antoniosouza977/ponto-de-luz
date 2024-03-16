<script>
export default {
    name: "IndexCRUD",
    props: ['action', 'categories']
}
</script>

<template>

    <div class="col-9">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ action }}</h6>
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

