<script>

export default {
    name: "SideBarNavItem",
    props: ['title', 'id_nav_item']
}
</script>

<template>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" :data-target="'#'+id_nav_item"
           aria-expanded="true" :aria-controls="id_nav_item">
            <i class="fas fa-fw fa-circle"></i>
            <span style="font-size: 15px;">{{ title }}</span>
        </a>
        <div :id="id_nav_item" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <slot></slot>
            </div>
        </div>
    </li>
</template>
