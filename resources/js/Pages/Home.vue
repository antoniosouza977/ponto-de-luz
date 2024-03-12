<script>
import Header from "@/Components/Header.vue";
import SliderHome from "@/Components/SliderHome.vue";
import Shop from "@/Components/Shop.vue";
import WhySection from "@/Components/WhySection.vue";
import Contact from "@/Components/Contact.vue";
import ClientSection from "@/Components/ClientSection.vue";
import Info from "@/Components/Info.vue";

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

