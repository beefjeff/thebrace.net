import vue from "vue";
// import BootstrapVue from 'bootstrap-vue';
// import VueRouter from 'vue-router';
import lodash from "lodash";
// import VeeValidate from 'vee-validate';

window.Vue = vue;
window._ = lodash;
// Vue.use(VeeValidate);
// Vue.use(VueRouter);
// Vue.use(vueFocus);

try {
	window.$ = window.jQuery = require('jquery');
	// window.Popper = window.jQuery = require('popper.js');

	// require('bootstrap');
} catch (e) {
}
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
