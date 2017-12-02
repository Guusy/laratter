@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-4">
		<div style="background: #d6dbde; padding: 5px;">
		<div>
			<img src="{{$user->avatar}}" class="img-fluid" alt="">
		</div>
		<h4>{{$user->username}}</h4>
		<h6> {{ $user->email}}</h6>
		<p>
			<a href="/{{$user->username}}/follows" class="btn-link">
				Sigue a <span class="badge">{{ $user->follows->count()}}</span>

			</a>
		</p>
		<p>
			<a href="/{{$user->username}}/followers" class="btn-link">
				Seguidores <span class="badge"> {{ $user->followers->count()}}</span>
			</a>
		</p>

		@if(Auth::check())
		@if(Gate::allows('dms',$user))
		<form action="/{{ $user->username}}/dms" method="POST">
			{{ csrf_field()}}
			<input type="text" name="message" class="form-control" id="">
			<input type="submit" class="btn btn-success" value="Enviar DM">
		</form>
		@endif

		@if(Auth::user()->isFollowing($user))
		<form action="/{{ $user->username }}/unfollow" method="POST">
			{{ csrf_field()}}	
			@if(session('success'))
			<span class="text-success">{{ session('success')}} </span>
			@endif
			<button class="btn btn-danger">
				Dejar de seguir
			</button>
		</form>


		@else
		<form action="/{{ $user->username }}/follow" method="POST">
			{{ csrf_field()}}	
			@if(session('success'))
			<span class="text-success">{{ session('success')}} </span>
			@endif
			<button class="btn btn-primary">
				Follow
			</button>
		</form>

		@endif

		@endif
	</div>
	</div>
	<div class="col-8">
		<div class="row">
			@forelse ($user->messages as $message)
			@include('messages.message')
			@empty
			<div class="col-12 text-center">
				No hay publicaciones !
			</div>
			@endforelse

		</div>
	</div>
</div>
@endsection