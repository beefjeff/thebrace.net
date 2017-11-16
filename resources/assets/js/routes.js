import VueRouter from 'vue-router';

let routes = [
	{
		path: '/admin',
		component: require('./views/adminPage.vue')
	},
	{
		path: '/admin/messages',
		component:require('./components/messages.vue')

	}
];
export default new VueRouter({
	routes,
	mode:'history'
});