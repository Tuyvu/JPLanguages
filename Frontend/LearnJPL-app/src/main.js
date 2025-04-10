import { createApp } from 'vue'
import { createPinia } from "pinia";
import './assets/style/global.css'
import './assets/style/letters.css'
import 'bootstrap/dist/css/bootstrap.css'
import VueCalendarHeatmap from 'vue3-calendar-heatmap';
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate';


import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import router from './router/index'
import App from './App.vue'

const app = createApp(App);
const pinia = createPinia();
pinia.use(piniaPluginPersistedstate)
app.use(pinia);
app.use(router);
app.use(VueCalendarHeatmap)
app.mount('#app');
