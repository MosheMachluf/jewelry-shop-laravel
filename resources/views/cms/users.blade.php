@extends('cms.cms_master')
@section('cms_content')

<h1 class="ui horizontal divider header">ניהול משתמשים</h1>

<a href="{{ url('cms/users/create') }}" class="ui button positive">הוסף משתמש חדש <i class="add icon"></i></a>
<div class="ui segment shadow mt-2">
    <table class="ui very basic selectable table">
        <thead>
            <tr>
                <th>פעולות</th>
                <th>#</th>
                <th>שם מלא</th>
                <th>אימייל</th>
                <th>עודכן לאחרונה</th>
                <th>נוצר</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            {{-- @if($user['id'] == 1) @continue @endif   --}}
            <tr class="{{ $user['id'] === 1 ? 'disabled negative' : null }}">
                <td>
                    @if ($user['id'] !== 1)
                    <a href=" {{ url("cms/users/{$user['id']}") }}" class="text-danger" data-tooltip="מחק"
                        data-inverted="">
                        <i class="delete icon"></i></a>
                    <a href="{{ url("cms/users/{$user['id']}/edit") }}" data-tooltip="ערוך" data-inverted="">
                        <i class="pencil icon"></i></a>
                    @endif
                </td>
                <td>{{ $user['id'] }}</td>
                <td class="capitalize">{{ $user['full_name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['updated_at'] }}</td>
                <td>{{ $user['created_at'] }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
