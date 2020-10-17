<div class="ui secondary vertical pointing menu sidebar-categories">
    <div class="item">
        <div class="header tac">קטגוריות</div>
    </div>
    <a href="{{ url($u = 'shop/sale') }}" class="item text-danger {{ $u == request()->path() ? 'active' : '' }}">
        ★ SALE ★
    </a>
    @foreach($categories as $category)
    <a href="{{ url($u = 'shop/' . $category['url']) }}" class="item {{ $u == request()->path() ? 'active' : '' }}">
        {{ $category['title'] }}
    </a>
    @endforeach
    <div class="item">
        <div class="header tac">סינון</div>
        <form action="">
            <label for="">טווח מחירים</label>
            <input type="range" name="" id="">
            <button>סנן</button>
        </form>
    </div>
</div>
