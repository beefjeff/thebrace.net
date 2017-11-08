<template>
   <div>
      <button :data-target="'#'+this.modal_name"  class="btn btn-primary" data-toggle="modal"><slot></slot></button>
   </div>
</template>

<script>
	export default {
		props: ['name'],
        data(){
			return{
	            modal_name: this.name,
            }
        },



		mounted() {}
	};
</script>
