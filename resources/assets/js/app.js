require('./bootstrap');
import router from './routes';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('modal', require('./components/modal.vue'));
Vue.component('sidebar', require('./components/sidebar.vue'));
Vue.component('flash', require('./components/Flash.vue'));
Vue.component('show-modal', require('./components/ShowModal.vue'));


new Vue({
	el: '#app',
	router,
	methods: {
		sendMessage: function () {
			console.log(this.$refs);
		}
	},
	data:{

	}
});

window.flash = function (data) {
	window.events.$emit('flash', data);
};