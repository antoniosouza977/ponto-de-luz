<script>
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import FormCRUD from "@/Components/CRUD/FormCRUD.vue";
import {useForm} from "@inertiajs/vue3";
import {vMaska} from "maska";
import VueSelect from "vue-select";
import TrashIcon from "@/Components/CRUD/TrashIcon.vue";
import draggable from "vuedraggable";
import { useToast } from "vue-toastification";

export default {
    name: "ProductForm",
    directives: {maska: vMaska},
    components: {TrashIcon, Dashboard, FormCRUD, VueSelect, draggable},
    props: ['action', 'categories', 'formRoute', 'product'],
    data() {
        return {
            toast: useToast(),
            drag: false,
            images: [],
            priceMask: {
                mask: "###.###.###,##",
                reversed: true
            },
            form: useForm({
                id: this.product ? this.product.id : null,
                name: this.product ? this.product.name : null,
                description: this.product ? this.product.description : null,
                price: this.product ? this.product.price : null,
                stock_quantity: this.product ? this.product.stock_quantity : null,
                status: this.product ? this.product.status : 'available',
                categories_ids: this.product ? this.product.categories : [],
                images: this.product ? this.product.images : []
            }),
            successMessage: 'Produto Salvo com Sucesso!'
        }
    },
    methods: {
        handleImages(event) {
            const input = event.target
            const images = input.files;
            images.forEach(image => {
                const newImage = {
                    file: image,
                    url: ''
                }
                const reader = new FileReader();
                reader.onload = (e) => {
                    newImage.url = e.target.result
                    this.form.images.push(newImage);
                };
                reader.readAsDataURL(image);
            })

            input.value = ''
        },
        destroyImage(image) {
            const vue = this;

            this.$swal.fire({
                title: 'Confirmar Exclusão',
                text: 'Tem certeza que deseja excluir o registro?',
                showDenyButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: 'Não'
            }).then(alert => {
                if (alert.isConfirmed) {
                    axios.post(route('products.destroy.image', image))
                        .then(resp => {
                            if (resp.status === 200) {
                                vue.form.images = resp.data
                                vue.toast.success('Registro deletado com sucesso!')
                            }
                        })
                }
            });
        }
    }
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :success-message="successMessage">
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
                <h6 class="col-12 mt-2">Fotos do Produto</h6>

                <div class="col-6 mb-3">
                    <input class="form-control" type="file" accept="image/jpeg" multiple id="image_input"
                           @change="handleImages">
                </div>

                <draggable class="d-flex flex-wrap" v-model="form.images" @start="drag=true" @end="drag=false"
                           item-key="order">
                    <template #item="{element : image, index}">
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="p-3">
                                <div class="card">
                                    <img v-if="image.id" :src="'/storage/' + image.path" class="card-img-top"
                                         alt="Imagem">
                                    <img v-else :src="image.url" class="card-img-top" alt="Imagem">
                                    <div class="card-body">
                                        <p class="card-text">Ordem : {{ index + 1 }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button v-if="image.id" @click.prevent="destroyImage(image)" title="Deletar"
                                                class="btn btn-danger mx-2">
                                            Excluir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </draggable>

            </div>
        </FormCRUD>

    </Dashboard>
</template>
