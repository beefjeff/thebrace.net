<template>
    <div>
        <button @click="run"><slot></slot></button>
    </div>
</template>

<script>
	export default {
		props:{
			name:{}
        },
        methods:{
			run(){
				window.events.$emit('show-' + this.name);
            }
        }
	}
</script>
