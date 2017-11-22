<template>
    <div>
        <div v-for="post in post_list" class="container">
            <post :post="post"></post>
        </div>
    </div>
</template>

<script>
	export default {
		props: ['posts'],

		mounted() {

		},
        data(){
			return {

            }
        },
        computed:{
			post_list:function() {
				return this.sortPosts(this.posts);
			}
        },
        methods:{
			sortPosts:function(collection){
				return this.$parent.$options.methods.sortModelSoonestFirst(collection);
            },
        }
	};
</script>
