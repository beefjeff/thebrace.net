import VueRouter from 'vue-router';

let routes = [
	{
		path: '/admin',
		component: require('./views/auth/adminPage.vue')
	},
	{
		path: '/admin/messages',
		component:require('./views/auth/messages.vue')
	},
	{
		path: '/admin/new-post',
		component:require('./views/auth/newPost.vue')
	},
	{
		path: '/admin/resume',
		component:require('./views/auth/editResume.vue')
	},
	{
		path: '/admin/oauth',
		component:require('./views/auth/oauth.vue')
	},
	{
		path: '/admin/job-search',
		component:require('./views/auth/job-search.vue')
	}
];
export default new VueRouter({
	routes,
	mode:'history'
});