<script>
import Header from "@/Components/Admin/Dashboard/Header.vue";
import SideBar from "@/Components/Admin/Dashboard/SideBar.vue";
import Body from "@/Components/Admin/Dashboard/Body.vue";

export default {
    name: "Dashboard",
    components: {
        Header,
        SideBar,
        Body
    },
}
</script>

<template>
    <div class="container bg-gray-900 min-h-screen min-w-full">
        <div class="sticky top-0 z-50 px-3">
            <Header></Header>
        </div>
        <div class="p-3 relative">
            <slot></slot>
        </div>

    </div>
    <!--            <SideBar></SideBar>-->

    <!--            <Body>-->
    <!--            <slot></slot>-->
    <!--            </Body>-->


</template>
