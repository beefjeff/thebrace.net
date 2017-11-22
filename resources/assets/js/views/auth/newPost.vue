<template>
    <div class="container" id="makePost">
        <h1>Create Post</h1>
        <hr>
        <div class="columns">

            <div class="column w3-padding">
                <v-input modeling="post" name="title" v-model="post.title" ></v-input>
                <v-input modeling="post" name="body" v-model="post.body" textarea="true"></v-input>
            </div>
            <div class="column">
                <post :post="post" :user="user"></post>
                <!--<div class="message">-->
                    <!--<div class="message-header">{{postTitle}}</div>-->
                    <!--<div class="message-body">-->
                        <!--<vue-markdown :source="postBody"></vue-markdown>-->
                        <!--<div class="foot">Posted by {{user.name}} {{ago}}</div>-->
                    <!--</div>-->
                <!--</div>-->
            </div>
        </div>
        <button type="submit" @click="makePost" class="is-primary">Submit</button>
        <button @click="clear" class="is-danger">Clear</button>
        <hr>
    </div>
</template>

<script>
	export default {
		props: ['user'],
		data() {
			return {
				post: {
					title: '',
					body: '',
                    date: '',
                    user: this.user
				},
			};
		},
		mounted() {
		},
		methods: {
			makePost: function () {
				let vm = this;

				axios.post('/posts', this.post).then(function (res) {
					flash(res.data, 'success');
				}).catch(function (res) {
					console.log(res);
					flash('There was a problem', 'danger');
				});

			},
			clear: function () {
				this.post.title = '';
				this.post.body = '';
				$("#makePost").find(':input').val('');
			},
		},
		computed: {
			postTitle: function () {
				if (this.post.title) {
					return this.post.title;
				} else {
					return 'Title';
				}
			},
			postBody: function () {
				if (this.post.body) {
					return this.post.body;
				} else {
					return 'Body';
				}
			},
            ago:function(){
				return moment().fromNow();
            }
		},
		watch: {
			'post.title': function () {
				this.$emit('input', this.post.title);
			},
			'post.body': function () {
				this.$emit('input', this.post.body);
			},
		},
	};
</script>
<style>
    .foot {
        margin-top:5px;
        font-size: 12px;
        bottom: -10px;

    }
    .message-body {
        padding-bottom: 2px;

    }
</style>
