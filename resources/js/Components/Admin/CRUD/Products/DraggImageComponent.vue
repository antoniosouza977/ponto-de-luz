<script>
import draggable from "vuedraggable";
import {useToast} from "vue-toastification";

export default {
    name: "DraggImageComponent",
    props: ['form'],
    components: {draggable},
    data() {
        return {
            toast: useToast()
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
        },
        removeImageFromList(image_index) {
            this.form.images.splice(image_index, 1);
        },
        dragging(event) {
            event.item.classList.add('ghost')
        },
        dragged(event) {
            event.item.classList.remove('ghost')
        }
    }
}
</script>

<template>
    <div class="d-flex flex-wrap border rounded mt-3">
        <h6 class="col-12 mt-2">Fotos do Produto</h6>

        <div class="col-6 mb-3">
            <input class="form-control" type="file" accept="image/jpeg" multiple id="image_input"
                   @change="handleImages">
        </div>

        <draggable
            v-model="form.images"
            animation="300"
            @start="dragging"
            @end="dragged"
            class="d-flex flex-wrap p-3"
            item-key="order"
        >
            <template #item="{element : image, index}">
                <div class="col-xl-4 col-lg-6 col-12 p-1 dg-item">
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
                                Remover Imagem
                            </button>
                            <button v-else @click.prevent="removeImageFromList(index)"
                                    title="Remover da Lista"
                                    class="btn btn-warning mx-2">
                                Remover da Lista
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </draggable>
    </div>
</template>

<style scoped>
.ghost {
    opacity: 0;
    transition: opacity 0.1s;
}

.card-img-top {
    cursor: move;
}
</style>
