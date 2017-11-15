<template>
    <div id="admin-sidebar">
        <ul>
            <li @click="view_messages = true">messages</li>
        </ul>
    </div>
</template>

<script>
	export default {
		data(){
			return {
				view_messages: true
            }
        }
	}
</script>
<style>
   #admin-sidebar{
       top:-10px;
       left: 0;
       bottom: -50px;
       height:100%;
       width:300px;
       padding-right: 35px;
       position: fixed;
       background-color: #363636;
   }
</style>