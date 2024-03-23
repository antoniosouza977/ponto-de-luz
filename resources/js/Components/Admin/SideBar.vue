<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "SideBar",
    components: {
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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
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

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produtos"
               aria-expanded="true" aria-controls="produtos">
                <i class="fas fa-fw fa-circle"></i>
                <span style="font-size: 15px;">Produtos</span>
            </a>
            <div id="produtos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
<!--                    <h6 class="collapse-header">Custom Components:</h6>-->
                    <Link class="collapse-item" :href="route('products.create')">Novo Produto</Link>

                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categorias"
               aria-expanded="true" aria-controls="categorias">
                <i class="fas fa-fw fa-circle"></i>
                <span style="font-size: 15px;">Categorias</span>
            </a>
            <div id="categorias" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <Link class="collapse-item" :href="route('categories.index')">Lista de Categorias</Link>
                    <Link class="collapse-item" :href="route('categories.create')">Nova Categoria</Link>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tipos"
               aria-expanded="true" aria-controls="tipos">
                <i class="fas fa-fw fa-circle"></i>
                <span style="font-size: 15px;">Tipos de Produtos</span>
            </a>
            <div id="tipos" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <Link class="collapse-item" :href="route('product.types.create')">Novo Tipo</Link>
                    <Link class="collapse-item" :href="route('product.types.index')">Lista de Tipos</Link>
                </div>
            </div>
        </li>

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

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
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
