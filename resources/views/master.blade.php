<?php
function activeLink(&$u){
    $path = request()->path();
    return $u == $path ? 'active' : null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Semantic-UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }}</title>
    <script>
        const BASE_URL = "{{ url('') }}/";
    </script>
</head>

<body class="show-spinner">
    <header>
        <div class="main-nav">
            <nav class="ui inverted labeled icon menu toolbar">
                <div class="ui container z-index">
                    <div class="hamburger" id="hamburger"><span></span></div>

                    <a href="{{ url('') }}" class="logo center">
                        <img src="{{ asset('images/logo.png') }}">
                    </a>

                    <div class="item search only-desktop">
                        <form action="{{ url('shop/search-results') }}" autocomplete="off">
                            <div class="ui fluid search big">
                                <div class="ui inverted transparent icon input">
                                    <input type="text" class="search-products" name="q" placeholder="חפש מוצר..."
                                        value="{{ old('q') }}">
                                    <i class="search icon"></i>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="left menu">
                        <a class="item sm-lg-screen search-mobile">
                            <i class="search icon"></i>
                            <span>חיפוש</span>
                        </a>

                        <a href="{{ url($u = 'shop/checkout') }}" class="item shopping-cart {{ activeLink($u) }}">
                            <i class="shopping cart icon" data-cart="{{ Cart::getTotalQuantity() }}"></i>
                            <span>
                                עגלת קניות
                                @if (!Cart::isEmpty())
                                ({{ Cart::getTotalQuantity() }})
                                @endif
                            </span>
                        </a>

                        @if (!Session::has('user_id'))
                        <a href="{{ url($u = 'user/signin') }}" class="item account {{ activeLink($u) }}">
                            <i class="unlock alternate icon"></i>
                            <span>התחברות</span>
                        </a>
                        <a href="{{ url($u = 'user/signup') }}" class="item account {{ activeLink($u) }}">
                            <i class="user plus icon"></i>
                            <span>הרשמה</span>
                        </a>
                        @else
                        <a class="item account">
                            <i class="user circle icon"></i>
                            <span>{{ Session::get('user_name') }}</span>
                        </a>

                        @if (Session::get('role') <= 2) <a class="item" href="{{ url('cms/dashboard') }}">
                            <i class="dashboard icon"></i>
                            <span>פאנל ניהול</span>
                            </a>
                            @endif

                            <a class="item account" href="{{ url('user/logout') }}">
                                <i class="logout icon"></i>
                                <span>התנתק</span>
                            </a>
                            @endif
                    </div>
                </div>
            </nav>

            <div class="ui secondary pointing menu" id="nav-toggle">
                <div class="ui container">
                    <a href="{{ url($u = '/') }}" class="item {{ activeLink($u) }}">
                        דף הבית
                    </a>
                    <a href="{{ url($u = 'shop') }}" class="item {{ activeLink($u) }}">
                        חנות
                    </a>
                    <div class="ui simple dropdown item">
                        קטגוריות
                        <i class="dropdown icon" style="margin-right: 10px;"></i>
                        <div class="menu">
                            @foreach ($categories as $category)
                            <a href="{{ url('shop/' . $category['url']) }}"
                                class="item {{ $category['url'] == request()->path() ? 'active' : '' }}">
                                {{ $category['title'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($menu as $item)
                    <a href="{{ url($item['url']) }}"
                        class="item {{ $item['url'] == request()->path() ? 'active' : '' }}">
                        {{ $item['link'] }}
                    </a>
                    @endforeach

                    <div class="sm-md-screen" style="align-self: stretch;">
                        <div class="ui horizontal inverted divider">
                            חשבון
                        </div>
                        @if (!Session::has('user_id'))
                        <a href="{{ url($u = 'user/signin') }}" class="item {{ activeLink($u) }}">
                            <i class="unlock alternate icon ml-1"></i>
                            <span>התחברות</span>
                        </a>
                        <a href="{{ url($u = 'user/signup') }}" class="item {{ activeLink($u) }}">
                            <i class="user plus icon ml-1"></i>
                            <span>הרשמה</span>
                        </a>
                        @else
                        <a class="item">
                            <i class="user circle icon ml-1"></i>
                            <span>{{ Session::get('user_name') }}</span>
                        </a>

                        <a class="item account" href="{{ url('user/logout') }}">
                            <i class="logout icon ml-1"></i>
                            <span>התנתק</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="overlay"></div>

    @if (isset($breadcrumbs))
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" :current="$title_page" />
    @endif

    <main>
        @if (Session::has('success-message'))
        <div class="ui green segment shadow delay my-md">
            <div class="header">
                {!! Session::get('success-message') !!}
            </div>
        </div>
        @endif

        @yield('main_content')
    </main>

    <footer class="ui inverted vertical footer segment">
        <div class="ui container center aligned">
            <a href="{{ url('/') }}" class="center">
                <img src="{{ asset('images/logo.png') }}">
            </a>
            <h4 class="tac">Mosh's Jewelry</h4>
            <p class="tac">&copy; {{ date('Y') }} Moshe Machluf</p>
            <a href="https://moshe-machluf.netlify.app/" target="_blank">Portfolio</a> -
            <a href="https://github.com/MosheMachluf?tab=repositories" target="_blank">Github</a>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- OwlCarousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- semantic-ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <!-- ImageZoomIn -->
    <script src="{{ asset('js/zoomsl.min.js') }}"></script>
    <!-- MyJs -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/shopScript.js') }}"></script>
</body>

</html>
