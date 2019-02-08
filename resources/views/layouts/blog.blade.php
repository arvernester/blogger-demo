<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <title>{{ $blog['name'] }} - {{ $blog['description'] }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Template by Colorlib" />
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP" />
    <meta name="author" content="Colorlib" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @stack('opengraph')

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css"  href='{{ asset('css/clear.css') }}' />
    <link rel="stylesheet" type="text/css"  href='{{ asset('css/common.css') }}' />
    <link rel="stylesheet" type="text/css"  href='{{ asset('css/font-awesome.min.css') }}' />
    <link rel="stylesheet" type="text/css"  href='{{ asset('css/carouFredSel.css') }}' />
    <link rel="stylesheet" type="text/css"  href='{{ asset('css/sm-clean.css') }}' />
    <link rel="stylesheet" type="text/css"  href='{{ asset('css/style.css') }}' />

    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5.js') }}"></script>
    <![endif]-->

</head>


<body class="single-post">

<!-- Preloader Gif -->
<table class="doc-loader">
    <tbody>
    <tr>
        <td>
            <img src="{{ asset('images/ajax-document-loader.gif') }}" alt="Loading...">
        </td>
    </tr>
    </tbody>
</table>

<!-- Left Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="menu-left-part">
        <div class="search-holder">
            <form action="{{ route('index') }}" method="get">
                <label>
                    <input type="search" class="search-field" placeholder="@lang('Type here to search...')" value="{{ request('s') }}" name="s" title="@lang('Search for:')">
                </label>
            </form>
        </div>
        <div class="site-info-holder">
            <h1 class="site-title">{{ $blog['name'] }}</h1>
            <p class="site-description">
                {{ $blog['description'] }}
            </p>
        </div>
        <nav id="header-main-menu">
            <ul class="main-menu sm sm-clean">
                <li><a href="{{ route('index') }}" class="current">@lang('Home')</a></li>
                @if(!empty($pages['items']))
                    @foreach($pages['items'] as $page)
                        <li><a href="{{ route('blog.page', $page['id']) }}">{{ $page['title'] }}</a></li>
                    @endforeach
                @endif

        </nav>
        <footer>
            <div class="footer-info">
                © 2018 SUPPABLOG HTML TEMPLATE. <br> CRAFTED WITH <i class="fa fa-heart"></i> BY <a href="https://colorlib.com">COLORLIB</a>.
            </div>
        </footer>
    </div>
    <div class="menu-right-part">
        <div class="logo-holder">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="{{ $blog['name'] }}">
            </a>
        </div>
        <div class="toggle-holder">
            <div id="toggle">
                <div class="menu-line"></div>
            </div>
        </div>
        <div class="social-holder">
            <div class="social-list">
                <a href="https://github.com/arvernester/blogger"><i class="fa fa-github"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-vimeo"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
            </div>
        </div>
        <div class="fixed scroll-top"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></div>
    </div>
    <div class="clear"></div>
</div>

<!-- Home Content -->
@yield('content')


<!--Load JavaScript-->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type='text/javascript' src='{{ asset('js/imagesloaded.pkgd.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.nicescroll.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.smartmenus.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.carouFredSel-6.0.0-packed.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.mousewheel.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.touchSwipe.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.easing.1.3.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/main.js') }}'></script>
</body>
</html>
