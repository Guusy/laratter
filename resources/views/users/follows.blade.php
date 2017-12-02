@extends('layouts.app')

@section('content')
<h3>{{ $user->name}}</h3>
<ul class="list-unstyled">
	

@foreach($follows as $follow)


<li style="padding: 5px;margin: 10px 0px; color: white;" >
	<img src="{{$follow->avatar}}" style="width: 100px; border-radius: 50%;">

	<a style="    margin-left: 6%;
    font-size: 20px;
    color: black;" href="/profile/{{ $follow->username }}">{{ $follow->username }}</a>
</li>
@endforeach
</ul>
@endsection