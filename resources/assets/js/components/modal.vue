<template>
    <div class="modal " :class="show" :id="modal_name">
        <div class="modal-background" @click="close"></div>
        <div class="modal-card">
            <header class="modal-card-head" v-if="showHeader">
                <p class="modal-card-title">{{title}}</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body"><slot></slot></section>
            <footer class="modal-card-foot" v-if="showFooter">
                <button class="button is-success">Save changes</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
	export default {
		props: {
            name:{},
			submit:{
				default:false,
            },
			cancel:{
				default:false,
            }
        },
        data: function(){
			return {
				modal_name: this.name,
                active:false
			};
        },
		created() {

			window.events.$on(
				'show-'+this.name, ()=>{
					this.open();
                }
			);
			window.events.$on(
				'close-'+this.name, ()=>{
					this.close();
				}
			);
        },
		computed: {
        	showHeader:function(){
				return !!this.$slots.title;
            },
			showFooter:function(){
				return !!this.$slots.footer;
			},

            show:function(){
				if(this.active) {
					return 'is-active';
				}
            },
            title:function(){
            	return _.startCase(this.modal_name);
            }

        },
        methods:{
            open(){
				this.active = true;
				console.log('showing ' + this.modal_name + ' modal');
				// auto focus
				let input = $('#' + this.modal_name).find('input:first');
				Vue.nextTick(function(){
					//todo blog this
					input.focus();
                });
            },
            close(){
                this.active = false;
            }
        },
        ready(){
			$('#' + this.modal_name).addClass('is-active');
        }
	};
</script>
<style>
    .modal{
        -webkit-animation-duration: .6s; /* Safari 4.0 - 8.0 */
        animation-duration: .6s;
    }
</style>
