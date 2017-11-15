<template>
    <div>
        <button @click="clicked"><slot></slot></button>
    </div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.');
		},
		methods: {
			clicked: function () {
				flash('clicked');
				this.$bus.$emit('specialEvent', {
					msg: 'This message came from the event.',
					alert: 'Alert! Alert! Alert!'
				});
			},
		},
	};
</script>
