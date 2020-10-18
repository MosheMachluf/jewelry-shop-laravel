@extends('master')
@section('main_content')

<div class="ui container">

    <section class="section">
        <h1 class="ui icon header page-header-icon">
            <i class="circular lock icon"></i>
            <div class="content">
                התחברות
                <p class="sub header">
                    אין לך חשבון אצלנו?
                    <a href="{{ url('user/signup') }}">צור חשבון</a>
                </p>
            </div>
        </h1>

        <div class="row">
            <form class="ui form" method="POST" action="">
                @csrf
                <div class="field overflow-hidden">
                    <label for="email" class="hide">אימייל</label>
                    <input type="text" name="email" id="email" placeholder="אימייל" value="{{ old('email') }}">
                </div>
                <div class="field overflow-hidden">
                    <label for="password" class="hide">סיסמה</label>
                    <input type="password" name="password" id="password" placeholder="סיסמה">
                </div>

                @if($errors->first())
                <div class="ui red segment shadow text-danger tac">
                    {{ $errors->first() }}
                </div>
                @endif

                <button class="ui primary button left floated" type="submit" name="submit">התחבר</button>
            </form>
        </div>
    </section>
</div>

@endsection
