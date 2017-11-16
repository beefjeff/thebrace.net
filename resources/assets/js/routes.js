import VueRouter from 'vue-router';

let routes = [
	{
		path: '/admin',
		component: require('./views/adminPage.vue')
	},
	{
		path: '/admin/messages',
		component:require('./views/messages.vue')

	},
	{
		path: '/admin/newPost',
		component:require('./views/newPost.vue')

	}
];
export default new VueRouter({
	routes,
	mode:'history'
});