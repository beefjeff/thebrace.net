@extends('layouts.master')

@section('content')

    <div class="p-5">
		<posts :posts="{{$posts}}"></posts>
		{{--<div v-for="post in {{$posts}}" class="container">--}}
			{{--<div class="message">--}}
				{{--<div class="message-header"></div>--}}
			{{--</div>--}}

		{{--</div>--}}
    </div>
@endsection
