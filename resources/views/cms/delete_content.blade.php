@extends('cms.cms_master')
@section('cms_content')

<h2 class="ui horizontal divider header cms-delete-title">האם אתה בטוח שברצונך למחוק תוכן זה?</h2>

<form class="ui form aligned center" action="{{ url("cms/contents/$id") }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a href="{{ url('cms/contents') }}" class="ui button">בטל</a>
    <button class="ui red button" type="submit" name="submit">מחק</button>
</form>

@endsection
