<?php
$err_title = $errors->first('title');
$err_url = $errors->first('url');
$err_article = $errors->first('article');
$err_image = $errors->first('image');
?>

@extends('cms.cms_master')
@section('cms_content')

<h1>ערוך קטגוריה</h1>
<div class="ui divider"></div>

<form class="ui form" action="{{ url("cms/categories/{$category['id']}") }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="field {{ $err_title ? 'error' : null }}">
        <label for="title-field">כותרת</label>
        <input type="text" name="title" id="title-field" class="url-field"
            value="{{ old('title') ?? $category['title'] }}">
        <span class="text-danger">{{ $err_title }}</span>
    </div>
    <div class="field {{ $err_url ? 'error' : null }}">
        <label for="url-field">כתובת הקטגוריה ( Url )</label>
        <small>תווים מורשים: אותיות קטנות באנגלית ומקפים (-)</small>
        <input type="text" name="url" id="url-field" class="to-permalink" value="{{ old('url') ?? $category['url'] }}">
        <span class="text-danger">{{ $err_url }}</span>
    </div>
    <div class="field {{ $err_article ? 'error' : null }}">
        <label for="article-field">תוכן הקטגוריה</label>
        <textarea name="article" id="article-field">{{ old('article') ?? $category['article'] }}</textarea>
        <span class="text-danger">{{ $err_article }}</span>
    </div>

    <div class="field {{ $err_image ? 'error' : null }}">
        <img src="{{ asset("images/{$category['image']}")}}" width="100" alt="">
        <label for="image-field">העלאת תמונה</label>
        <input type="file" name="image" id="image-field" value="{{ old('article') }}">
        <span class="text-danger">{{ $err_image }}</span>
    </div>

    <a href="{{ url('cms/categories') }}" class="ui button">חזור</a>
    <button class="ui primary button" type="submit" name="submit">שמור</button>
</form>

@endsection
