<script>
import {Link} from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3'

export default {
    components: {Link},
    data() {
        return {
            items : [
                {
                    label: 'Loja',
                    icon: 'pi pi-home',
                    command: () => {
                        router.get('/')
                    }
                },
                {
                    label: 'Cadastros',
                    icon: 'pi pi-book',
                    items: [
                        {
                            label: 'Produtos',
                            command: () => {
                                router.get(route('products.index'))
                            }
                        },
                        {
                            label: 'Categorias',
                            command: () => {
                                router.get(route('categories.index'))
                            }
                        },
                        {
                            label: 'Aromas',
                            command: () => {
                                router.get(route('flavors.index'))
                            }
                        },
                        {
                            separator: true
                        },
                        {
                            label: 'Templates',
                            icon: 'pi pi-palette',
                            items: [
                                {
                                    label: 'Apollo',
                                    icon: 'pi pi-palette',
                                    badge: 2
                                },
                                {
                                    label: 'Ultima',
                                    icon: 'pi pi-palette',
                                    badge: 3
                                }
                            ]
                        }
                    ]
                },
                {
                    label: 'Contact',
                    icon: 'pi pi-envelope',
                    badge: 3
                }
            ],
        }
    }
}


</script>

<template>
        <Menubar :model="items" class="p-3 rounded-t-none border-green-200">
            <template #start>
            </template>
            <template #item="{ item, props, hasSubmenu, root }">
                <a v-ripple class="flex align-items-center" v-bind="props.action">
                    <span :class="item.icon" />
                    <span class="ml-2">{{ item.label }}</span>
                    <Badge v-if="item.badge" :class="{ 'ml-auto': !root, 'ml-2': root }" :value="item.badge" />
                    <span v-if="item.shortcut" class="ml-auto border-1 surface-border border-round surface-100 text-xs p-1">{{ item.shortcut }}</span>
                    <i v-if="hasSubmenu" :class="['pi pi-angle-down', { 'pi-angle-down ml-2': root, 'pi-angle-right ml-auto': !root }]"></i>
                </a>
            </template>
            <template #end>
                <div class="flex align-items-center gap-2">
                    <InputText placeholder="Search" type="text" class="w-8rem sm:w-auto" />
                    <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" shape="circle" />
                </div>
            </template>
        </Menubar>
</template>

