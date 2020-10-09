@extends('layouts.app')

@section('content')
<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Register
        </h3>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group m-form__group {{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" placeholder="Name" type="text" class="form-control m-input" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group m-form__group {{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" placeholder="Email" type="email" class="form-control m-input" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group m-form__group {{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" placeholder="Password" type="password" class="form-control m-input" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group m-form__group">
            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="m-login__form-action">
            <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                Register
            </button>
            <a id="m_login_signin_submit" href="{{'/login'}}" class=" m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                Login
            </a>
        </div>
    </form>
</div>

<style>
    .help-block {
        color: #ffbd31;
        font-size: 16px;
        padding-top: 5px;
        display: block;
    }
</style>
@endsection
