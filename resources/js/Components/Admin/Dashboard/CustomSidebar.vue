<template>
    <div class=" h-screen border-r bg-white shadow" id="side-bar"
         :class="{'side-bar-visible' : dataOpenSideBar , 'side-bar-close' : !dataOpenSideBar}">
        <SideBarMenuOptions :toggleSidebar="toggleSidebar"/>
    </div>
    <Sidebar :visible="modalSideBar">
        <template #container="{closeCallback}">
            <SideBarMenuOptions :toggleSidebar="toggleSidebar"/>
        </template>
    </Sidebar>
</template>

<script>
import SideBarMenuOptions from "@/Components/Admin/Dashboard/SideBarMenuOptions.vue";

export default {
    components: {SideBarMenuOptions},
    props: {
        dataOpenSideBar: Boolean,
        modalSideBar: Boolean,
        toggleSidebar: Function
    },
    mounted() {
        const sideBar = document.querySelector('#side-bar')

        if (window.innerWidth < 1000) {
            sideBar.classList.add('side-bar-close')
        }

        window.addEventListener('resize', (event) => {
            if (window.innerWidth < 1000) {
                sideBar.classList.remove('side-bar-visible')
                sideBar.classList.add('side-bar-close')
            }
            if (window.innerWidth > 1000) {
                sideBar.classList.remove('side-bar-close')
                sideBar.classList.add('side-bar-visible')
            }
        })
    }

}
</script>

<style>

#side-bar {
    overflow: hidden;
    transition: 400ms;
}

.side-bar-visible {
    min-width: 280px !important;
    max-width: 280px !important;
}

.side-bar-close {
    max-width: 0px !important;
    min-width: 0px !important;
}
</style>
