@extends('layouts.master')

@section('content')
	<div class="row m-5 " id="home">
		<div id="sidebar " class="card col-2 bg-dark">
			<div class="card-body ">
				<ul class="nav">
					<router-link to="/">router link</router-link>
					<li class="btn nav-item">
						<a class="nav-link" href="#">New Post</a>
					</li>
					<li class="btn nav-item">
						<a class="nav-link" href="#">Something else </a>
					</li>

				</ul>
			</div>
		</div>

		<div class="col">
			<router-view>

				<div  class="card">
					<div class="card-header">
						Hey You. Welcome back.
					</div>
					<div class="card-body">
					</div>
				</div>
			</router-view>
		</div>

	</div>


@endsection
