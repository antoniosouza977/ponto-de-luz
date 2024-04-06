<script>
import {useForm} from "@inertiajs/vue3";
import FormCRUD from "@/Components/Admin/CRUD/FormCRUD.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import InputErrorFeedback from "@/Components/Admin/CRUD/InputErrorFeedback.vue";

export default {
    name: "FlavorForm",
    components: {InputErrorFeedback, Dashboard, FormCRUD},
    props: ['action', 'formRoute', 'flavor'],
    data() {
        return {
            form: useForm({
                id: this.flavor ? this.flavor.id : null,
                name: this.flavor ? this.flavor.name : null,
                tag_color: this.flavor ? this.flavor.tag_color : null,
                text_color: this.flavor ? this.flavor.text_color : null,
            }),
            successMessage: 'Aroma salvo com sucesso!'
        }
    }
}
</script>

<template>
    <Dashboard>
        <FormCRUD v-bind="$props" :form="form" :formRoute="formRoute" :successMessage="successMessage">
            <div class="flex flex-wrap bg-white rounded-lg border border-green-200">


                <div class="p-3 2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full ">
                    <label class="font-medium" for="nome">Nome do Aroma</label>
                    <InputText class="w-full mt-3" id="nome" v-model="form.name"
                               :invalid="Boolean(form.errors.name)"/>
                    <InputErrorFeedback :error="form.errors.name"/>
                </div>

                <div class="p-3 2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full ">
                    <label class="font-medium" for="tag_color">Cor da Tag</label>
                    <div class="flex mt-3">
                        <ColorPicker class="input-color-div" id="tag_color" v-model="form.tag_color"/>
                        <InputText class="ml-1 w-full" v-model="form.tag_color"/>
                    </div>
                </div>

                <div class="p-3 2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full ">
                    <label class="font-medium" for="text_color">Cor do Texto</label>
                    <div class="flex mt-3">
                        <ColorPicker class="input-color-div" id="text_color" v-model="form.text_color"/>
                        <InputText class="ml-1 w-full" v-model="form.text_color"/>
                    </div>
                </div>

                <div class="p-3 2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full ">
                    <label class="font-medium">Pré visualização</label>
                    <div class="mt-3 preview-tag">
                        <span class="inline-block border px-2 font-medium mr-1 rounded-lg"
                              :style="'background-color: #' + form.tag_color + ';' + 'color: #' + form.text_color + ';'">{{
                                form.name
                            }}</span>
                    <div class="inline-block font-medium">
                        <div class="flex border rounded">
                            <div class="px-1">{{ form.name }}</div>
                            <div class="" style="width: .8rem"
                                 :style="'background-color: #' + form.tag_color + ';'"></div>
                        </div>
                    </div>
                    </div>
                </div>


            </div>
        </FormCRUD>
    </Dashboard>
</template>

<style>
.input-color-div > input {
    width: 2.5rem;
    height: 100%;
}
.preview-tag {
    box-shadow: 0 0 #0000, 0 0 #0000, 0 1px 2px 0 rgba(18, 18, 23, 0.05);
    font-family: var(--font-family);
    font-feature-settings: var(--font-feature-settings, normal);
    font-size: 1rem;
    color: #334155;
    background: #ffffff;
    padding: 0.5rem 0.75rem;
    border: 1px solid #cbd5e1;
    transition: background-color 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s, outline-color 0.2s;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 6px;
    outline-color: transparent;
}
</style>

