<template>
    <div v-show="show">
        <article class="alert-flash message is-small animated bounceInDown " :class="message_type_class">
            <div class="message-header" v-if="hasHeader">
                <p>{{ title }}</p>
                <button class="delete is-small" aria-label="delete"></button>
            </div>
            <div class="message-body">{{body}}</div>
        </article>
    </div>
</template>

<script>
    import toastr from 'toastr';
	export default {
		props:{} ,

		data() {
			return {
				instance:{

                },
				title:'',
				body: '',
				show: false,
				hasHeader: false,
				type: '',
			};
		},

		created() {
			window.events.$on('flash',
                (message, type) => this.flash(message, type));
		},

		methods: {
			flash(message,type) {
				this.type = type;
				this.body = message;
				this.show = true;
				console.log(this.type);

				console.log(this.message_type_class);
				this.hide();
			},

			hide() {
				setTimeout(() => {
					this.show = false;
				}, 3000);
			}
		},
        computed:{
			message_type_class:function(){
				return 'is-' + this.type;
            }
        }
	};
</script>

<style>
    .alert-flash {
        box-shadow: 0 20px 26px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        position: fixed;
        left: 25px;
        bottom: 25px;
        max-width: 300px;
        z-index: 3;
    }
</style>
