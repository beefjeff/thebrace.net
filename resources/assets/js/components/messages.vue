<template>
    <div id="messages">
        <div v-show="noMessages" class="w3-padding card"><span>No messages yet...</span></div>
        <div v-show="!noMessages" :id="'message-'+message.id" class="message" v-for="message in messages">
            <div class="message-header is-dark">
                <div class="">
                    {{message.name}}
                </div>
                <div>
                    <span class="is-right">{{message.email}}</span>
                </div>
                <button class="delete" aria-label="delete" @click="deleteMessage(message.id)"></button>
            </div>
            <div class="message-body">
                {{message.message}}
            </div>
        </div>
    </div>

</template>

<script>
	export default {
		data(){
			return {
				messages: {},

			};
		},
		methods: {
			deleteMessage: function (id) {
				let element = $("#message-" + id);

				axios.delete('/messages/' + id)
					.then((res) => {
						flash(res.data, 'primary');
						element.remove();
					})
					.catch(res => {
						console.log(res);
						flash(res.statusText, 'danger');
					});


			},
			getMessages:function(){
				let vm = this;
				axios({
                    method:'get',
                    url:'/messages',
                    responseType:'application/json'
                })
					.then(function (res) {
						console.log(res.data);
						vm.messages = res.data;
					});

			}
		},
		mounted:function(){
			this.getMessages();
		},
        computed:{
			noMessages:function(){
				return this.messages.length === 0;
            }
        }
	}
</script>
<style>
    #messages{
        /*width:300px ;*/
    }
</style>