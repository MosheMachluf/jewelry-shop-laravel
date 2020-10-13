@extends('cms.cms_master')
@section('cms_content')


<h1 class="ui horizontal divider header">תפריט ניווט חנות</h1>

<a href="{{ url('cms/menu/create') }}" class="ui button positive">הוסף לינק חדש <i class="add icon"></i></a>

<div class="ui segment shadow mt-2">
    <table class="ui very basic selectable table">
        <thead>
            <tr>
                <th>פעולות</th>
                <th>לינק</th>
                <th>עודכן לאחרונה</th>
                <th>נוצר</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($menu as $item)
            <tr>
                <td>
                    <a href="{{ url("cms/menu/{$item['id']}") }}" class="text-danger" data-tooltip="מחק"
                        data-inverted=""><i class="delete icon"></i></a>
                    <a href="{{ url("cms/menu/{$item['id']}/edit") }}" data-tooltip="ערוך" data-inverted=""><i
                            class="pencil icon"></i></a>
                </td>
                <td><a target="_blank" href="{{ url($item['url']) }}">{{ $item['link'] }}</a></td>
                <td>{{ $item['updated_at'] }}</td>
                <td>{{ $item['created_at'] }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
