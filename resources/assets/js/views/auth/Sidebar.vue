<template>
    <div id="admin-sidebar" class="navbar">
        <ul>
            <li class="navbar-item">
                <router-link class="" to="/admin/messages">Messages</router-link>
            </li>
            <li class="navbar-item">
                <router-link class="" to="/admin/new-post">New Post</router-link>
            </li>
            <li class="navbar-item">
                <router-link to="/admin/resume">Edit Resume</router-link>
            </li>
            <li class="navbar-item">
                <router-link to="/admin/oauth">oauth</router-link>
            </li>
            <!--<router-link to="/admin/messages"></router-link>-->
            <!--<li @click="view_messages = true">messages</li>-->
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
