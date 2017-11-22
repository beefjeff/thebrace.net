@extends('layouts.master')
@section('content')
    <admin-page
            :user_data="{{$user_data}}"
            {{--:resume="{{$resume}}"--}}



    ></admin-page>
@endsection