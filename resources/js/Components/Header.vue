<script>
import {Link} from "@inertiajs/vue3";
import LogoutButton from "@/Components/Auth/LogoutButton.vue";
export default {
    name: "Header",
    components: {LogoutButton, Link}
}
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light my-3 rounded-top-4">
        <a class="navbar-brand" href="#">Ponto de Luz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ação</a>
                        <a class="dropdown-item" href="#">Outra ação</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Algo mais aqui</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link disabled" href="#">Desativado</a>-->
<!--                </li>-->
            </ul>
            <div class="d-flex flex-wrap">
<!--                <form class="form-inline my-2 my-lg-0 col-lg-6">-->
<!--                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">-->
<!--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>-->
<!--                </form>-->
                <ul v-if="$page.props.auth.user" class="navbar-nav mr-5" >
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $page.props.auth.user.name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <Link v-if="$page.props.auth.user.is_admin" class="dropdown-item" :href="route('dashboard')">Dashboard</Link>
                            <a class="dropdown-item" href="#">Outra ação</a>
                            <div class="dropdown-divider"></div>
                            <LogoutButton/>
                        </div>
                    </li>
                </ul>
                <Link class="mr-5" v-else :href="route('login')">
                    <span>Login</span>
                </Link>
            </div>
        </div>
    </nav>
<!--    <header class="header_section">-->
<!--        <nav class="navbar navbar-expand-lg custom_nav-container ">-->
<!--            <a class="navbar-brand" href="index.html">-->
<!--          <span>-->
<!--            Giftos-->
<!--          </span>-->
<!--            </a>-->
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"-->
<!--                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class=""></span>-->
<!--            </button>-->

<!--            <div class="collapse navbar-collapse d-flex w-100" id="navbarSupportedContent">-->
<!--                <div>-->
<!--                    <ul class="navbar-nav border">-->
<!--                        <li class="nav-item active">-->
<!--                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="shop.html">-->
<!--                                Shop-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="why.html">-->
<!--                                Why Us-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="testimonial.html">-->
<!--                                Testimonial-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="contact.html">Contact Us</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="user_option">-->
<!--                    <form class="form-inline ">-->
<!--                        <button class="btn nav_search-btn" type="submit">-->
<!--                            <i class="fa fa-search" aria-hidden="true"></i>-->
<!--                        </button>-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="border">-->
<!--                    <Link :href="route('auth.login.get')">-->
<!--                        <i class="fa fa-user" aria-hidden="true"></i>-->
<!--                        <span>Login</span>-->
<!--                    </Link>-->
<!--                    <Link href="/admin">-->
<!--                        <i class="fa fa-user" aria-hidden="true"></i>-->
<!--                        <span>Admin</span>-->
<!--                    </Link>-->

<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->
<!--    </header>-->
</template>

