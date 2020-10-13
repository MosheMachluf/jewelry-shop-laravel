@extends('cms.cms_master')
@section('cms_content')

<h1 class="ui horizontal divider header">הזמנות</h1>

<a href="{{ url('cms/orders') }}" class="ui blue button {{ request()->display === 'table' ? 'basic' : ''}}">
    תצוגת כרטיסים
    <i class="address card icon"></i>
</a>
<a href="{{ url('cms/orders?display=table') }}"
    class="ui blue button {{ request()->display === 'table' ? '' : 'basic'}}">
    תצוגת טבלה <i class="table icon"></i>
</a>

@if (request()->display === 'table')

<div class="ui segment shadow mt-2">
    <table class="ui very basic selectable table">
        <thead>
            <tr>
                <th>שם מלא</th>
                <th>פרטי הזמנה</th>
                <th>סכום</th>
                <th>עודכן לאחרונה</th>
                <th>נוצר</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->full_name }}</td>
                <td class="ui accordion">
                    <a class="title">לחץ לפרטים <i class="dropdown icon"></i></a>
                    <ul class="content">

                        @foreach (unserialize($order->data) as $product)
                        <li>
                            <p>
                                <div>
                                    @if ($product['attributes'])
                                    <img src="{{ asset("images/{$product['attributes'][0]}") }}" width="50">
                                    @endif
                                    {{ $product['name'] }}

                                </div>
                                <div>
                                    <strong> מחיר: </strong>
                                    {{ $product['price'] }}&#8362;
                                </div>
                                <div>
                                    <strong> כמות: </strong>
                                    {{ $product['quantity'] }}
                                </div>
                            </p>
                            <div class="ui divider"></div>
                        </li>
                        @endforeach
                    </ul>
                </td>
                <td class="number-format">{{ $order->total }}&#8362;</td>
                <td>{{ $order->updated_at }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@else

<div class="ui stackable four column grid mt-2">

    @foreach ($orders as $order)
    <div class="column">
        <div class="ui segment shadow border-style">
            {{ $order->full_name }}
            <hr>

            @foreach (unserialize($order->data) as $product)
            {{ $product['name'] }} |
            מחיר: {{ $product['price'] }} |
            כמות: {{ $product['quantity'] }}
            <hr>
            @endforeach
            <span class="ui aligned left">{{ $order->total }}</span>
        </div>

    </div>
    @endforeach
</div>


@endif
{{ $orders->withQueryString('display')->links() }}

@endsection
