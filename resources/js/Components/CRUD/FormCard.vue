<script>

import SaveButton from "@/Components/CRUD/SaveButton.vue";

export default {
    name: "FormCard",
    props: ['action', 'form', 'formRoute', 'message'],
    components: {SaveButton}
}
</script>

<template>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ action }}</h6>
            </div>

            <div class="card-body">
                <div class="d-flex flex-row flex-wrap">
                    <slot></slot>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex w-100 justify-content-end">
                    <SaveButton v-bind="$props">

                    </SaveButton>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
