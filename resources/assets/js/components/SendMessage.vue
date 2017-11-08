<template>
    <div class="modal" :class="this.is_active">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {
				active: false
            }
		},
        methods: {
			is_active:function(){
				if(this.active) {
					return 'is-active';
				}
            }
        },
		mounted() {
			console.log('Component mounted.')
		}
	};
</script>
