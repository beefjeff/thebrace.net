require('./bootstrap');
import router from './routes';
/**
 * Uncomment below when compiling to production
 */
if (process.env.MIX_APP_ENV === 'production') {
	Vue.config.devtools = false;
	Vue.config.debug = false;
	Vue.config.silent = true;
	console.log('setting Vue config to production');
}else{

	console.log('setting Vue config to dev');
}



window.events = new Vue();
Vue.component('modal', require('./components/modal.vue'));
Vue.component('sidebar', require('./components/sidebar.vue'));
Vue.component('flash', require('./components/Flash.vue'));
Vue.component('v-input', require('./components/v-input.vue'));
Vue.component('v-textarea', require('./components/v-textarea.vue'));
Vue.component('show-modal', require('./components/showModal.vue'));
Vue.component('admin-page', require('./views/adminPage.vue'));
Vue.component('messages', require('./views/messages.vue'));
Vue.component('admin-sidebar', require('./components/adminSidebar.vue'));
Vue.component('newPost', require('./views/newPost.vue'));
Vue.component('post', require('./components/Post.vue'));



new Vue({
	el: '#app',
	router,

	methods: {
		showModal: function(modal_name){
			window.events.$emit('show-'+modal_name);
		},
		hideModal:function(modal_name) {
			window.events.$emit('close-'+modal_name);
		},
		sendMessage: function () {
			this.hideModal('message-me');
			axios.post('/messages', this.messageForm)
				.then(function(response){
					flash(response.data, 'primary');
					console.log(response);
				})
				.catch((response)=>{
					flash('Sorry, I couldn\'t save your message for some reason.. \nTry again later please!');
					console.log(response);
				});
			console.log('sending...');
		},
		moment: function(date){
			return moment(date);
		}
	},

	// created(){},

	data:{
		messageForm:{
			name:'test',
			email:'',
			message:''
		}
	}
});

window.flash = function (message, type) {
	window.events.$emit('flash', message, type);
};
