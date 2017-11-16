<template>
    <div class="container">
        <h1>Create Post</h1>
        <hr>
        <div class="columns">

            <div class="column w3-padding">
                <v-input name="title" v-model="post.title"></v-input>
                <v-textarea name="body" v-model="post.body"></v-textarea>
            </div>
            <div class="column">
                <div class="message">
                    <div class="message-header">{{postTitle}}</div>
                    <div class="message-body">{{postBody}}</div>
                </div>
            </div>
        </div>
        <button type="submit" @click="makePost" class="is-primary">Submit</button>
        <!--<button @click="clear" class="is-danger">Clear</button>-->
        <hr>
    </div>
</template>

<script>
	export default {
		data(){
			return {
				post: {
					title: '',
                    body:''
				},
			};
        },
		mounted() {},
        methods:{
			makePost:function(){
                let vm = this;

				axios({
					method: 'post',
					url: '/posts',
                    data: this.post
				}).then(function (res) {
					flash(res.data, 'primary');
				}).catch(function(res){
					console.log(res);
                    flash('There was a problem', 'danger');
                });

            },
            clear:function(){
				this.post.title = '';
				this.post.body = '';
            }
        },
        computed:{
			postTitle:function(){
				if(this.post.title) {
					return this.post.title;
				}else {
                    return 'Title'
				}
            },
            postBody:function(){
				if(this.post.body) {
					return this.post.body;
				}else {
					return 'Body'
				}
            }
        },
		watch:{
			'post.title':function(){
				this.$emit('input', this.post.title);
			},
            'post.body':function(){
				this.$emit('input', this.post.body);
			},
		}
	}
</script>
