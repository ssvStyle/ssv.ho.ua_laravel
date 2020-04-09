@extends('layouts/main')

@section('title', 'test')


@section('content')
<div class="container">
	<div class="row fullscreen justify-content-center pt-150">
		<div class="col-md-4 col-centered">
		<form class="form-signin">
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
			<label for="inputEmail" class="sr-only mt-10">Email address</label>
			<input type="email" id="inputEmail" class="form-control mt-15" placeholder="Email address" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control mt-10" placeholder="Password" required>
			<div class="checkbox mb-3 mt-2">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
		</form>
			</div>
	</div>
</div>

@endsection