<template>
    <div class="field">
        <label :for="id" class="label">{{label}}</label>
        <div class="control">
            <input class="input" :id="id" :type="input_type" v-model="internalValue">
        </div>
        <!--<p class="help is-success">This username is available</p>-->
    </div>
</template>

<script>
	export default {
		props: {
			name:{},
            type:{
				default:'text'
            },
            value:{}

        },
        data(){
			return {
				label: _.startCase(this.name),
                id: this.name,
                input_type: this.type,
                internalValue:''

            }
        },
		created: function(){
			this.internalValue = this.model;
		},
        watch:{
        	'internalValue':function(){
				this.$emit('input', this.internalValue);
            },
        }
	};
</script>
