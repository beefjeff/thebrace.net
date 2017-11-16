<template>
    <div class="w3-padding">
        <div class="message">
           <div class="message-header">{{title}} <span class="is-left">{{author}}</span><span class="is-right">{{readable_date}}</span></div>
           <div class="message-body">{{body}}</div>
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
				author: this.post.user.name,
			};
        },
        computed:{
        	readable_date:function(){
				return moment.utc(this.date).local().fromNow();
            }

        },



		mounted() {},
	};
</script>
