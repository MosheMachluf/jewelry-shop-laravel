@extends('cms.cms_master')
@section('cms_content')

<h1 class="ui horizontal divider header">מוצרים</h1>


<a href="{{ url('cms/products/create') }}" class="ui button positive">הוסף מוצר חדש <i class="add icon"></i></a>

<div class="ui segment shadow mt-2">
    <table class="ui very basic selectable table">
        <thead>
            <tr>
                <th>פעולות</th>
                <th>קטגוריה</th>
                <th>מוצר</th>
                <th>מחיר</th>
                <th>עודכן לאחרונה</th>
                <th>נוצר</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $product)
            <tr>
                <td>
                    <a href=" {{ url("cms/products/{$product->id}") }}" class="text-danger" data-tooltip="מחק"
                        data-inverted=""><i class="delete icon"></i></a>
                    <a href="{{ url("cms/products/{$product->id}/edit") }}" data-tooltip="ערוך" data-inverted=""><i
                            class="pencil icon"></i></a>
                </td>
                <td>
                    <a target="_blank" href="{{ url("shop/{$product->category_url}") }}">{{ $product->category }}</a>
                </td>
                <td>
                    <a target="_blank" href="{{ url("images/{$product->image}") }}">
                        <img src="{{ asset("images/{$product->image}") }}" alt="{{ $product->title }}" width="50">
                    </a>
                    <a target="_blank"
                        href="{{ url("shop/{$product->category_url}/{$product->url}") }}">{{ $product->title }}
                    </a>
                </td>
                <td class="number-format">&#8362;{{ $product->price }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
