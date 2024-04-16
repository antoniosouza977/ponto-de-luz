<script>

import {maskCurrency} from "@/helpers.js";

export default {
    name: "Shop",
    methods: {maskCurrency},
    props: ['products']
}
</script>

<template>
    <section class="mt-5 p-3">
        <h1 class="text-center font-bold my-6" style="font-size: 1.8rem; color: var(--rosa1);">Confira nossos produtos
            mais vendidos</h1>
        <div class="flex flex-wrap items-center justify-center p-6">
            <div class="lg:w-1/3 sm:w-1/2 w-full p-3" v-for="product in products" :key="product.id">
                <img :src="'/storage/'+product.images[0].path" class="w-full cursor-pointer" alt=""/>
                <div class="p-3 text-center">
                    <span class="font-medium hover:text-blue-400 cursor-pointer" style="font-size: 1.2rem">{{ product.name }}</span>
                    <div>R$ {{ maskCurrency(product.price) }}</div>
                </div>
            </div>
        </div>
    </section>
</template>

