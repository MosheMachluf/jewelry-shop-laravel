@extends('cms.cms_master')
@section('cms_content')

<h1 class="ui horizontal divider header">תכני אתר</h1>


<a href="{{ url('cms/contents/create') }}" class="ui button positive">הוסף תוכן חדש <i class="add icon"></i></a>


<div class="ui segment shadow mt-2">
    <table class="ui very basic selectable table">
        <thead>
            <tr>
                <th>פעולות</th>
                <th>כותרת</th>
                <th>לינק</th>
                <th>עודכן לאחרונה</th>
                <th>נוצר</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contents as $content)
            <tr>
                <td>
                    <a href="{{ url("cms/contents/{$content['id']}") }}" class="text-danger" data-tooltip="מחק"
                        data-inverted="">
                        <i class="delete icon"></i>
                    </a>
                    <a href="{{ url("cms/contents/{$content['id']}/edit") }}" data-tooltip="ערוך" data-inverted="">
                        <i class="pencil icon"></i>
                    </a>
                </td>
                <td>{{ $content['title'] }}</td>
                <td>
                    @foreach ($menu as $item)
                    @if($item['id'] === $content['menu_id'])
                    <a target="_blank" href="{{ url($item['url']) }}">
                        {{ $item['title'] }}
                    </a>
                    @endif
                    @endforeach
                </td>
                <td>{{ $content['updated_at'] }}</td>
                <td>{{ $content['created_at'] }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
