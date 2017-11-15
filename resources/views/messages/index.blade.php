@extends('layouts.master')

@section('content')
	<div id="messages-page" class="container">

		@foreach($messages as $message)
			<article class="message">
				<div class="message-header">
					<p>{{ $message->name }} | {{$message->email}}</p>
					<button class="delete" aria-label="delete" @click="deleteMessage({{$message->id}})"></button>
				</div>
				<div class="message-body">{{ $message->message }}</div>
			</article>



		@endforeach
	</div>
@endsection