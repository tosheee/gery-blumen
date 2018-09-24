@extends('layouts.app')

@section('content')
    <div class="wrapper-login-form fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Влез </h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="Е-мейл" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Парола">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <input type="submit" class="fadeIn fourth" value="Влез">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{ route('password.request') }}">Забравена парола?</a>
            </div>

            <div id="formFooter">
                <a class="underlineHover" href="{{ route('register') }}">Нямате регистрация?</a>
            </div>

        </div>
    </div>
@endsection