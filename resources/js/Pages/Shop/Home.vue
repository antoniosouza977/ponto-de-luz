<script>

import Header from "@/Components/Shop/Header.vue";
import SliderHome from "@/Components/Shop/SliderHome.vue";
import Shop from "@/Components/Shop/Shop.vue";
import Footer from "@/Components/Shop/Footer.vue";

export default {
    name: "Home",
    props: ['product_types', 'products'],
    components: {
        Footer,
        Shop,
        SliderHome,
        Header
    }
}
</script>

<template>
    <div>
        <Header v-bind="$props"></Header>
        <main class="relative">
            <div class="w-full h-14 bg-rosa1 flex items-center justify-center">
                <div class="text-white font-medium antialiased text-lg tracking-wide">Alguma Frase Aqui</div>
            </div>
            <SliderHome/>
            <Shop :products="products"></Shop>
            <Footer/>
        </main>
    </div>
</template>

