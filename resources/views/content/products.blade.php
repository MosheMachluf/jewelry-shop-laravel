@extends('master')
@section('main_content')

<div class="ui container wide">
    <section class="section">

        <div class="row">
            <div class="ui secondary vertical pointing menu sidebar-categories">
                <div class="item">
                    <div class="header tac">קטגוריות</div>
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
            </div>

            <div class="products">
                <h1>{{ $title_page }}</h1>

                <div class="ui divider"></div>

                <div class="row">
                    @forelse ($products as $product)

                    {{-- @if (request()->display == 'list')
                    <x-product-line :product="$product" />

                    @else
                    <x-product-grid :product="$product" />

                    @endif --}}

                    <?php $category = $product['category_url'] ?? $cat_url; ?>
                    <a href="{{ url("shop/$category/{$product['url']}") }}" class="product-item hover-img">
                        <div class="image">
                            <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}">
                        </div>
                        <h3 class="truncate">{{ $product['title'] }}</h3>
                        <div class="number-format price @if($product['sale_price']) original-price @endif">
                            &#8362;{{ $product['price'] }}
                        </div>
                        @if ($product['sale_price'])
                        <div class="number-format price">&#8362;{{ $product['sale_price'] }}</div>
                        @endif
                    </a>


                    @empty
                    <p>
                        <h4>אין כרגע מוצרים בקטגוריה.</h4>
                    </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
