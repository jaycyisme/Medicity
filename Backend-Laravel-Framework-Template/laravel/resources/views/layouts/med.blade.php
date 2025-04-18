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
        <meta property="og:image" content="{{ asset('medicity/assets/img/favicon.png') }}" />

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('medicity/assets/img/favicon.png') }}" type="image/x-icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/fontawesome/css/all.min.css') }}">

		<style type="text/css">@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/300/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/300/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/300/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/400/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/400/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/400/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/500/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/500/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/500/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/600/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/600/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/600/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/700/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/700/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/700/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}</style>
		<style type="text/css">@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}</style>

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="{{ asset('medicity/assets/css/feather.css') }}">

        <!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/select2/css/select2.min.css') }}">

    	<!-- Datepicker CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/bootstrap-datetimepicker.min.css') }}">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/owl.carousel.min.css') }}">

        <!-- Apex Css -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/apex/apexcharts.css') }}">

		<!-- Animation CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/aos.css') }}">

        <!-- Iconsax CSS-->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/iconsax.css') }}">

        <!-- Swiper CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/swiper/swiper.min.css') }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/custom.css') }}">
		{{-- <link rel="stylesheet" href="{{ asset('medicity/assets/css/style.css') }}"> --}}



        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body @if (Route::is('chat.index')) class="main-chat-blk"  @endif>
        <!-- Preloader starts-->
		<div class="loader js-preloader" >
			<div class="absCenter">
				<div class="loaderPill">
					<div class="loaderPill-anim">
						<div class="loaderPill-anim-bounce">
							<div class="loaderPill-anim-flop">
								<div class="loaderPill-pill"></div>
							</div>
						</div>
					</div>
					<div class="loaderPill-floor">
						<div class="loaderPill-floor-shadow"></div>
					</div>
				</div>
			</div>
		</div>
		<!--Preloader ends -->

        <div class="main-wrapper home-one">
            <!-- Header -->
			<header class="header header-custom header-fixed inner-header relative">
				<div class="container">
					<nav class="navbar navbar-expand-lg header-nav">
						<div class="navbar-header">
							<a id="mobile_btn" href="javascript:void(0);">
								<span class="bar-icon">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</a>
							<a href="index.html" class="navbar-brand logo">
								<img src="{{ asset('medicity/assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="header-menu">
							<div class="main-menu-wrapper">
								<div class="menu-header">
									<a href="index.html" class="menu-logo">
										<img src="{{ asset('medicity/assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
									</a>
									<a id="menu_close" class="menu-close" href="javascript:void(0);">
										<i class="fas fa-times"></i>
									</a>
								</div>
								<ul class="main-nav">
																<li class="has-submenu megamenu">
									<a href="javascript:void(0);">Home <i class="fas fa-chevron-down"></i></a>
									<ul class="submenu mega-submenu">
										<li>
											<div class="megamenu-wrapper">
												<div class="row">
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index.html" class="inner-demo-img">General Home 1</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo ">
															<div class="demo-img">
																<a href="index-4.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-01.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-4.html" class="inner-demo-img">General Home 2</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-2.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-02.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-2.html" class="inner-demo-img">General Home 3</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-3.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-03.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-3.html" class="inner-demo-img">General Home 4</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-5.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-04.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-5.html" class="inner-demo-img">Cardiology</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-6.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-05.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-6.html" class="inner-demo-img">Eyecare</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo ">
															<div class="demo-img">
																<a href="index-7.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-06.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-7.html" class="inner-demo-img">Veterinary</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-8.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-07.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-8.html" class="inner-demo-img">Pediatric</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-9.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-08.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-9.html" class="inner-demo-img">Fertility</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-10.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-09.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-10.html" class="inner-demo-img">ENT</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-11.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-10.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-11.html" class="inner-demo-img">Cosmetics</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-12.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-11.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-12.html" class="inner-demo-img">Lab Test</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="pharmacy-index.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-12.jpg') }}" class="img-fluid" alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-12.html" class="inner-demo-img">Pharmacy</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-13.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-13.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-13.html" class="inner-demo-img">Home Care</a>
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="single-demo">
															<div class="demo-img">
																<a href="index-14.html" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-14.jpg') }}" class="img-fluid " alt="img"></a>
															</div>
															<div class="demo-info">
																<a href="index-14.html" class="inner-demo-img">Dentists</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
									<li class="has-submenu">
										<a href="javascript:void(0);">Doctors <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
											<li><a href="appointments.html">Appointments</a></li>
											<li><a href="available-timings.html">Available Timing</a></li>
											<li><a href="my-patients.html">Patients List</a></li>
											<li><a href="patient-profile.html">Patients Profile</a></li>
											<li><a href="chat-doctor.html">Chat</a></li>
											<li><a href="invoices.html">Invoices</a></li>
											<li><a href="doctor-profile-settings.html">Profile Settings</a></li>
											<li><a href="reviews.html">Reviews</a></li>
											<li><a href="doctor-register.html">Doctor Register</a></li>
											<li class="has-submenu">
												<a href="doctor-blog.html">Blog</a>
												<ul class="submenu">
													<li><a href="doctor-blog.html">Blog</a></li>
													<li><a href="blog-details.html">Blog view</a></li>
													<li><a href="doctor-add-blog.html">Add Blog</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="has-submenu">
										<a href="javascript:void(0);">Patients <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Doctors</a>
												<ul class="submenu inner-submenu">
													<li><a href="map-grid.html">Map Grid</a></li>
													<li><a href="map-list.html">Map List</a></li>
													<li><a href="map-list-availability.html">Map with Availability</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Search Doctor</a>
												<ul class="submenu inner-submenu">
													<li><a href="search.html">Search Doctor 1</a></li>
													<li><a href="search-2.html">Search Doctor 2</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Doctor Profile</a>
												<ul class="submenu inner-submenu">
													<li><a href="doctor-profile.html">Doctor Profile 1</a></li>
													<li><a href="doctor-profile-2.html">Doctor Profile 2</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Booking</a>
												<ul class="submenu inner-submenu">
													<li><a href="booking.html">Booking</a></li>
													<li><a href="booking-1.html">Booking 1</a></li>
													<li><a href="booking-2.html">Booking 2</a></li>
													<li><a href="booking-popup.html">Booking Popup</a></li>
												</ul>
											</li>
											<li><a href="checkout.html">Checkout</a></li>
											<li><a href="booking-success.html">Booking Success</a></li>
											<li><a href="favourites.html">Favourites</a></li>
											<li><a href="chat.html">Chat</a></li>
											<li><a href="profile-settings.html">Profile Settings</a></li>
											<li><a href="change-password.html">Change Password</a></li>
										</ul>
									</li>
									<li class="has-submenu active">
										<a href="javascript:void(0);">Pharmacy <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="pharmacy-index.html">Pharmacy</a></li>
											<li><a href="pharmacy-details.html">Pharmacy Details</a></li>
											<li><a href="pharmacy-search.html">Pharmacy Search</a></li>
											<li class="active"><a href="product-all.html">Product</a></li>
											<li><a href="product-description.html">Product Description</a></li>
											<li><a href="cart.html">Cart</a></li>
											<li><a href="product-checkout.html">Product Checkout</a></li>
											<li><a href="payment-success.html">Payment Success</a></li>
											<li><a href="pharmacy-register.html">Pharmacy Register</a></li>
										</ul>
									</li>

									<li class="has-submenu">
										<a href="javascript:void(0);">Pages <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="about-us.html">About Us</a></li>
											<li><a href="contact-us.html">Contact Us</a></li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Other Pages</a>
												<ul class="submenu inner-submenu">
													<li><a href="blank-page.html">Starter Page</a></li>
													<li><a href="pricing.html">Pricing Plan</a></li>
													<li><a href="faq.html">FAQ</a></li>
													<li><a href="maintenance.html">Maintenance</a></li>
													<li><a href="coming-soon.html">Coming Soon</a></li>
													<li><a href="terms-condition.html">Terms & Condition</a></li>
													<li><a href="privacy-policy.html">Privacy Policy</a></li>
													<li><a href="components.html">Components</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Authentication</a>
												<ul class="submenu inner-submenu">
													<li><a href="login-email.html">Login Email</a></li>
													<li><a href="login-phone.html">Login Phone</a></li>
													<li><a href="doctor-signup.html">Doctor Signup</a></li>
													<li><a href="patient-signup.html">Patient Signup</a></li>
													<li><a href="forgot-password.html">Forgot Password 1</a></li>
													<li><a href="forgot-password2.html">Forgot Password 2</a></li>
													<li><a href="login-email-otp.html">Email OTP</a></li>
													<li><a href="login-phone-otp.html">Phone OTP</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Error Pages</a>
												<ul class="submenu inner-submenu">
													<li><a href="error-404.html">404 Error</a></li>
													<li><a href="error-500.html">500 Error</a></li>
												</ul>
											</li>
											<li><a href="hospitals.html">Hospitals</a></li>
											<li><a href="speciality.html">Speciality</a></li>
											<li><a href="clinic.html">Clinic</a></li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Call</a>
												<ul class="submenu inner-submenu">
													<li><a href="voice-call.html">Voice Call</a></li>
													<li><a href="video-call.html">Video Call</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="javascript:void(0);">Invoices</a>
												<ul class="submenu inner-submenu">
													<li><a href="invoices.html">Invoices</a></li>
													<li><a href="invoice-view.html">Invoice View</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="has-submenu">
										<a href="#">Blog <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog-grid.html">Blog Grid</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
										</ul>
									</li>
									<li class="has-submenu">
										<a href="#">Admin <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="admin/index.html" target="_blank">Admin</a></li>
											<li><a href="pharmacy/index.html" target="_blank">Pharmacy Admin</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="nav header-navbar-rht">
								<li class="searchbar">
									<a href="javascript:void(0);"><i class="feather-search"></i></a>
									<div class="togglesearch">
										<form action="https://doccure.dreamstechnologies.com/html/template/search.html">
											<div class="input-group">
												<input type="text" class="form-control">
												<button type="submit" class="btn">Search</button>
											</div>
										</form>
									</div>
								</li>
								<li class="header-theme noti-nav">
									<a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle">
										<i class="isax isax-sun-1"></i>
									</a>
									<a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle activate">
										<i class="isax isax-moon"></i>
									</a>
								</li>
								<li>
									<a href="login.html" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill"><i class="isax isax-lock-1 me-1"></i>Sign Up</a>
								</li>
								<li>
									<a href="register.html" class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
										<i class="isax isax-user-tick me-1"></i>Register
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<!-- /Header -->

            {{ $slot }}

            <!-- Footer -->
			<footer class="footer footer-one">
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<a href="index.html"><img src="{{ asset('medicity/assets/img/logo.png') }}" alt="logo"></a>
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-3 col-md-4">
										<div class="footer-widget footer-menu">
											<h2 class="footer-title">For Patients</h2>
											<ul>
												<li><a href="search.html">Search for Doctors</a></li>
												<li><a href="login.html">Login</a></li>
												<li><a href="register.html">Register</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-4">
										<div class="footer-widget footer-menu">
											<h2 class="footer-title">For Doctors</h2>
											<ul>
												<li><a href="appointments.html">Appointments</a></li>
												<li><a href="chat.html">Chat</a></li>
												<li><a href="login.html">Login</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 col-md-4">
										<div class="footer-widget footer-contact">
											<h2 class="footer-title">Contact Us</h2>
											<div class="footer-contact-info">
												<div class="footer-address">
													<p><i class="feather-map-pin"></i> 3556 Beech Street, USA</p>
												</div>
												<div class="footer-address">
													<p><i class="feather-phone-call"></i> +1 315 369 5943</p>
												</div>
												<div class="footer-address mb-0">
													<p><i class="feather-mail"></i> <a href="https://doccure.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="573338343422253217322f363a273b327934383a">[email&#160;protected]</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-7">
								<div class="footer-widget">
									<h2 class="footer-title">Join Our Newsletter</h2>
									<div class="subscribe-form">
										<form action="#">
		                                    <input type="email" class="form-control" placeholder="Enter Email">
		                                    <button type="submit" class="btn">Submit</button>
	                                    </form>
	                                </div>
									<div class="social-icon">
									<ul>
										<li>
											<a href="javascript:void(0);"><i class="fab fa-facebook"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a>
										</li>
									</ul>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="container">
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"> Copyright © 2024 <a href="https://themeforest.net/user/dreamstechnologies/portfolio" target="_blank">Dreamstechnologies.</a> All Rights Reserved</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">

									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="privacy-policy.html">Privacy Policy</a></li>
											<li><a href="terms-condition.html">Terms and Conditions</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->

								</div>
							</div>
						</div>
						<!-- /Copyright -->
					</div>
				</div>
			</footer>
			<!-- /Footer -->
        </div>

        @include('layouts.app.main-scripts')
        @stack('modals')
        @livewireScripts

    </body>
</html>
