<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import FormCard from "@/Components/CRUD/FormCard.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "ProductForm",
    props: ['action', 'categories'],
    components: {Dashboard, FormCard},
    data() {
        return {
            form: useForm({
                name: null,
                description: null
            })
        }
    }
}
</script>

<template>
    <Dashboard>
        <FormCard v-bind="$props" :form="form">

            <div class="col-xl-6 col-12">
                <div class="form-group p-3">
                    <label class="form-label" for="">Nome</label>
                    <input class="form-control" type="text" name="" id="" v-model="form.name">
                </div>
            </div>

            <div class="col-xl-6 col-12">
                <div class="form-group p-3 m-0">
                    <label class="form-label" for="">Descrição</label>
                    <input class="form-control" type="text" name="" id="" v-model="form.description">
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="form-group p-3">
                    <label class="form-label" for="">Preço</label>
                    <input class="form-control" type="text" name="" id="">
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="form-group p-3 m-0">
                    <label class="form-label" for="">Quantidade Em Estoque</label>
                    <input class="form-control" type="text" name="" id="">
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="form-group p-3">
                    <label class="form-label" for="">Status</label>
                    <input class="form-control" type="text" name="" id="">
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="form-group p-3 m-0">
                    <label class="form-label" for="">Categoria</label>
                    <select class="form-control" name="" id="">
                        <option v-for="category in categories">
                            @{{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
        </FormCard>

    </Dashboard>
</template>

<style scoped>

</style>
