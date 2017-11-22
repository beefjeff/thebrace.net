<template>
    <div class="w3-padding">
        <!--<div class="message">-->
           <!--<div class="message-header">{{title}} <span class="is-left">{{author}}</span><span class="is-right">{{human_date}}</span></div>-->
           <!--<div class="message-body">-->
               <!--<vue-markdown :source="body"></vue-markdown>-->

           <!--</div>-->
        <!--</div>-->

        <div class="message">
            <div class="message-header">{{post.title}}</div>
            <div class="message-body">
                <vue-markdown :source="post.body"></vue-markdown>
                <div class="foot">Posted by {{author}} {{human_date}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
	export default {
		props: ['post'],
        data(){
			return {
				title: this.post.title,
				body: this.post.body,
                date: this.post.created_at,
				author: this.post.username,
			};
        },
        computed:{
        	human_date:function(){
				return moment.utc(this.date).local().fromNow();
            }

        },



		mounted() {},
	};
</script>
<style>
    .message-header{
        font-size: 30px;
    }
</style>
