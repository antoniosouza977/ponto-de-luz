<script>
import {Link} from "@inertiajs/vue3";
import {isElementInViewport} from "@/helpers.js";

export default {
    name: "Footer",
    components: {Link},
    mounted() {
        const footer = document.querySelector("footer");
        document.addEventListener("scroll", () => {

            if (isElementInViewport(footer)) {
                footer.childNodes.forEach(el => {
                    el.classList.add('el-active');
                })
            } else {
                footer.childNodes.forEach(el => {
                    el.classList.remove('el-active');
                })
            }

        })
    },
}
</script>

<template>
    <footer class="w-full min-h-25 bg-gray-200 p-6 flex flex-wrap">
        <div class="sm:w-3/4 w-full footer-content">
            <div class="text-center font-medium" style="font-size:1.5rem">Ponto de Luz</div>
            <div class="text-center my-3">
                <a target="_blank" href="https://www.instagram.com/pontodeluz67velas/">
                    <i class="pi pi-instagram" style="font-size:1.2rem"></i>
                </a>
            </div>
        </div>
        <div class="flex flex-col footer-content">
            <Link class="mb-3 text-lg hover:text-blue-500" href="#">Pagamentos e Entregas</Link>
            <Link class="mb-3 text-lg hover:text-blue-500" href="#">Devoluções</Link>
        </div>
    </footer>
</template>

<style scoped>

.footer-content {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1s ease, transform 1s ease;
}

.el-active {
    opacity: 1;
    transform: translateY(0);
}

</style>
