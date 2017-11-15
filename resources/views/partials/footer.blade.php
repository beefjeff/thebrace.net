<footer class="footer is-dark">
	<div class="container">
		<div class=" has-text-centered">
			<p>
				Copyright {{ date('Y') }} | Ethan Brace |

				@guest
					<a href="{{ route('login') }}">Login</a>
				@else
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-footer').submit();">
						Logout
					</a>
					<form id="logout-form-footer" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				@endguest
			</p>
		</div>
	</div>
</footer>