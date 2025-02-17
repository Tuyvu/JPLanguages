import { createApp } from 'vue'
import {createBootstrap} from 'bootstrap-vue-next'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-next/dist/bootstrap-vue-next.css'

import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import router from './router/index'
import App from './App.vue'

const app = createApp(App);
app.use(router);
app.use(createBootstrap());
app.mount('#app');
