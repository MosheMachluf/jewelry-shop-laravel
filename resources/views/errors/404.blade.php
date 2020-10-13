<?php
$title = "Mosh's Jewelry | Page Not Found - 404";
$menu = App\Menu::all();
$categories = App\Category::all();
?>

@extends('master')
@section('main_content')
<div class="ui container">
    <section class="section">
        <h1>הדף המבוקש לא נמצא</h1>
        <p>שגיאת 404</p>
        <a href="{{ asset('') }}">
            <i class="arrow circle right icon"></i>
            חזור לדף הבית
        </a>
    </section>
</div>
@endsection
