<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="@yield('description', 'chillnfree')" />
        <meta name="keywords" content="chillnfree, chillandfree, qnt, thời trang, hiphop, quần áo, phụ kiện, mũ, áo, quần, túi xách, giày, balo" />
        <meta name="copyright" content="Copyright© 2024 ChillnFree" />
        <meta name="author" content="Hoang Anh Gaming">
        <meta name="robots" content="index,follow,noodp" />
        {{-- <title>{{ config('APP_NAME', 'chillnfree') }}</title> --}}
        <title>@yield('title', 'chillnfree')</title>

        <meta property="og:title" content="@yield('title', 'chillnfree')" />
        <meta property="og:description" content="@yield('description', 'Trải nghiệm mua hàng ngay với chillnfree')" />
        <meta property="og:url" content="{{ request()->is('san-pham/*') ? url()->current() : 'https://chillnfree.vn/' }}" />
        <meta property="og:type" content="Website" />
        <meta property="og:site_name" content="chillandfree" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:image" content="{{ asset('chatzy/assets/img/favicon.png') }}" />

        <link rel="icon" href="{{ asset('chatzy/assets/images/favicon/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('chatzy/assets/images/favicon/favicon.png') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/css/date-picker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/css/tour.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/js/ckeditor/skins/moono-lisa/editore8ef.css?t=HBDD') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/js/ckeditor/plugins/scayt/skins/moono-lisa/scayt.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/js/ckeditor/plugins/scayt/dialogs/dialog.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/js/ckeditor/plugins/tableselection/styles/tableselection.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/js/ckeditor/plugins/wsc/skins/moono-lisa/wsc.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/js/ckeditor/plugins/copyformatting/styles/copyformatting.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('chatzy/assets/css/style.css') }}" media="screen" id="color">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="sidebar-active">
        <!-- Preloader starts-->
		<div class="chatzy-loader">
        <div><img src="{{ asset('chatzy/assets/images/logo/logo_big.png') }}" alt="#"/>
            <h3>Simple, secure messaging for fast connect to world..!</h3>
        </div>
        </div>
		<!--Preloader ends -->

        <div class="chatzy-container sidebar-toggle">
            <nav class="main-nav on custom-scroll">
                <div class="logo-warpper"><a href="messenger.html"><img class="img-fluid inner2" src="{{ asset('chatzy/assets/images/logo/logo-2.png') }}" alt="footer-back-img"/></a></div>
                <div class="sidebar-main">
                  <ul class="sidebar-top">
                    <li><a class="header-icon button-effect" href="status.html" data-intro="Check Status here" title="Messege">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#messege"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-messege">       </use>
                        </svg></a></li>
                    <li><a class="header-icon button-effect" href="contact-list.html" title="Users">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#userbox"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-userbox">      </use>
                        </svg></a></li>
                    <li><a class="header-icon button-effect" href="notification.html" title="Notification">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#notification"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-notification">      </use>
                        </svg></a></li>
                    <li><a class="header-icon button-effect" href="document.html" title="Document">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#document"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-document">      </use>
                        </svg></a></li>
                    <li><a class="header-icon button-effect" href="favourite.html" title="Favourite">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#favourite"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-favourite">       </use>
                        </svg></a></li>
                    <li><a class="header-icon button-effect" href="settings.html" data-intro="You can change settings by clicking here" title="Setting">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#setting"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-setting">         </use>
                        </svg></a></li>
                  </ul>
                  <ul class="sidebar-bottom">
                    <li><a class="header-icon button-effect mode" href="#" data-intro="Change mode" title="Light &amp; Dark Mood">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#mode"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-mode">        </use>
                        </svg></a></li>
                    <li><a class="header-icon" href="login.html" title="Sign Out">
                        <svg class="header-stroke-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#signOut"></use>
                        </svg>
                        <svg class="header-fill-icon">
                          <use href="https://admin.pixelstrap.net/chatzy/assets/svg/icon-sprite.svg#fill-signOut">      </use>
                        </svg></a></li>
                  </ul>
                </div>
            </nav>

            {{ $slot }}

        </div>

        @include('layouts.app.chatzyscripts')
        @stack('modals')
        @livewireScripts

    </body>
</html>
