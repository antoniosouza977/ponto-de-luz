<script>
import {Link} from "@inertiajs/vue3";
import SideBarNavItem from "@/Components/Admin/Dashboard/SideBar/SideBarNavItem.vue";

export default {
    name: "SideBar",
    components: {
        SideBarNavItem,
        Link
    },
    methods: {
        toggleSideBar() {
            $("#pageBody").toggleClass("sidebar-toggled");
            $(".sidebar").toggleClass("toggled");
            if ($(".sidebar").hasClass("toggled")) {
                $('.sidebar .collapse').collapse('hide');
            }
        }
    }
}
</script>

<template>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/public">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <Link class="nav-link" href="/">
                <i class="bi bi-cart fs-6"></i>
                <span class="fs-6">Loja</span>
            </Link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="text-white pl-3 fw-bold fs-6">
            Cadastros
        </div>

        <side-bar-nav-item title="Produtos" id_nav_item="produtos">
            <Link class="collapse-item" :href="route('products.index')">Lista de Produtos</Link>
            <Link class="collapse-item" :href="route('products.create')">Novo Produto</Link>
        </side-bar-nav-item>

        <side-bar-nav-item title="Aromas" id_nav_item="aromas">
            <Link class="collapse-item" :href="route('flavors.create')">Novo Aroma</Link>
            <Link class="collapse-item" :href="route('flavors.index')">Lista de Aromas</Link>
        </side-bar-nav-item>

        <side-bar-nav-item title="Categorias" id_nav_item="categorias">
            <Link class="collapse-item" :href="route('categories.index')">Lista de Categorias</Link>
            <Link class="collapse-item" :href="route('categories.create')">Nova Categoria</Link>
        </side-bar-nav-item>

        <side-bar-nav-item title="Tipos de Produtos" id_nav_item="tipos_produtos">
            <Link class="collapse-item" :href="route('product.types.create')">Novo Tipo</Link>
            <Link class="collapse-item" :href="route('product.types.index')">Lista de Tipos</Link>
        </side-bar-nav-item>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button @click="toggleSideBar" class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
</template>

<style scoped>

</style>
