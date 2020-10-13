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
    <!-- Bootstrap for summernote -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Semantic-ui -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Mosh's Jewelry | פאנל ניהול</title>

    <script>
        const BASE_URL = "{{ url('') }}/";
    </script>
</head>

<body class="show-spinner">

    <header class="ui inverted menu">
        <div class="ui container wide z-index">
            <div class="hamburger" id="hamburger"><span></span></div>

            <a href="{{ url('cms/dashboard') }}" class="logo"><img src="{{ asset('images/logo2.png') }}"></a>

            <div class="item aligned left">
                <a href="{{ url('') }}" class="ui basic inverted button" target="_blank">
                    <span>חזור לאתר</span>
                    <i class="reply icon"></i></a>
            </div>
            <div class="item md-xl-screen">
                <a href="{{ url('user/logout') }}">התנתק <i class="sign-out icon"></i></a>
            </div>
        </div>
    </header>

    <div class="overlay"></div>

    <div class="ui grid">
        <nav class="ui vertical inverted menu three wide column cms-menu" id="nav-toggle">
            <a href="{{ url($u = 'cms/dashboard') }}" class="item {{ activeLink($u) }}">
                <i class="dashboard icon"></i>
                פאנל ראשי
            </a>
            <a href="{{ url($u = 'cms/menu') }}" class="item {{ activeLink($u) }}">
                <i class="content icon"></i>
                תפריט ניווט
            </a>
            <a href="{{ url($u = 'cms/contents') }}" class="item {{ activeLink($u) }}">
                <i class="keyboard outline icon"></i>
                תכנים
            </a>
            <a href="{{ url($u = 'cms/categories') }}" class="item {{ activeLink($u) }}">
                <i class="list alternate outline icon"></i>
                קטגוריות
            </a>
            <a href="{{ url($u = 'cms/products') }}" class="item {{ activeLink($u) }}">
                <i class="gem outline icon"></i>
                מוצרים
            </a>
            <a href="{{ url($u = 'cms/orders') }}" class="item {{ activeLink($u) }}">
                <i class="fast shipping icon"></i>
                הזמנות
            </a>

            @if(Session::get('role') == 1)
            <a href="{{ url($u = 'cms/users') }}" class="item {{ activeLink($u) }}">
                <i class="user circle icon"></i>
                משתמשים
            </a>
            @endif

            <div class="sm-md-screen" style="align-self: stretch;">
                <div class="ui horizontal inverted divider">
                    חשבון
                </div>
                <a class="item">
                    <i class="user circle icon ml-1"></i>
                    <span>{{ Session::get('user_name') }}</span>
                </a>

                <a class="item account" href="{{ url('user/logout') }}">
                    <i class="logout icon ml-1"></i>
                    <span>התנתק</span>
                </a>
            </div>
        </nav>

        <main class="main_dashboard thirteen wide column">
            @if (Session::has('success-message'))
            <div class="ui green segment shadow delay">
                <div class="header">
                    {!! Session::get('success-message') !!}
                </div>
            </div>
            @endif

            @yield('cms_content')
        </main>
    </div>

    {{-- <footer class="ui vertical aligned center footer segment">
        FOOTER
    </footer> --}}


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap for summernote -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Semantic-ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <!-- My js -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/cmsScript.js') }}"></script>
</body>

</html>
