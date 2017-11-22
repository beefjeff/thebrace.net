<template>
    <div class="field">
        <label :for="id" class="label">{{label}}</label>
        <div class="control">
            <textarea :title="label" class="input" :id="id" :type="input_type" v-model="internalValue"></textarea>
        </div>
        <!--<p class="help is-success">This username is available</p>-->
    </div>
</template>

<script>
	export default {
		props: {
			name:{},
			modeling:{},
            type:{
				default:'text'
            },
            value:{}

        },
        data(){
			return {
				label: _.startCase(this.name),
                input_type: this.type,
                internalValue:''

            }
        },
        computed:{
        	id:function(){
				return this.modeling + '-' + this.name;
            }
        },
		created: function(){
			this.internalValue = this.model;
		},
        watch:{
        	'internalValue':function(){
				this.$emit('input', this.internalValue);
            }
        }
	};
</script>
