<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "SidebarDropDown",
    props: {
        title: String,
        icon: String,
        mainRoute: String,
        options: Array
    },
    components: {Link},
    methods: {
        animateArrow() {
            const arrow = document.querySelector(`#arrow-${this.title}`)
            arrow.classList.toggle('rotate-90');
        }
    }
}
</script>

<template>
    <li>
        <a @click.prevent="animateArrow"
            v-ripple
            v-styleclass="{
                                        selector: '@next',
                                        enterClass: 'hidden',
                                        enterActiveClass: 'slidedown',
                                        leaveToClass: 'hidden',
                                        leaveActiveClass: 'slideup'
                                    }"
            class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
        >
            <i :class="'pi ' + icon + ' mr-2'"></i>
            <span class="font-medium w-full flex justify-between"
                 >
                {{ title }}
            </span>
            <i
                :id="'arrow-'+title"
                class="pi pi-chevron-right ml-auto transition-all"
                :class="{'rotate-90' : route().current(mainRoute+'.*')}">

            </i>

        </a>
        <ul class="list-none py-0 pl-3 pr-0 m-0 overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out"
            :class="{'hidden' : !route().current(mainRoute+'.*')}"
        >
            <li v-for="option in options">
                <Link :href="route(option.route)" v-ripple
                      class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                      :class="{'surface-100': route().current() === option.route}"
                >
                    <i class="pi mr-2" style="color: #10B981; font-size: .8rem"
                       :class="{'pi-circle-fill' : route().current() === option.route, 'pi-circle': route().current() !== option.route}"></i>
                    <span :class="{'font-medium': route().current() === option.route}">{{ option.label }}</span>
                </Link>
            </li>
        </ul>
    </li>
</template>

<style scoped>
@import "primeflex/primeflex.css";
</style>
