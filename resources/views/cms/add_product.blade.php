<?php
$err_category = $errors->first('category_id');
$err_url = $errors->first('url');
$err_title = $errors->first('title');
$err_article = $errors->first('article');
$err_price = $errors->first('price');
$err_sale_price = $errors->first('sale_price');
$err_image = $errors->first('image');
?>

@extends('cms.cms_master')
@section('cms_content')

<h1>הוסף מוצר</h1>
<div class="ui divider"></div>

<form class="ui form" action="{{ url('cms/products') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="two fields">
        <div class="field {{ $err_title ? 'error' : null }}">
            <label for="title-field">כותרת</label>
            <input type="text" name="title" id="title-field" class="url-field" value="{{ old('title') }}">
            <span class="text-danger">{{ $err_title }}</span>
        </div>

        <div class="field {{ $err_category ? 'error' : null }}">
            <label for="category-field">קטגוריה</label>
            <select class="ui search dropdown" id="category-field" name="category_id">
                <option value="">בחר קטגוריה ...</option>

                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" @if(old('category_id')==$category['id']) selected='selected'
                    @endif>
                    {{ $category['title'] }}</option>
                @endforeach

            </select>
            <span class="text-danger">{{ $err_category }}</span>
        </div>
    </div>

    <div class="three fields">
        <div class="field {{ $err_url ? 'error' : null }}">
            <label for="url-field">כתובת המוצר ( Url )</label>
            <input type="text" name="url" id="url-field" class="to-permalink" value="{{ old('url') }}">
            <small>תווים מורשים: אותיות קטנות באנגלית ומקפים (-)</small>
            <span class="text-danger">{{ $err_url }}</span>
        </div>

        <div class="field {{ $err_price ? 'error' : null }}">
            <label for="price-field">מחיר</label>
            <input type="text" name="price" id="price-field" value="{{ old('price') }}">
            <span class="text-danger">{{ $err_price }}</span>
        </div>

        <div class="field {{ $err_sale_price ? 'error' : null }}">
            <label for="sale-price-field">מחיר מבצע</label>
            <input type="text" name="sale_price" id="sale-price-field" value="{{ old('sale_price') }}">
            <span class="text-danger">{{ $err_sale_price }}</span>
        </div>
    </div>

    <div class="field {{ $err_article ? 'error' : null }}">
        <label for="article-field">תוכן המוצר</label>
        <textarea name="article" id="article-field">{{ old('article') }}</textarea>
        <span class="text-danger">{{ $err_article }}</span>
    </div>

    <div class="field {{ $err_image ? 'error' : null }}">
        <label for="image-field">העלאת תמונה</label>
        <input type="file" name="image" id="image-field">
        <span class="text-danger">{{ $err_image }}</span>
    </div>

    <a href="{{ url('cms/products') }}" class="ui button">חזור</a>
    <button class="ui primary button" type="submit" name="submit">הוסף</button>
</form>

@endsection
