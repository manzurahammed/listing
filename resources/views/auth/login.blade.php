@extends('layouts.app')

@section('content')

	<div class="m-login__signin">
		<div class="m-login__head">
			<h3 class="m-login__title">
				Sign In To Admin
			</h3>
		</div>
		<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
			<div class="form-group m-form__group">
				<input class="form-control m-input" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
			</div>
			<div class="form-group m-form__group">
				<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" required>
			</div>
			<div class="m-login__form-action">
				<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
					Sign In
				</button>
			</div>
		</form>
	</div>

@endsection
