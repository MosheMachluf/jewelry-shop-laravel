<?php
$err_name = $errors->first('name');
$err_email = $errors->first('email');
$err_password = $errors->first('password');
$err_cpassword = $errors->first('password_confirmation');
?>

@extends('cms.cms_master')
@section('cms_content')

<h1><i class="add icon"></i> הוסף משתמש</h1>
<div class="ui divider"></div>

<form class="ui form" action="{{ url('cms/users') }}" method="POST" novalidate="novalidate">
    {{ csrf_field() }}

    <div class="field ">
        <label for="name-field">הרשאות</label>
        <select class="ui search dropdown" id="role-field" name="role_id">
            <option value="">בחר הרשאה ...</option>

            @foreach ($user_roles as $role)
            <option class="capitalize" value="{{ $role->id }}" @if(old('role_id')==$role->id) selected='selected'
                @endif>
                {{ $role->title }}
            </option>
            @endforeach

        </select>
        <span class="text-danger"></span>
    </div>

    <div class="field {{ $err_name ? 'error' : null }}">
        <label for="name-field">שם מלא</label>
        <input type="text" name="name" id="name-field" placeholder="שם מלא" value="{{ old('name') }}">
        <span class="text-danger">{{ $err_name }}</span>
    </div>

    <div class="field {{ $err_email ? 'error' : null }}">
        <label for="email-field">אימייל</label>
        <input type="email" name="email" id="email-field" placeholder="אימייל" value="{{ old('email') }}">
        <span class="text-danger">{{ $err_email }}</span>
    </div>

    <div class="field {{ $err_cpassword ? 'error' : null }}">
        <label for="password-field">סיסמה</label>
        <input type="password" name="password" id="password-field" placeholder="******" value="{{ old('password') }}">
        <span class="text-danger">{{ $err_password }}</span>
    </div>

    <div class="field {{ $err_cpassword ? 'error' : null }}">
        <label for="cpassword-field">אימות סיסמה</label>
        <input type="password" name="password_confirmation" id="cpassword-field" placeholder="******"
            value="{{ old('password_confirmation') }}">
        <span class="text-danger">{{ $err_cpassword }}</span>
    </div>

    <a href="{{ url('cms/users') }}" class="ui button">חזור</a>
    <button class="ui primary button" type="submit" name="submit">הוסף</button>
</form>

@endsection
