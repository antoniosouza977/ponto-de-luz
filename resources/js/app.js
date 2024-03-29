import './bootstrap';
import '../css/app.css';


import * as bootstrap from 'bootstrap'

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import Toast from "vue-toastification";
import VueSelect from "vue-select";
import VueSweetalert2 from 'vue-sweetalert2';
import "vue-toastification/dist/index.css";
import 'sweetalert2/dist/sweetalert2.min.css';




const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Toast, {
                transition: "Vue-Toastification__bounce",
                maxToasts: 20,
                newestOnTop: true
            })
            .use(VueSweetalert2)
            .use(ZiggyVue, Ziggy)
            .use(VueSelect)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
