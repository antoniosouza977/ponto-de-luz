<script>
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";

export default {
    name: "Paginator",
    props: ['links'],
    components: {Link},
    methods: {
        getLabel(label) {
            if (label.includes('Previous') || label.includes('Next')) {
                const labels = {
                    "&laquo; Previous": 'Anterior',
                    "Next &raquo;": 'Próxima'
                }
                return labels[label]
            }

            return label;
        },
        changePage(link) {
            const params = {...route().params}
            const paramsSize = Object.keys(params).length

            if (paramsSize === 1 && route().params.page || paramsSize === 0) return router.get(link.url)

            params.page = this.getPage(link.url)

            return router.get(window.location.pathname, params)
        },
        getPage(url) {
            return url.match(/page=\d+/g)[0].match(/page=(\d+)/)[1];
        }
    }
}
</script>

<template>

    <div class="w-full flex items-center justify-center p-3">
        <template v-for="link in links">
            <Button @click.prevent="changePage(link)" :class="{'bg-slate-300' : link.active}" :disabled="link.url === null" :label="getLabel(link.label)"
                    severity="secondary" rounded/>
        </template>
    </div>

</template>
