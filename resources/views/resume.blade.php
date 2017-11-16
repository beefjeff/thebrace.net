@extends('layouts.master')

@section('content')
	<div class="" id="resume">
		<div class="is-dark" id="resume-sidebar">
			<div class="">
				<img id="profile-image"  src="{{ asset('images/profile.jpg') }}"  alt="Ethan Brace">
			</div>
			<div class="">
				<hr class="d-none d-md-block">
				<div class="text-light text-center" id="summary">
					<small>
						My desire as a software developer is to
						create intuitive and elegant applications that solve a problem.
						I aim to do so with a <i>beautiful</i> and highly <i>maintainable</i> codebase. <hr>
						If you're looking for someone to add to your team, I am currently looking! If you're looking for a motivated,
						self-disciplied, highly focused and enthusiatic programmer, I would be excited to speak with you! <br><br>
					</small>
						Leave a message and I'll get back to you as soon as possible.
				</div><hr>
				<show-modal name="message-me" class="animated infinite pulse">Message Me</show-modal>
			</div>
		</div>
		<div id="resume-main">
			<div id="skills">

				<h2>Skills</h2><hr>
				<div class="columns">
					<div class="column">
						<h4>Programming</h4>
						<ul>
							<li>PHP</li>
							<ul>
								<li>Laravel</li>
								<li>PhpUnit</li>
								<li>PhpSpec</li>
								<li>Laravel Dusk</li>
							</ul>
							<li>Bash</li>
							<li>MySQL</li>
							<li>HTML + CSS/SASS</li>
							<li>Javascript</li>
							<ul>
								<li>Vue</li>
								<li>jQuery</li>
								<li>AngularJS</li>
							</ul>
							<li>C#</li>
							<li>C++</li>
							<li>Java</li>
							<li>SOLID Principles</li>
							<li>Package Management</li>
							<ul>
								<li>Composer</li>
								<li>NPM</li>

							</ul>
						</ul>
					</div>
					<div class="column">
						<h4>Servers</h4>
						<ul>
							<li>Ubuntu Server</li>
							<li>VPS Experience</li>
							<li>Nginx + Apache</li>
							<li>SSL (letsencrypt)</li>
							<li>SSH</li>
							<li>Cron</li>
						</ul>
						<h4>Tools</h4>
						<ul>
							<li>Vim</li>
							<li>PhpStorm</li>
						</ul>
					</div>
					<div class="column">
						<h4>Other Experiences</h4>
						<ul>
							<li>Customer Relations</li>
							<li>Customer Satisfaction</li>
							<li>Attention to detail</li>
						</ul>
					</div>
				</div>
			</div>

			<h2>Education</h2>
			<hr>
			<div class="columns">
				<div class="column column-date">2018</div>
				<div class="column">
					<h3>Associate of Arts in Programming</h3>
					<h5>Grand Rapids Community College - Grand Rapids MI</h5>
				</div>
			</div>

			<h2>Work History</h2>
			<hr>
			<div class="columns">
				<div class="column column-date">01/2017 <br>-to-<br> Current</div>
				<div class="column">
					<h3>Software Developer</h3>
					<h5>Web Development Contractor</h5>
					<ul>
						<li>Built, tested, and deployed scalable, highly available web applications</li>
						<li>Developed web application authentication system using PHP and MySQL</li>
						<li>Modified Existing code to correct errors and optimize performance</li>
						<li>Upgraded hardware to increase performance</li>
						<li>Maintained web applications to ensure smooth performance</li>
						<li>Managed Digital Ocean VPS</li>
					</ul>
				</div>
			</div>
			<div class="columns">
				<div class="column column-date">04/2013 <br>-to-<br> Current</div>
				<div class="column">
					<h3>Window Cleaning Business</h3>
					<h5>Independent Contractor/Self Employed</h5>
					<ul>
						<li>Resolved customer issues in a clear and straightforward manner</li>
						<li>Demonstrated professionalism and courtesy with customers at all times</li>
						<li>Solved any work related problems or challenges</li>
						<li>Followed up with clients to ensure their satisfaction</li>
						<li>Up-sold products and services to increase company revenue</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<modal name="message-me">
		<form>
			<v-input name="name" v-model="messageForm.name"></v-input>
			<v-input name="email" type="email" v-model="messageForm.email"></v-input>
			<v-textarea name="message" v-model="messageForm.message"></v-textarea>
			<button type="submit" class="is-dark" @click.prevent="sendMessage">Submit</button>
		</form>
	</modal>
@endsection