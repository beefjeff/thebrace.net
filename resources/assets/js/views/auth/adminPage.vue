<template>
    <div>
        <div id="admin-view">
            <router-view :data="user"></router-view>
            <!--<vue-markdown>-->
                <!--{{user.resume.summary}}-->
            <!--</vue-markdown>-->
        </div>

        <admin-sidebar></admin-sidebar>
    </div>
</template>

<script>

	export default {
		props:['user_data'],
		created(){
//			this.updateUser();
        },
        data(){
			return {
				user:this.user_data,

			};
        },
        computed:{

        },
        methods: {
			updateUser: function (user) {
				let vm = this;
//				this.user.data = {test:'hello'};
				if(user) this.user = user;

				axios.put('/api/user', this.user).then(function (res) {
					flash(res.data);
					console.log(res);

				}).catch(function (res) {
					flash('There was an error in the server ');
					console.log(res);

				});

			}

		}

	};


</script>
