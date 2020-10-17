@extends('master')
@section('main_content')

<div class="ui container wide">
    <section class="section">

        <div class="row">
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
            </div>

            <div class="products">
                <h1>{{ $title_page }}</h1>

                <div class="ui divider"></div>

                <div class="row">
                    @forelse ($products as $product)
                    <?php $product['category_url'] = $product['category_url'] ?? $cat_url; ?>

                    @if (request()->display == 'list')
                    <x-product-line :product="$product" />

                    @else
                    <x-product-grid :product="$product" />

                    @endif

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
