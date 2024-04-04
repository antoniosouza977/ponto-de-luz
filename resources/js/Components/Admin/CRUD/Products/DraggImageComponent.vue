<script>
import draggable from "vuedraggable";
import {useToast} from "vue-toastification";
import axios from "axios";

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
            console.log(event.clone)
            event.item.classList.add('ghost')
        },
        dragged(event) {
            event.item.classList.remove('ghost')
        }
    }
}
</script>

<template>
    <div class="flex flex-wrap border border-green-200 rounded">
        <h6 class="w-full font-bold border-green-200 p-3">Fotos do Produto</h6>

        <div class="p-3 mb-3">
            <label for="images_input" class="font-medium text-white p-2 rounded hover:bg-green-400 bg-green-500 cursor-pointer active:shadow-none shadow-md">
                Selecione as Imagens
            </label>
            <input type="file" accept="image/jpeg" multiple id="images_input" @change="handleImages">
        </div>

        <draggable
            v-model="form.images"
            animation="300"
            @start="dragging"
            @end="dragged"
            class="flex flex-wrap mt-3"
            item-key="order"
        >
            <template #item="{element : image, index}">
                <div class="2xl:w-1/4 xl:w-1/3 md:w-1/2 w-full p-3 mb-3 dg-item">
                    <img v-if="image.id" :src="'/storage/' + image.path" class="rounded-t card-img-top"
                         alt="Imagem">
                    <img v-else :src="image.url" class="rounded-t card-img-top" alt="Imagem">
                    <div class="border drop-shadow-md border-green-300 p-3 m-0 bg-white rounded-b">
                        <div>
                            <span class="font-bold">Ordem :</span>
                            {{ index + 1 }}
                        </div>
                        <div class="flex justify-end">
                            <Button v-if="image.id" @click.prevent="destroyImage(image)" severity="danger"
                                    title="Deletar" label="Remover Imagem"/>
                            <Button v-else @click.prevent="removeImageFromList(index)" severity="warning"
                                    label="Remover da Lista"/>
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

input[type="file"] {
    display: none;
}

</style>
