@extends('cms.cms_master')
@section('cms_content')

<h2 class="ui horizontal divider header cms-delete-title">האם אתה בטוח שברצונך למחוק מוצר זה?</h2>

<form class="ui form aligned center" action="{{ url("cms/products/$id") }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a href="{{ url('cms/products') }}" class="ui button">בטל</a>
    <button class="ui red button" type="submit" name="submit">מחק</button>
</form>

@endsection
