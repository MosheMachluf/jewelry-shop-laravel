@extends('master')

@section('main_content')

<div class="ui container">
    <section class="section">
        <h1>{{ str_replace('Mosh\'s Jewelry | ','', $title) }}</h1>
        <div class="ui divider"></div>

        @if ($cart)
        <table class="ui basic selectable table">
            <thead>
                <tr>
                    <th></th>
                    <th>מוצר</th>
                    <th>כמות</th>
                    <th>מחיר</th>
                    <th>סה"כ</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cart as $item)
                <tr>
                    <td class="negative">
                        <a href="{{ url('shop/remove-item/' . $item['id']) }}"><i class="times circle icon red"></i></a>
                    </td>
                    <td>
                        @if ($item['attributes'])
                        <img src="{{ asset("images/{$item['attributes'][0]}") }}" width="50">
                        @endif
                        {{ $item['name'] }}
                    </td>
                    <td>
                        <button value="{{ $item['id'] }}" class="update-cart ui button mini">-</button>
                        <input class="input" type="number" class="quantity" size="1" value="{{ $item['quantity'] }}"
                            disabled="disabled">
                        <button value="{{ $item['id'] }}" class="update-cart ui button mini">+</button>
                    </td>
                    <td>&#8362;{{ $item['price'] }}</td>
                    <td>&#8362;{{ $item['price'] * $item['quantity'] }}</td>
                </tr>
                @endforeach

            </tbody>
            <tfoot class="full-width">
                <tr>
                    <th colspan="5">
                        <div class="flex-between">
                            <a href="{{ url('shop/clear-cart') }}" class="ui button">רוקן עגלה</a>
                            <div class="h5 tac"><b>סה"כ:</b> &#8362;{{ Cart::getTotal() }}</div>
                        </div>
                    </th>
                </tr>
            </tfoot>
        </table>


        <a href="{{ url('shop/purchase') }}" class="ui button primary left floated">
            רכישה
            <i class="angle double left icon"></i>
        </a>


        @else

        <p>עגלת הקניות שלך ריקה כרגע.</p>

        @endif

        <a href="{{ url('shop') }}" class="ui basic button">
            <i class="arrow circle right icon"></i>
            המשך קנייה
        </a>
    </section>
</div>

@endsection
