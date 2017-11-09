@extends('layouts.master')

@section('content')
	<div class=" row" id="resume">
		<div class="bg-dark row" id="resume-sidebar">
			<div class="col">
				<img id="profile-image"  src="{{ asset('images/profile.jpg') }}"  alt="Ethan Brace">
			</div>
			<div class="col">
				<hr class="d-none d-md-block">
				<div class="text-light text-center" id="summary">
					<small>
						My desire as a software developer is to
						create intuitive and elegant applications that solve a problem.
						I aim to do so with a <i>beautiful</i> and highly <i>maintainable</i> codebase.
						<br><br>
						I have a high attention to detail, am eager to learn, and I LOVE to code.<br>
					</small>
					<strong>
						If you're looking for an addition to your team, I would be glad to speak with you.
					</strong>

				</div>
				{{--<show-modal name="message-modal">Message Me</show-modal>--}}
				{{--<button class="btn btn-primary" data-toggle="modal" data-target="#messageForm">Message Me</button>--}}
			</div>
		</div>
		<div id="resume-main">

			<h2>Skills</h2><hr>
			<div class="row">
				<div class="col">
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
				<div class="col">
					<h4>Servers</h4>
					<ul>
						<li>Ubuntu Server</li>
						<li>VPS Experience</li>
						<li>Nginx + Apache</li>
						<li>SSL (letsencrypt)</li>
						<li>SSH</li>
						<li>Cron</li>
					</ul>
				</div>
				<div class="col">
					<h4>Other Experiences</h4>
					<ul>
						<li>Customer Relations</li>
						<li>Customer Satisfaction</li>
						<li>Attention to detail</li>
					</ul>
				</div>
				<div class="col">
					<h4>Tools</h4>
					<ul>
						<li>Vim</li>
						<li>PhpStorm</li>
					</ul>

				</div>
			</div>

			<h2>Education</h2>
			<hr>
			<div class="row">
				<div class="col-2 col-date">2018</div>
				<div class="col">
					<h3>Associate of Arts in Programming</h3>
					<h5>Grand Rapids Community College - Grand Rapids MI</h5>
				</div>
			</div>

			<h2>Work History</h2>
			<hr>
			<div class="row">
				<div class="col-2 col-date">01/2017 <br>-to-<br> Current</div>
				<div class="col">
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
			<div class="row">
				<div class="col-2 col-date">04/2013 <br>-to-<br> Current</div>
				<div class="col">
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
		{{--<script>--}}
{{--//			new Vue({--}}
{{--//				el: ''--}}
{{--//			});--}}
		{{--</script>--}}
	</div>

	<modal name="message-modal" footer="false" submit="true" cancel="true">
		<template slot="title">Message Me</template>
		<form method="post" action="{{route('messages.store')}}"> {{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name:</label>
				<input name="name" id="message-name">
				<label for="email">Email:</label>
				<input name="email" id="message-email"  type="email">
			</div>
			<label for="message">Message:</label>
			<textarea name="message" id="message-message"></textarea>
			<button @click="sendMessage">Send</button>
			<button>Cancel</button>
		</form>
	</modal>
@endsection