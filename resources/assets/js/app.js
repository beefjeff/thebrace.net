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

new Vue({
	el: '#app',
	router,
	methods:{
		showMessageModal: function(){
			console.log('hello world');
		}
	}
});

window.flash = function () {
	window.events.$emit('flash', data);
};

window.modal = function () {
	window.events.$emit('modal', data);
};

