@extends('master')
@section('main_content')

<div class="ui container wide">
    <section class="section catalog">
        <div class="row" style="flex-wrap: nowrap;">
            <div class="sidebar-categories">
                <div class="item">
                    <div class="header-title">קטגוריות</div>
                </div>
                <a href="{{ url($u = 'shop/sale') }}"
                    class="item text-danger {{ $u == request()->path() ? 'active' : '' }}">
                    ★ SALE ★
                </a>
                @foreach($categories as $category)
                <a href="{{ url($u = 'shop/' . $category['url']) }}"
                    class="item {{ $u == request()->path() ? 'active' : '' }}">
                    {{ $category['title'] }}
                </a>
                @endforeach
                <div class="item">
                    <div class="header-title">סינון</div>
                    <form action="">
                        <label for="">טווח מחירים</label>
                        <input type="range" name="filter-price">
                        <button>סנן</button>
                    </form>
                </div>
            </div>


            <div class="products">
                <h1>{{ str_replace('Mosh\'s Jewelry | ','', $title) }}</h1>



                <div class="row header">
                    <button class="ui button basic secondary" id="filter-products-mobile-btn">סינון</button>

                    <div class="choose-display">
                        <strong>
                            תצוגה:
                        </strong>
                        <a href="{{ route('shop', ['display' => 'list']) }}" data-tooltip="רשימה" data-inverted="">
                            <i class="list alternate outline icon"></i>
                        </a>
                        <a href="{{ route('shop', ['display' => 'grid']) }}" data-tooltip="רשת" data-inverted="">
                            <i class="th icon"></i>
                        </a>
                    </div>

                    <div class="counter-results light-text">
                        מציג {{ $products->count() }}
                        מתוך {{ $products->total() }} תוצאות
                    </div>

                    <div class="sort-products">
                        <label for="sort-products" class="bold">
                            מיין לפי:
                        </label>
                        <select name="sort_products" id="sort-products">
                            <option value="{{ route('shop') }}">כללי</option>
                            <option value="{{ route('shop', ['sortBy' => 'newProd']) }}">מהחדש לישן</option>
                            <option value="{{ route('shop', ['sortBy' => 'priceLow']) }}">המחיר מהנמוך לגבוה</option>
                            <option value="{{ route('shop', ['sortBy' => 'priceHigh']) }}">המחיר מהגבוה לנמוך</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    @forelse($products as $product)

                    @if (request()->display == 'list')
                    <x-product-line :product="$product" />

                    @else
                    <x-product-grid :product="$product" />

                    @endif
                    @empty

                    <p><i>אין כרגע מוצרים באתר.</i></p>

                    @endforelse

                </div>

                {{ $products->appends(request()->input())->links() }}

            </div>
        </div>
    </section>
</div>
@endsection
