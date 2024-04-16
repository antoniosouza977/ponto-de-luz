<script>
import {Link} from "@inertiajs/vue3";
import LogoutButton from "@/Components/Auth/LogoutButton.vue";

export default {
    name: "Header",
    components: {LogoutButton, Link},
    props: ['product_types'],
    data() {
        return {
            items: this.getCategoriesForMenu()
        }
    },
    methods: {
        getCategoriesForMenu() {
            const items_menu_list = [];
            const items_df = [
                {
                    label: 'Sobre nós'
                },
                {
                    label: 'Contatos'
                }
            ]

            this.product_types.forEach(type => {
                let menu_item = {}
                menu_item.label = type.name;
                menu_item.items = []

                type.categories.forEach(category => {
                    menu_item.items.push({
                        label: category.name,
                    })
                })

                items_menu_list.push(menu_item)
            })

            items_menu_list.push(...items_df)

            return items_menu_list
        }
    }
}
</script>

<template>
    <Menubar class="h-20 border-none rounded-none w-full sticky top-0 z-50" :model="items">
        <template #start>
            <div class="flex items-center justify-center mx-6">
                <p class="text-lg font-medium">Ponto de Luz</p>
            </div>
        </template>
        <template #item="{ item, props, hasSubmenu, root }">
            <a v-ripple class="flex align-items-center font-medium" v-bind="props.action">
                <!--                <span :class="item.icon"/>-->
                <span class="ml-2">{{ item.label }}</span>
                <Badge v-if="item.badge" :class="{ 'ml-auto': !root, 'ml-2': root }" :value="item.badge"/>
                <span v-if="item.shortcut" class="ml-auto border-1 surface-border border-round surface-100 text-xs p-1">{{
                        item.shortcut
                    }}</span>
                <i v-if="hasSubmenu"
                   :class="['pi pi-angle-down', { 'pi-angle-down ml-2': root, 'pi-angle-right ml-auto': !root }]"></i>
            </a>
        </template>
        <template #end>
            <div class="flex align-items-center gap-2">
                <Link v-if="!this.$page.props.auth.user" :href="route('login')">
                    <Button label="Login" severity="secondary" text/>
                </Link>
                <Link v-else :href="route('dashboard')">
                    <Button label="Dashboard" severity="secondary" text/>
                </Link>
            </div>
        </template>
    </Menubar>
</template>

<style scoped>
</style>

