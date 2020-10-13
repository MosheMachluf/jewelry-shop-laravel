@extends('cms.cms_master')
@section('cms_content')

<h2 class="ui horizontal divider header cms-delete-title">האם אתה בטוח שברצונך למחוק קטגוריה זו?</h2>

<form class="ui form aligned center" action="{{ url("cms/categories/$id") }}" method="POST">
    @csrf
    @method('DELETE')
    <a href="{{ url('cms/categories') }}" class="ui basic button">בטל</a>
    <button class="ui red button" type="submit" name="submit">מחק</button>
</form>

@endsection
