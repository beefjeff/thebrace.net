<template>
    <div class="modal fade" :id="this.id" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title" v-if="showHeader">
                        <slot name="title"></slot>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>

                <div class="modal-footer" v-if="showFooter">
                    <slot name="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="this.handle">Ok</button>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: {
			header: {
				default: true
            },
            footer: {
				default: true
            },
            button: {
				default: true
            },
            handle:{}
        },
        data: function(){
			return {
				showFooter: this.footer,
                showHeader: this.header,
				showButton: this.button,
                id: this.handle

			};
        },
		created() {
        },
        methods:{
        	send: function(){
				console.log('hello world');
				console.log(this.handle);
            }
        }
	};
</script>
<style>
    /*#modal, #modal-dialog{*/
        /*position: fixed;*/
    /*}*/
    /*#modal-dialog {*/
        /*z-index: 1;*/

    /*}*/
</style>
