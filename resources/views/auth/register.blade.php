@extends('layouts.app')

@section('content')
    <div class="wrapper-login-form fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Регистрация </h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form class="form-group" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <input type="text" id="name" class="fadeIn second" name="name" placeholder="Име"  value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <input type="email" id="email" class="fadeIn second" name="email" placeholder="Е-мейл" value="{{ old('email') }}" required>
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

                <input type="password" id="password-confirm" class="fadeIn third" name="password_confirmation" placeholder="Повтори Парола" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <input id="confirm_condition" type="checkbox" class="" name="" required="required" oninvalid="this.setCustomValidity('За да продължите, моля кликнете върху отметката')" oninput="setCustomValidity('')">
                    Ние имаме нужда от Вашето съгласие, за да обработваме личните Ви данни в съответствие с новия Регламент! Моля прочетете нашата
                    <br/>
                    <a href="/personal_data">Политика за защита на лични данни!</a>
                </div>

                <div class="form-group">
                    <input id="use_condition" type="checkbox" class="" name="" required="required" oninvalid="this.setCustomValidity('За да продължите, моля кликнете върху отметката')" oninput="setCustomValidity('')">
                    <a href="/terms_of_use">Приемам условията за ползване</a>
                </div>

                <input type="submit" class="fadeIn fourth" value="Регистрация">
            </form>
        </div>
    </div>
@endsection