<a href="{{ url("shop/{$product['category_url']}/{$product['url']}") }}" class="product-list-line">
    <div class="image">
        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}">
    </div>
    <div class="product-line-content">
        <div class="product-line-details">
            <h3>{{ $product['title'] }}</h3>
            {{-- <p>{!! $product['article'] !!}</p> --}}
            <p>{!! substr(strip_tags($product['article']), 0, 80) !!}...</p>
        </div>

        <div class="product-line-prices">
            <div class="number-format price @if($product['sale_price']) original-price @endif">
                &#8362;{{ $product['price'] }}
            </div>
            @if ($product['sale_price'])
            <div class="number-format price">&#8362;{{ $product['sale_price'] }}</div>
            @endif
        </div>
    </div>
</a>
