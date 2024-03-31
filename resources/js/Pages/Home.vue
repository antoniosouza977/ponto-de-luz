<script>
import Header from "@/Components/Shop/Header.vue";
import SliderHome from "@/Components/Shop/SliderHome.vue";
import Shop from "@/Components/Shop/Shop.vue";
import WhySection from "@/Components/Shop/WhySection.vue";
import Contact from "@/Components/Shop/Contact.vue";
import ClientSection from "@/Components/Shop/ClientSection.vue";
import Info from "@/Components/Shop/Info.vue";

export default {
    name: "Home",
    components: {
        WhySection,
        Header,
        SliderHome,
        Shop,
        Contact,
        ClientSection,
        Info
    }
}
</script>

<template>
    <div>
        <div class="hero_area">

            <Header></Header>

            <SliderHome></SliderHome>

        </div>

        <Shop></Shop>

        <WhySection></WhySection>

        <Contact></Contact>

        <ClientSection></ClientSection>

        <Info></Info>

    </div>
</template>

