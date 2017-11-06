<footer class="footer">
	<div class="container">
		Copyright {{ date('Y') }} | Ethan Brace |

		@guest
			<a class="nav-link d-inline" href="{{ route('login') }}">Login</a>
		@else
			<a class="nav-link d-inline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-footer').submit();">
				Logout
			</a>
			<form id="logout-form-footer" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		@endguest
	</div>
</footer>