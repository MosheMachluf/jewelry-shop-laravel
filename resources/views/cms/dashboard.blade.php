@extends('cms.cms_master')

@section('cms_content')

<h1 class="ui horizontal divider header">פאנל ראשי</h1>

<section class="dashboard-summery">
    <div class="row">
        <div class="summery-item">
            <div class="card silver">
                <div class="content">
                    <p class="h3 font-thin">{{ $total_products }}</p>
                    <h4 class="m-0">מוצרים בחנות</h4>
                    <div>
                        <strong>{{ $today_products }}</strong>
                        מוצרים היום
                    </div>
                </div>
                <div class="icon">
                    <i class="gem outline icon"></i>
                </div>
            </div>
        </div>
        <div class="summery-item">
            <div class="card gold">
                <div class="content">
                    <p class="h3 font-thin">{{ $total_categories }}</p>
                    <h4 class="m-0">קטגוריות בחנות</h4>
                    <div>
                        <strong>{{ $today_categories }}</strong>
                        קטגוריות היום
                    </div>
                </div>
                <div class="icon">
                    <i class="list alternate outline icon"></i>
                </div>
            </div>
        </div>
        <div class="summery-item">
            <div class="card silver">
                <div class="content">
                    <p class="h3 font-thin">{{ $total_orders }}</p>
                    <h4 class="m-0">הזמנות בחנות</h4>
                    <div>
                        <strong>{{ $today_orders }}</strong>
                        הזמנות היום
                    </div>
                </div>
                <div class="icon">
                    <i class="shipping fast icon"></i>
                </div>
            </div>
        </div>
        <div class="summery-item">
            <div class="card gold">
                <div class="content">
                    <p class="h3 font-thin">{{ $total_users }}</p>
                    <h4 class="m-0">משתמשים בחנות</h4>
                    <div>
                        <strong>{{ $today_users }}</strong>
                        משתמשים היום
                    </div>
                </div>

                <div class="icon">
                    <i class="user circle icon"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <section class="section shortcuts">
        <h3>הזמנות אחרונות</h3>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
    </section>
    <section class="section shortcuts">
        <h3>הזמנות אחרונות</h3>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
        <div class="ui segment shadow short-item">
            הזמנות אחרונות
        </div>
    </section>
</div>

@endsection
