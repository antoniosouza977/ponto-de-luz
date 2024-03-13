<script>
import Header from "@/Components/Admin/Header.vue";
import SideBar from "@/Components/Admin/SideBar.vue";
import Content from "@/Components/Admin/Content.vue";
import EventosGlobais from "@/Components/Admin/EventosGlobais.vue";

export default {
    name: "Dashboard",
    components: {
        EventosGlobais,
        Header,
        SideBar,
        Content
    },
    methods: {

    }
}
</script>

<template>

    <EventosGlobais>
        <div id="pageBody">
            <div id="wrapper">

                <SideBar></SideBar>

                <Content></Content>

            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a></div>

    </EventosGlobais>

</template>
