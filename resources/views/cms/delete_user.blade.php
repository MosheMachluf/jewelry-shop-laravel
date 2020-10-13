@extends('cms.cms_master')
@section('cms_content')
<h1 class="ui horizontal divider header cms-delete-title">האם אתה בטוח שברצונך למחוק משתמש זה?</h1>
<p class="center">מחיקת משתמש תוביל למחיקתו לצמיתות</p>
<form class="ui form aligned center" action="{{ url("cms/users/$id") }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a href="{{ url('cms/users') }}" class="ui button">בטל</a>
    <button class="ui red button" type="submit" name="submit">מחק</button>
</form>

@endsection
