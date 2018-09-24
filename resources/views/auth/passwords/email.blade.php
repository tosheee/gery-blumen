@extends('layouts.app')
@section('content')
    <div class="wrapper-login-form fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Възтановяване на парола </h2>

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
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="Е-мейл" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif

                <input type="submit" class="fadeIn fourth" value="Изпрати">
            </form>
        </div>
    </div>
@endsection