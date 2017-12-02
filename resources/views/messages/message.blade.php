<div class="col-12">
	<div class="row">
		<div class="col-4">
			<img src="{{ $message->user->avatar}}" alt="" style="width: 100px;border-radius: 50%">
			<a href="profile/{{ $message->user->username}}">	{{ $message->user->name}} </a>
		</div>
		<div class="col-8">
			<div>
			{{ $message->content }}
			</div>
			<div>
			<img src="{{$message->image}}" class="img-thumbnail img-fluid" style="width: 200px;" alt="" >
			</div>
			<a href="/messages/{{ $message->id }}">
				Leer Mas
			</a>
		</div>
	</div>
		
		<p class="card-text">
			
			
			

		</p>
		<div class="card-text text-muted float-left">
			{{$message->created_at }}
		</div>
	</div>