<?php
$err_title = $errors->first('title');
$err_url = $errors->first('url');
$err_article = $errors->first('article');
$err_image = $errors->first('image');
?>

@extends('cms.cms_master')
@section('cms_content')

<h1>הוסף קטגוריה</h1>
<div class="ui divider"></div>

<form class="ui form" action="{{ url('cms/categories') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="field {{ $err_title ? 'error' : null }}">
        <label for="title-field">כותרת</label>
        <input type="text" name="title" id="title-field" placeholder="כותרת" value="{{ old('title') }}">
        <span class="text-danger">{{ $err_title }}</span>
    </div>
    <div class="field {{ $err_url ? 'error' : null }}">
        <label for="url-field">כתובת הקטגוריה ( Url )</label>
        <small>תווים מורשים: אותיות קטנות באנגלית ומקפים (-)</small>
        <input type="text" name="url" id="url-field" class="to-permalink" placeholder="כתובת הקטגוריה ( Url )"
            value="{{ old('url') }}">
        <span class="text-danger">{{ $err_url }}</span>
    </div>
    <div class="field {{ $err_article ? 'error' : null }}">
        <label for="article-field">תוכן הקטגוריה</label>
        <textarea name="article" id="article-field">{{ old('article') }}</textarea>
        <span class="text-danger">{{ $err_article }}</span>
    </div>

    <div class="field {{ $err_image ? 'error' : null }}">
        <label for="image-field">העלאת תמונה</label>
        <input type="file" name="image" id="image-field" value="{{ old('image') }}" placeholder="בחר קובץ">
        <span class="text-danger">{{ $err_image }}</span>
    </div>

    <a href="{{ url('cms/categories') }}" class="ui button">חזור</a>
    <button class="ui primary button" type="submit" name="submit">הוסף</button>
</form>

@endsection
