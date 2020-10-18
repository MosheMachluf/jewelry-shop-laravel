<?php
$err_link = $errors->first('link');
$err_title = $errors->first('title');
$err_url = $errors->first('url');
?>

@extends('cms.cms_master')
@section('cms_content')

<h1>הוסף לינק</h1>
<div class="ui divider"></div>

<form class="ui form" action="{{ url('cms/menu') }}" method="POST">
    {{ csrf_field() }}
    <div class="field {{ $err_link ? 'error' : null }}">
        <label for="link-field">לינק</label>
        <input type="text" name="link" id="link-field" value="{{ old('link') }}">
        <span class="text-danger">{{ $err_link }}</span>
    </div>
    <div class="field {{ $err_title ? 'error' : null }}">
        <label for="title-field">כותרת</label>
        <input type="text" name="title" id="title-field" value="{{ old('title') }}">
        <span class="text-danger">{{ $err_title }}</span>
    </div>
    <div class="field {{ $err_url ? 'error' : null }}">
        <label for="url-field">כתובת הדף ( Url )</label>
        <input type="text" name="url" id="url-field" class="to-permalink" value="{{ old('url') }}">
        <span class="text-danger">{{ $err_url }}</span>
        <small>תווים מורשים: אותיות קטנות באנגלית ומקפים (-)</small>
    </div>

    <a href="{{ url('cms/menu') }}" class="ui button">חזור</a>
    <button class="ui primary button" type="submit" name="submit">הוסף</button>
</form>

@endsection
