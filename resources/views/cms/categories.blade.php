@extends('cms.cms_master')
@section('cms_content')

<h1 class="ui horizontal divider header">קטגוריות</h1>


<a href="{{ url('cms/categories/create') }}" class="ui button positive">הוסף קטגוריה חדשה <i class="add icon"></i></a>

<div class="ui segment shadow mt-2">
    <table class="ui very basic selectable table">
        <thead>
            <tr>
                <th>פעולות</th>
                <th>קטגוריה</th>
                <th>מס' מוצרים</th>
                <th>עודכן לאחרונה</th>
                <th>נוצר</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
            <tr>
                <td>
                    <a href=" {{ url("cms/categories/{$category['id']}") }}" class="text-danger" data-tooltip="מחק"
                        data-inverted="">
                        <i class="delete icon"></i>
                    </a>
                    <a href="{{ url("cms/categories/{$category['id']}/edit") }}" data-tooltip="ערוך" data-inverted="">
                        <i class="pencil icon"></i>
                    </a>
                </td>
                <td>
                    <a target="_blank" href="{{ url("images/{$category['image']}") }}">
                        <img src="{{ asset("images/{$category['image']}") }}" alt="{{ $category['title'] }}" width="50">
                    </a>
                    <a target="_blank" href="{{ url("shop/{$category['url']}") }}">{{ $category['title'] }}</a>
                </td>
                <td>
                    @foreach ($count_products as $count)
                    @if ($category['id'] == $count['category_id'])
                    {{ $count['number'] }}
                    @endif
                    @endforeach
                </td>

                <td>{{ $category['updated_at'] }}</td>
                <td>{{ $category['created_at'] }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
