require('./bootstrap');
import router from './routes';
import VueMarkdown from 'vue-markdown';
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


// event bus for component communication
window.events = new Vue();

// |components
Vue.component('modal', require('./components/modal.vue'));
Vue.component('sidebar', require('./components/sidebar.vue'));
Vue.component('flash', require('./components/Flash.vue'));
Vue.component('v-input', require('./components/v-input.vue'));
Vue.component('v-textarea', require('./components/v-textarea.vue'));
Vue.component('show-modal', require('./components/showModal.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('posts', require('./components/posts.vue'));


// imported
Vue.component('vue-markdown', VueMarkdown);

// passport
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));





// |views
Vue.component('admin-page', require('./views/auth/adminPage.vue'));
Vue.component('admin-sidebar', require('./views/auth/Sidebar.vue'));



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
		},
		toggleNavMenu:function(){
			let menu = $('#navMenu');
			let expandBurger = $("#nav-burger");

			menu.toggleClass('is-active','');
			expandBurger.toggleClass('is-active','');

		},
		sortModelSoonestFirst: function(collection){
			return collection.sort(function (a, b) {
				return new Date(b.created_at) - new Date(a.created_at);
			});
		},

	},

	// created(){},

	data:{
		messageForm:{
			name:'test',
			email:'',
			message:''
		}
	},
});


window.flash = function (message, type) {
	// this.$emit('flash', message, type);
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-bottom-left",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut",
	};
	switch (type) {
		case 'success':
		case 'primary':
			toastr.success(message);
			break;
		case 'info':
			toastr.info(message);
			break;
		case 'warning':
		case 'caution':
			toastr.warning(message);
			break;
		case 'error':
		case 'danger':
			toastr.error(message);
			break;
		default:
			toastr.info(message);
			break;
	}
};
// jquery extention to animate elements with animateCss
$.fn.extend({
	animateCss: function (animationName, callback) {
		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		this.addClass('animated ' + animationName).one(animationEnd, function() {
			$(this).removeClass('animated ' + animationName);
			if (callback) {
				callback();
			}
		});
		return this;
	}
});
