import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp,Link} from '@inertiajs/inertia-vue3';
import MainLayout from './Layouts/Main.vue';


import '../css/app.css';
import Navbar from './Component/Navbar.vue';
import Sidebar from './Component/Sidebar.vue';

createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}.vue`)).default;
        page.layout = page.layout || MainLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component('Link', Link)
            .component('Navbar', Navbar)
            .component('Sidebar', Sidebar)
            .use(plugin)
            .mount(el);

    },
});