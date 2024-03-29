<script>
import Header from "@/Components/Admin/Header.vue";
import SideBar from "@/Components/Admin/SideBar.vue";
import Body from "@/Components/Admin/Body.vue";
import Main from "@/Components/Admin/Main.vue";

export default {
    name: "Dashboard",
    components: {
        Main,
        Header,
        SideBar,
        Body
    },
}
</script>

<template>

    <Main>
        <div id="pageBody">
            <div id="wrapper">

                <SideBar></SideBar>

                <Body>
                    <slot></slot>
                </Body>


            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a></div>

    </Main>

</template>
