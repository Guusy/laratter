@extends('layouts.app')

@section('content')
<?php  //dd($userLogged);
		//dd($conversation->mensajesDeConversacion);
 ?>
<h2>Conversacion con {{ $conversation->users->except(($userLogged->id))->implode('name',', ') }}</h2>
<div class="card">
	@foreach($conversation->mensajesDeConversacion as $message)
	<div class="card-block" style="">

		<p class="card-header">{{ $message->user->name }} dijo...</p>
		<p class="card-body">
			@if( $message->user->username == $userLogged->username)
			Tu : 
			@else
			{{ $conversation->users->except(($userLogged->id))->implode('name',', ') }} : 
			@endif
			{{ $message->message }}
		</p>
		<p class="card-footer" style="margin: 0px;">{{ $message->created_at}}</p>
	</div>
	@endforeach	
</div>


@endsection

