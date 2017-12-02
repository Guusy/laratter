@extends('layouts.app')

@section('content')

<form action="/auth/facebook/register" method="POST">
	{{ csrf_field()}}
	<div class="card">
			<div class="card-block">
				<img class="img-thumbnail" src="{{ $userFacebook->avatar}}" alt="">
			</div>
			<div class="card-block">
				<div class="form-group">
					<label for="name" class="form-control-label">
						Nombre:
					</label>
					<input type="text" name="name" value="{{ $userFacebook->name }}"  class="form-control" id="" readonly>
				</div>

				<div class="form-group">
					<label for="email" class="form-control-label">
						Email:
					</label>
					<input type="email" name="email" value="{{ $userFacebook->email }}"  class="form-control" id="" readonly>
				</div>

				<div class="form-group">
					<label for="username" class="form-control-label">
						Nombre de usuario:
					</label>
					<input type="text" name="username" value="{{old('username')}}"  class="form-control" id="" >
				</div>

				<button class="btn btn-primary">
					Registrarse
				</button>

			</div>
		</div>	

</form>

@endsection