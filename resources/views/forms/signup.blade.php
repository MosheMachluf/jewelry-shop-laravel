@extends('master')
@section('main_content')

<div class="ui container">
    <section class="section">
        <h1 class="ui icon header page-header-icon">
            <i class="circular lock icon"></i>
            <div class="content">
                הרשמה
                <p class="sub header">
                    כבר רשום?
                    <a href="{{ url('user/signin') }}">התחבר</a>
                </p>
            </div>
        </h1>

        <div class="row">
            <form class="ui form" method="POST" action="">
                @csrf
                <div class="field">
                    <label for="name" class="hide">שם מלא</label>
                    <input type="text" name="name" id="name" placeholder="שם מלא" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="email" class="hide">אימייל</label>
                    <input type="text" name="email" id="email" placeholder="אימייל" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="password" class="hide">סיסמה</label>
                    <input type="password" name="password" id="password" placeholder="סיסמה">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="password-confirmation" class="hide">אימות סיסמה</label>
                    <input type="password" name="password_confirmation" id="password-confirmation"
                        placeholder="אימות סיסמה">
                </div>
                <button class="ui button primary left floated" type="submit" name="submit">הרשם</button>
            </form>
        </div>
    </section>
</div>

@endsection
