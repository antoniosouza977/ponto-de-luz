<script>
import {Link} from "@inertiajs/vue3";


export default {
    name: "Paginator",
    props: ['links'],
    components: {Link},
    methods: {
        getLabel(label) {
            if (label.includes('Previous') || label.includes('Next')) {
                const labels = {
                    "&laquo; Previous": 'Anterior',
                    "Next &raquo;" : 'Próxima'
                }
                return labels[label]
            }

            return label;
        }
    }
}
</script>

<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" :class="{disabled: link.url === null, active: link.active}" v-for="link in links">
               <Link v-if="getLabel(link.label) === 'Anterior'" class="page-link" aria-label="Previous" :href="link.url ? link.url : '#'">
                   <span aria-hidden="true">&laquo;</span>
                   <span class="sr-only">Previous</span>
               </Link>
                <Link v-if="getLabel(link.label) === 'Próxima'" class="page-link" aria-label="Next" :href="link.url ? link.url : '#'">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </Link>
                <Link v-if="!'Anterior Próxima'.includes(getLabel(link.label))" class="page-link" aria-label="Next" :href="link.url ? link.url : '#'">
                    {{ getLabel(link.label) }}
                </Link>
            </li>
        </ul>
    </nav>
</template>
