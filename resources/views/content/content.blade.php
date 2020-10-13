@extends('master')
@section('main_content')

<div class="page-header bb-style text-style">
    <h1>{{  str_replace('Mosh\'s Jewelry | ', '', $title) }}</h1>
</div>

<div class="ui container">
    @foreach ($contents as $content)
    <section class="section">
        <h2>{{ $content->title }}</h2>
        <p>{!! $content->article !!}</p>
    </section>
    @endforeach
</div>

@endsection
