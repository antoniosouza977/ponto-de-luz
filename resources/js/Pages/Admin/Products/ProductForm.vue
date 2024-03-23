<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import FormCRUD from "@/Components/CRUD/FormCRUD.vue";
import {useForm} from "@inertiajs/vue3";
import {vMaska} from "maska";
import VueSelect from "vue-select";

export default {
    name: "ProductForm",
    directives: {maska: vMaska},
    components: {Dashboard, FormCRUD, VueSelect},
    props: ['action', 'categories', 'formRoute'],
    data() {
        return {
            images: [],
            priceMask: {
                mask: "###.###.###,##",
                reversed: true
            },
            form: useForm({
                id: null,
                name: null,
                description: null,
                price: null,
                stock_quantity: null,
                status: 'available',
                categories_ids: [],
                images: []
            })
        }
    },
    methods: {
        handleImages(event) {
            const file = event.target.files[0];
            this.form.images.push(file)

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.images.push(e.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
    }
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form">
            <div class="d-flex flex-wrap border rounded">

                <h6 class="col-12 mt-2">Dados do produto</h6>

                <div class="col-xl-6 col-12 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="name" v-model="form.name">
                        <label class="form-label" for="name">Nome</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.name">{{ form.errors.name }}</div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="price" v-maska:[priceMask]
                               v-model="form.price">
                        <label class="form-label" for="price">Preço</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.price">{{ form.errors.price }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="stock" v-model="form.stock_quantity">
                        <label class="form-label" for="stock">Estoque</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.stock_quantity">{{ form.errors.stock_quantity }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" type="text" id="description" style="height: 100px"
                                  v-model="form.description"></textarea>
                        <label class="form-label" for="description">Descrição</label>
                        <div style="height: 15px" class="text-danger">
                            <div v-if="form.errors.name">{{ form.errors.description }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 mb-3" style="height: 58px;">
                    <label class="m-0">Status</label>
                    <select class="form-select" aria-label="Status" v-model="form.status">
                        <option value="available" selected>Disponível</option>
                        <option value="promotion">Promoção</option>
                        <option value="unavailable">Indisponível</option>
                        <option value="out-of-stock">Sem estoque</option>
                    </select>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-3" style="height: 58px;">
                    <label class="m-0">Categoria</label>
                    <vue-select multiple :options="categories" label="name" :reduce="category => category.id"
                                placeholder="Selecione..." v-model="form.categories_ids"/>
                </div>

            </div>
            <div class="d-flex flex-wrap border rounded mt-3">
                <h6 class="col-12 mt-2">Fotos</h6>

                <div class="col-6 mb-3">
                    <input class="form-control" type="file" id="image_input" @change="handleImages">
                </div>

                <div class="col-12 mt-3 d-flex flex-wrap">
                    <div v-for="(imageUrl, index) in images" :key="index" class="col-xl-4 col-lg-6 col-12">
                        <div class="p-3">
                            <div class="card">
                                <img :src="imageUrl" class="card-img-top" alt="Imagem">
                                <div class="card-body">
                                    <p class="card-text">{{ index === 0 ? 'Capa' : "Foto" + (index + 1) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </FormCRUD>

    </Dashboard>
</template>
