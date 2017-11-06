<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<a class="navbar-brand align-content-sm-center" href="{{url('/')}}">
		< Ethan Brace />
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<ul class="navbar-nav mr-auto">
			@auth
				<li class="nav-item">
					<a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
				</li>

				{{--<li class="nav-item">--}}
					{{--<a class="nav-link" href="{{ route('register') }}">Register New User</a>--}}
				{{--</li>--}}
				\|/
			@endauth
			<li class="nav-item">
				<a class="nav-link" href="{{ route('resume') }}">Resume</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ route('blog') }}">Blog</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://bracewindows.com">Business</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://github.com/beefjeff">Github</a>
			</li>
		</ul>
		<ul class="navbar-nav">

			@auth
				<li class="dropdown nav-item">
					<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-right bg-dark" role="menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Logout
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
			@endauth
		</ul>
	</div>
</nav>

{{--<div style="height:56px">--}}
	{{--banner spacing on page--}}
{{--</div>--}}
