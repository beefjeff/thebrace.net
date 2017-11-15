<template>
    <div>
        <admin-sidebar></admin-sidebar>
        <messages></messages>
    </div>
</template>

<script>

	export default {
		created(){
			window.events.$on('view-page')
        }

	};

</script>
<style>
    .card{
        margin:5px;
        width: 300px;
    }
</style>