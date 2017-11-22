<nav class="navbar is-dark is-fixed-top animated ">
	<div class="navbar-brand">
		<a class="navbar-item" href="{{route('resume')}}">{{'<Ethan Brace/>'}}</a>
		<div id="nav-burger" class="navbar-burger burger" @click="toggleNavMenu">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

	<div id="navMenu" class="navbar-menu">
		<div  class="navbar-start">
			@auth
				<a class="navbar-item is-primary" href="{{url('/admin/messages')}}">Admin</a>
			@endauth
			<a class="navbar-item" href="{{route('resume')}}">Resume</a>
			<a class="navbar-item" href="{{route('blog')}}">musings..</a>
			<a class="navbar-item" href="https://github.com/beefjeff">Github</a>
			{{--<div class="navbar-item has-dropdown is-hoverable">--}}
				{{--<a class="navbar-link" href="#">--}}
					{{--Docs--}}
				{{--</a>--}}
				{{--<div class="navbar-dropdown is-boxed">--}}
					{{--<a class="navbar-item" href="/documentation/overview/start/">--}}
						{{--Overview--}}
					{{--</a>--}}
					{{--<a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">--}}
						{{--Modifiers--}}
					{{--</a>--}}
					{{--<a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">--}}
						{{--Columns--}}
					{{--</a>--}}
					{{--<a class="navbar-item" href="https://bulma.io/documentation/layout/container/">--}}
						{{--Layout--}}
					{{--</a>--}}
					{{--<a class="navbar-item" href="https://bulma.io/documentation/form/general/">--}}
						{{--Form--}}
					{{--</a>--}}
					{{--<hr class="navbar-divider">--}}
					{{--<a class="navbar-item" href="https://bulma.io/documentation/elements/box/">--}}
						{{--Elements--}}
					{{--</a>--}}
					{{--<a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">--}}
						{{--Components--}}
					{{--</a>--}}
				{{--</div>--}}
			{{--</div>--}}
		</div>

		<div class="navbar-end">
			{{--<div class="navbar-item">--}}
				{{--<div class="field is-grouped">--}}
					{{--<p class="control">--}}
						{{--<a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">--}}
							{{--<span class="icon">--}}
								{{--<i class="fa fa-twitter"></i>--}}
							{{--</span>--}}
							{{--<span>Tweet</span>--}}
						{{--</a>--}}
					{{--</p>--}}
					{{--<p class="control">--}}
						{{--<a class="button is-primary" href="https://github.com/jgthms/bulma/archive/0.5.1.zip">--}}
							{{--<span class="icon">--}}
								{{--<i class="fa fa-download"></i>--}}
							{{--</span>--}}
							{{--<span>Download</span>--}}
						{{--</a>--}}
					{{--</p>--}}
				{{--</div>--}}
			{{--</div>--}}
		</div>
	</div>
</nav>
