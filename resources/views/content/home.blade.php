@extends('master')
@section('main_content')

<section id="slider-welcome">
    <div class="owl-carousel owl-theme">
        <div class="item"><img src="{{ asset('images/slider-welcome/1.jpg') }}" alt=""></div>
        <div class="item"><img src="{{ asset('images/slider-welcome/2.jpg') }}" alt=""></div>
        <div class="item"><img src="{{ asset('images/slider-welcome/3.jpg') }}" alt=""></div>
    </div>
</section>

<div class="ui container home">
    <section class="categories mt-sm">
        <div class="row">
            @foreach ($categories as $category)
            <a href="{{ url('shop/' . $category['url']) }}" class="category-item">
                <div class="image hover-img bg-hover">
                    <img src="{{ asset('images/' . $category['image']) }}" class="image bg-hover" alt="">
                    <h3>{{ $category['title'] }}</h3>
                    <p class="category-p">{!! $category['article'] !!}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="tac">
            <a href="{{ url('shop/') }}" class="ui button primary">
                כל הקטגוריות
                <i class="angle double left icon"></i>
            </a>
        </div>
    </section>

    <section class="top-sale sub-view">
        <h2 class="ui horizontal divider header text-danger">&#9733; SALE &#9733;</h2>

        <div class="row">
            @foreach ($products_sale as $product)
            <x-product-grid :product="$product" />
            @endforeach
        </div>
        <div class="tac">
            <a href="{{ url('shop/') }}" class="ui button primary">
                כל המבצעים
                <i class="angle double left icon"></i>
            </a>
        </div>
    </section>

    <section class="new-collection sub-view">
        <h2 class="ui horizontal divider header">
            קולקציה חדשה
        </h2>

        <div class="row">
            @foreach ($new_products as $product)
            <x-product-grid :product="$product" />
            @endforeach
        </div>
        <div class="tac">
            <a href="{{ url('shop/') }}" class="ui button primary">
                כל המוצרים
                <i class="angle double left icon"></i>
            </a>
        </div>
    </section>



    {{-- <section class="services">
        <div class="row">
            <div class="item-service">
                <i class="truck icon"></i>
                <h4>משלוח בין 2-7 ימי עסקים</h4>
            </div>

            <div class="item-service">
                <i class="present icon"></i>
                <h4>בקנייה מעל 300₪ משלוח מהיר מתנה</h4>
            </div>

            <div class="item-service">
                <i class="recycle icon"></i>
                <h4>שירות החלפות נוח</h4>
            </div>

            <div class="item-service">
                <i class="purchase icon"></i>
                <h4>יש אפשרות לתשלום במזומן לשליח</h4>
            </div>

            <div class="item-service">
                <i class="icon"></i>
                <h4>כל המוצרים מיוצרים ומיובאים בבלעדיות</h4>
            </div>

            <div class="item-service">
                <i class="icon"></i>
                <h4>תשלום מאובטח בכרטיס אשראי</h4>
            </div>
        </div>
    </section> --}}

    <section class="clients" id="slider-clients">
        <h2 class="ui horizontal divider header">לקוחותינו</h2>

        <div class="owl-carousel owl-theme">
            <div class="item">
                <h4 class="tac">שמוליק קיפוד</h4>
                <p class="h4 tac">
                    אני מאוד מרוצה. השרות אדיב, האיכות מעל ממה שציפיתי, אופציות שונות של תשלום וההזמנה
                    הגיעה באריזת מתנה תוך 24 שעות.
                </p>
            </div>
            <div class="item">
                <h4 class="tac">קוקו</h4>
                <p class="h4 tac">שירות מעולה ומוצרים ברמה גבוהה מאוד!</p>
            </div>
            <div class="item">
                <h4 class="tac">דוד לוי</h4>
                <p class="h4 tac">שירות מעולה ומוצרים ברמה גבוהה מאוד!</p>
            </div>
        </div>
    </section>
</div>

<section class="instagram mt-sm">
    <div class="row">
        <a href="#" class="instagram_item set-bg bg-hover"
            style="background-image: url({{ asset('images/instagram/insta-1.jpg') }});">
            <div class="instagram_text">
                <i class="instagram icon"></i>
                <span>@mosh_jewelry</span>
            </div>
        </a>

        <a href="#" class="instagram_item set-bg bg-hover"
            style="background-image: url({{ asset('images/instagram/insta-2.jpg') }});">
            <div class="instagram_text">
                <i class="instagram icon"></i>
                <span>@mosh_jewelry</span>
            </div>
        </a>

        <a href="#" class="instagram_item set-bg bg-hover"
            style="background-image: url({{ asset('images/instagram/insta-3.jpg') }});">
            <div class="instagram_text">
                <i class="instagram icon"></i>
                <span>@mosh_jewelry</span>
            </div>
        </a>

        <a href="#" class="instagram_item set-bg bg-hover"
            style="background-image: url({{ asset('images/instagram/insta-4.jpg') }});">
            <div class="instagram_text">
                <i class="instagram icon"></i>
                <span>@mosh_jewelry</span>
            </div>
        </a>

        <a href="#" class="instagram_item set-bg bg-hover"
            style="background-image: url({{ asset('images/instagram/insta-5.jpg') }});">
            <div class="instagram_text">
                <i class="instagram icon"></i>
                <span>@mosh_jewelry</span>
            </div>
        </a>
    </div>
</section>

@endsection
