@extends('layouts.app')

@section('content')
    <div class="wrapper-login-form fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Промяна на парола </h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <input id="email" type="email" class="fadeIn second" name="email" placeholder="Е-мейл" value="{{ $email or old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <input type="password" id="password" class="fadeIn second" name="password" placeholder="Парола" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input id="password-confirm" type="password" class="fadeIn third" name="password_confirmation" placeholder="Повтори Парола" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif

                <input type="submit" class="fadeIn fourth" value="Обновяване">
            </form>
        </div>
    </div>
@endsection