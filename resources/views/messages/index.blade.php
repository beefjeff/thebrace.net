@extends('layouts.master')

@section('content')
    @foreach($messages as $message)
		{{ $message->name }}<br>
		{{ $message->email }}<br>
		{{ $message->message }}<br>
	@endforeach
@endsection