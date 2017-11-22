<template>
    <div class="container">

        <div v-if="!user.resume">
            <button @click="createResume">Create Resume</button>
        </div>
        <div v-if="user.resume">
            <div class="tabs is-toggle is-fullwidth is-large">
                <ul>
                    <li class="is-active" @click="show($event)">
                        <a>
                            <span>Summary</span>
                        </a>
                    </li>
                    <li @click="show($event)">
                        <a>
                            <span>Skills</span>
                        </a>
                    </li>
                    <li @click="show($event)">
                        <a>
                            <span>Education</span>
                        </a>
                    </li>
                    <li @click="show($event)">
                        <a>
                            <span>Work History</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div v-show="currentPage == 'summary'">
                <!--<div class="field">-->
                    <!--<label for="hello world" class="label">Hello World</label>-->
                    <!--<div class="control">-->
                        <!--<textarea title="Hello World" name="hello_world" class="input" id="hello world"></textarea>-->
                    <!--</div>-->

                <!--</div>-->
                <!--<div class="control">-->
                <!--</div>-->
                <v-input >
                    <textarea class="input" v-model="user.resume.summary"></textarea>
                </v-input>
                <!--{{summary}}-->
                <vue-markdown :source="resumeSummary"></vue-markdown>
            </div>
            <button class="is-primary is-pulled-right" @click="saveResume">Save</button>

            <div v-show="currentPage == 'skills'">
                <!--{{skills}}-->
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props:['data'],
		data() {
			return {
				user:this.data,
				currentPage: 'summary',


			};
		},
        computed:{
			resumeSummary(){
				return this.user.resume.summary;
            },
			hasResume(){
				return !this.user.resume === null;
			}

        },
		mounted() {

		},
		methods: {

			show: function (event) {
				let tab = $(event.toElement).closest('li');
				tab.addClass('is-active');
				tab.siblings('li.is-active').removeClass('is-active', '');

				this.currentPage = _.lowerCase(tab.text());

			},
            saveResume:function() {
//				this.$parent.$options.methods.updateUser(this.user);
				let vm = this;
				axios.put('/api/resume', this.user.resume)
                    .then(function(res){
					    flash(res.data);
					    console.log(res);
                    })
                    .catch(function(res){
                        flash(res.data);
                        console.log(res);

                    });

			},
            createResume:function(){
				axios.post('/api/resume')
					.then((res) => {
						flash(res.data);
					})
					.catch((res) => {
						flash('Error making your resume');
						console.log(res);
					});
            }
		},
	};
</script>
