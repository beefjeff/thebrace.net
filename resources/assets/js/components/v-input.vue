<template>
    <div class="field">
        <label v-show="label != undefined" :for="id" class="label">{{label}}</label>
        <div class="control">
            <slot></slot>
            <!--<textarea v-show="textarea" :title="label" :name="input_name" class="input" :id="id" :type="type" v-model="internalValue"></textarea>-->
            <!--<input v-show="!textarea" :title="label" :name="input_name" class="input" :id="id" :type="type" v-model="internalValue">-->
        </div>
    </div>
</template>

<script>
	export default {
		props: {
			label:{

            },
			textarea:{
				default:false,
            },
			name:{},
			modeling:{},
			value:{},
            type:{
				default:'text'
            },

        },
        data(){
			return {
				label: _.startCase(this.name),
//                input_type: this.type,
				internalValue: '',
				input_name: _.snakeCase(this.name),
			};
        },
        computed:{
        	id:function(){
				let res = '';
        		if(this.modeling) {
					res = this.modeling + '-';
				}
				return _.kebabCase(res + this.name);
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
