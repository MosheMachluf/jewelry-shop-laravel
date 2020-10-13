<a href="{{ url("shop/{$product['category_url']}/{$product['url']}") }}" class="product-item hover-img">
    <div class="image">
        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}">
    </div>
    <h3>{{ $product['title'] }}</h3>
    <div class="number-format price @if($product['sale_price']) original-price @endif">
        &#8362;{{ $product['price'] }}
    </div>
    @if ($product['sale_price'])
    <div class="number-format price text-danger">&#8362;{{ $product['sale_price'] }}</div>
    @endif
</a>
