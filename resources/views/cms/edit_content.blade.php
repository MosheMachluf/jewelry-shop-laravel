<?php
$err_menu = $errors->first('menu_id');
$err_title = $errors->first('title');
$err_article = $errors->first('article');
?>

@extends('cms.cms_master')
@section('cms_content')

<h1>ערוך תוכן</h1>
<div class="ui divider"></div>

<form class="ui form" action="{{ url("cms/contents/{$content['id']}") }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="ui form">
        <div class="two fields">
            <div class="field {{ $err_title ? 'error' : null }}">
                <label for="title-field">כותרת הדף</label>
                <input type="text" name="title" id="title-field" value="{{ old('title') ?? $content['title'] }}">
                <span class="text-danger">{{ $err_title }}</span>
            </div>

            <div class="field {{ $err_menu ? 'error' : null }}">
                <label for="page-field">תפריט</label>
                <select class="ui search dropdown" id="page-field" name="menu_id">

                    @foreach ($menu as $item)
                    <option value="{{ old('menu_id') ?? $item['id'] }}" @if($content['menu_id']==$item['id'])
                        selected='selected' @endif>
                        {{ $item['link'] }}
                    </option>
                    @endforeach

                </select>
                <span class="text-danger">{{ $err_menu }}</span>
            </div>

        </div>

        <div class="field {{ $err_article ? 'error' : null }}">
            <label for="article-field">תוכן הדף</label>
            <textarea name="article" id="article-field">{{ old('article') ?? $content['article'] }}</textarea>
            <span class="text-danger">{{ $err_article }}</span>
        </div>

        <a href="{{ url('cms/contents') }}" class="ui button">חזור</a>
        <button class="ui primary button" type="submit" name="submit">עדכן</button>
</form>

@endsection
