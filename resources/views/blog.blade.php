@extends('layouts.master')

@section('content')
    <div class="p-5">
       <div v-for="post in {{$posts}}" class="container">
		   <post :post="post"></post>
       </div>
    </div>
@endsection
