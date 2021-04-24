require('./bootstrap');
import '@mdi/font/css/materialdesignicons.css'
window.Vue = require('vue');
// import Vue from 'vue'
import Vuetify from 'vuetify';
Vue.use(Vuetify, {
    iconfont: 'mdi'
});

Vue.component('vue-primary-card', require('./home/primaryCards') .default);
Vue.component('vue-section-categories', require('./home/sectionCategories') .default);

const app = new Vue({
    el:'#vue-app',
    vuetify: new Vuetify({})
});
