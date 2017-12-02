@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
	<h1>Laratter</h1>
	<nav>
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>
		</ul>
	</nav> 
</div>
<div class="row">
	<div class="col-12">
		<form action="/messages/create" method="post" enctype="multipart/form-data">
			<div class="form-group">
				{{ csrf_field() }}
				<input style="width: 47%;" type="text" name="message" class="form-control @if ($errors->has('message')) is-invalid @endif" placeholder="Que estas pensando ?">
				@if($errors->has('message'))
				@foreach( $errors->get('message') as $error)
				<div class="invalid-feedback">
					{{ $error }}
				</div>
				@endforeach
				@endif

				

			</div>
			<div class="form-group">
				<input  type="file" name="image" class="form-control-file" >
			
			</div>
		</form>
	</div>
</div>
<div class="row">
	@forelse($messages as $message)
	@include('messages.message')
	@empty
	<p>No hay mensajes destacados.</p>
	@endforelse
	
	

	@if(count($messages))
	<div class="mt-2 mx-auto">
		{{ $messages->links('pagination::bootstrap-4') }}
	</div>
	@endif
</div>
@endsection            
