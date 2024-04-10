<script>
import CustomSidebar from '@/Components/Admin/Dashboard/CustomSidebar.vue'

export default {
    components: { CustomSidebar },
    data() {
        return {
            openSidebar: true,
            modalSideBar: false,
        }
    },
    methods: {
        toggleSidebar() {
            if (window.innerWidth < 1000)  return this.modalSideBar = !this.modalSideBar;

            this.openSidebar = !this.openSidebar
        }
    }

}
</script>

<template>
    <div class="w-full h-screen flex">
        <CustomSidebar :dataOpenSideBar="openSidebar" :toggleSidebar="toggleSidebar" :modalSideBar="modalSideBar"/>
        <div class="w-full h-screen p-3">
            <Button class="ml-3 my-0 hover:bg-green-400 hover:text-white" icon="pi pi-bars" @click.prevent="toggleSidebar" rounded outlined/>
            <div class="w-full p-6">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

