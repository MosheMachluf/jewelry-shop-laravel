@extends('master')
@section('main_content')

<div class="product-page ui container">
    <section class="section product">

        <div class="row">
            <div class="image hover-img">
                <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}"
                    id="product-page-img">
            </div>

            <div class="product-content">
                <div class="product-details">
                    <h1 class="product-page-title">{{ $product['title'] }}</h1>
                    <div class="product-page-price number-format my-md">&#8362;{{ $product['price'] }}</div>
                    <p>{!! $product['article'] !!}</p>
                </div>

                <div class="product-page-buttons">
                    @if (!Cart::get($product['id']))

                    <button data-id="{{ $product['id'] }}" class="ui basic button primary add-to-cart">
                        הוסף לעגלה <i class="shopping cart icon"></i>
                    </button>

                    @else

                    <button class="ui button" disabled="disabled">
                        המוצר בעגלה <i class="shopping cart icon"></i>
                    </button>

                    @endif

                    <a href="{{ url("shop/checkout?prd={$product['id']}") }}"
                        class="ui button primary purchase-btn">רכישה</a>
                </div>

            </div>
        </div>
    </section>

    <section class="section more-products sub-view">
        <h3 class="ui horizontal divider header">אולי יעניין אותך</h3>

        <div class="row">
            @forelse ($more_products as $more_product)
            <a href="{{ url("shop/{$more_product['category_url']}/{$more_product['url']}") }}"
                class="product-item hover-img">
                <div class="image">
                    <img src="{{ asset('images/' . $more_product['image']) }}" alt="{{ $more_product['title'] }}">
                </div>
                <h3 class="truncate">{{ $more_product['title'] }}</h3>
                <div class="number-format price">&#8362;{{ $more_product['price'] }}</div>
            </a>
            @empty

            @endforelse
        </div>
    </section>
</div>

@endsection
