require('./bootstrap');

import Routes from './routes'
import tituloPagina from './mixins/tituloPagina'

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/';

window.Vue = require('vue');
Vue.component('principal', require('./components/Principal.vue').default);
Vue.mixin(tituloPagina)


const app = new Vue({
		el: '#app',
		router: Routes
});
