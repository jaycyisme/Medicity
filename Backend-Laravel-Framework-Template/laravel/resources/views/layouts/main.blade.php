<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="@yield('description', 'medicity')" />
        <meta name="keywords" content="medicity, chillandfree, qnt, thời trang, hiphop, quần áo, phụ kiện, mũ, áo, quần, túi xách, giày, balo" />
        <meta name="copyright" content="Copyright© 2024 Medicity" />
        <meta name="author" content="JayCy">
        <meta name="robots" content="index,follow,noodp" />
        {{-- <title>{{ config('APP_NAME', 'chillnfree') }}</title> --}}
        <title>@yield('title', 'medicity')</title>

        <meta property="og:title" content="@yield('title', 'medicity')" />
        <meta property="og:description" content="@yield('description', 'Medicity')" />
        <meta property="og:url" content="{{ request()->is('san-pham/*') ? url()->current() : 'https://medicity.vn/' }}" />
        <meta property="og:type" content="Website" />
        <meta property="og:site_name" content="medicity" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:image" content="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" type="image/x-icon">

        <!-- [Page specific CSS] start -->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/nouislider.min.css') }}">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/fontawesome/css/all.min.css') }}">

		<style type="text/css">@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/300/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/300/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/300/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/400/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/400/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/400/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/500/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/500/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/500/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/600/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/600/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/600/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/devanagari/700/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin-ext/700/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/s/poppins/5.0.11/latin/700/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}</style>
		<style type="text/css">@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/cyrillic-ext/wght/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/vietnamese/wght/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek/wght/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/greek-ext/wght/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(https://doccure.dreamstechnologies.com/cf-fonts/v/inter/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}</style>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="{{ asset('medicity/assets/css/feather.css') }}">

        <!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/plugins/select2/css/select2.min.css') }}">

    	<!-- Datetimepicker CSS -->
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

        <!-- Fancybox CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

        {{-- Uppy Library --}}
        <link href="https://releases.transloadit.com/uppy/v4.9.0/uppy.min.css"  rel="stylesheet" />

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/custom.css') }}">
		<link rel="stylesheet" href="{{ asset('medicity/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" >

        <style>
            .visit-btns.disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .visit-btns.disabled input {
                pointer-events: none;
            }

            .visit-btns.disabled .visit-rsn {
                text-decoration: line-through;
                color: #999;
            }
        </style>


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body @if (Route::is('chat.index') || Route::is('medicity.clinic.list')) class="main-chat-blk"  @endif>
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
                <div class="header-topbar">
                    <div class="container">
                        <div class="topbar-info">
                            <div class="d-flex align-items-center gap-3 header-info">
                                <p><i class="isax isax-message-text5 me-1"></i>medicityservice@gmail.com</p>
                                <p><i class="isax isax-call5 me-1"></i>+84 867 551 656</p>
                            </div>
                            <ul>
                                <li class="header-theme">
                                    <a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle">
                                        <i class="isax isax-sun-1"></i>
                                    </a>
                                    <a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle activate">
                                        <i class="isax isax-moon"></i>
                                    </a>
                                </li>
                                <li class="d-inline-flex align-items-center drop-header">
                                    <div class="dropdown dropdown-country me-3">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('medicity/assets/img/flags/us-flag.svg') }}" class="me-2" alt="flag">
                                        </a>
                                        <ul class="dropdown-menu p-2 mt-2">
                                            <li>
                                                <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                                    <img src="{{ asset('medicity/assets/img/flags/vietnam.png') }}" class="me-2" alt="flag">VIE
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                                    <img src="{{ asset('medicity/assets/img/flags/us-flag.svg') }}" class="me-2" alt="flag">ENG
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dropdown dropdown-amt">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            USD
                                        </a>
                                        <ul class="dropdown-menu p-2 mt-2">
                                            <li><a class="dropdown-item rounded" href="javascript:void(0);">USD</a></li>
                                            <li><a class="dropdown-item rounded" href="javascript:void(0);">VND</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="social-header">
                                    <div class="social-icon">
                                        <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
							<a href="{{ route('index') }}" class="navbar-brand logo">
								<img src="{{ asset('assets/images/Medicity.jpg') }}" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="header-menu">
							<div class="main-menu-wrapper">
								<div class="menu-header">
									<a href="{{ route('index') }}" class="menu-logo">
										<img src="{{ asset('assets/images/Medicity.jpg') }}" class="img-fluid" alt="Logo">
									</a>
									<a id="menu_close" class="menu-close" href="javascript:void(0);">
										<i class="fas fa-times"></i>
									</a>
								</div>
								<ul class="main-nav">
									<li class="has-submenu megamenu active">
										<a href="javascript:void(0);">Home <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu mega-submenu">
											<li>
												<div class="megamenu-wrapper">
													<div class="row">
														<div class="col-lg-2">
															<div class="single-demo ">
																<div class="demo-img">
																	<a href="{{ route('index') }}" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-01.jpg') }}" class="img-fluid " alt="img"></a>
																</div>
																<div class="demo-info">
																	<a href="{{ route('index') }}" class="inner-demo-img">Home Page</a>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
															<div class="single-demo">
																<div class="demo-img">
																	<a href="{{ route('disease-index') }}" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-09.jpg') }}" class="img-fluid " alt="img"></a>
																</div>
																<div class="demo-info">
																	<a href="{{ route('disease-index') }}" class="inner-demo-img">Disease Page</a>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
															<div class="single-demo">
																<div class="demo-img">
																	<a href="{{ route('pharmacy-index') }}" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-12.jpg') }}" class="img-fluid" alt="img"></a>
																</div>
																<div class="demo-info">
																	<a href="{{ route('pharmacy-index') }}" class="inner-demo-img">Pharmacy Page</a>
																</div>
															</div>
														</div>
                                                        <div class="col-lg-2">
                                                            <div class="single-demo">
                                                                <div class="demo-img">
                                                                    <a href="{{ route('service-index') }}" class="inner-demo-img"><img src="{{ asset('medicity/assets/img/home/home-13.jpg') }}" class="img-fluid " alt="img"></a>
                                                                </div>
                                                                <div class="demo-info">
                                                                    <a href="{{ route('service-index') }}" class="inner-demo-img">Service Page</a>
                                                                </div>
                                                            </div>
                                                        </div>
													</div>
												</div>
											</li>
										</ul>
									</li>
                                    <li class="has-submenu">
										<a href="{{ route('doctor-list') }}">Find Doctor</a>
									</li>
                                    <li class="has-submenu">
										<a href="{{ route('medicity.clinic.list') }}">Find Clinic</a>
									</li>
									<li class="has-submenu">
										<a href="javascript:void(0);">Pharmacy <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="{{ route('pharmacy-index') }}">Pharmacy</a></li>
											<li><a href="{{ route('pharmacy-list') }}">Product List</a></li>
										</ul>
									</li>
                                    <li class="has-submenu">
										<a href="javascript:void(0);">Service <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="{{ route('service-index') }}">Service</a></li>
											<li><a href="{{ route('service-list') }}">Service List</a></li>
										</ul>
									</li>
                                    <li class="has-submenu">
										<a href="javascript:void(0);">Disease <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="{{ route('disease-index') }}">Disease</a></li>
											<li><a href="{{ route('disease-list') }}">Disease List</a></li>
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
										<a href="#">Blog</a>
										{{-- <ul class="submenu">
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog-grid.html">Blog Grid</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
										</ul> --}}
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
                                @if(Auth::check())
                                <li class="nav-item dropdown has-arrow logged-item">
                                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                                        <span class="user-img">
                                            <img class="rounded-circle" src="@if(isset(Auth::user()->profile_photo_path)){{ asset('storage/'.Auth::user()->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" width="31" alt="Darren Elder">
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="user-header">
                                            <div class="avatar avatar-sm">
                                                <img src="@if(isset(Auth::user()->profile_photo_path)){{ asset('storage/'.Auth::user()->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image" class="avatar-img rounded-circle">
                                            </div>
                                            <div class="user-text">
                                                <h6>{{ Auth::user()->name }}</h6>
                                                <p class="text-success mb-0">Available</p>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="@can('dashboard-access'){{ route('dashboard') }}@endcan
                                    @can('index-access'){{ route('patient.dashboard') }}@endcan
                                    @can('doctor-access'){{ route('doctor.dashboard') }}@endcan">Dashboard</a>
                                        <a class="dropdown-item" href="@can('dashboard-access'){{ route('profile.show') }}@endcan
                                    @can('index-access'){{ route('patient.profile-setting') }}@endcan
                                    @can('doctor-access'){{ route('doctor.doctor-profile-setting') }}@endcan">Profile Settings</a>
                                    <form method="POST" action="{{ route('logout') }}" x-data id="logout-form">
                                        @csrf
                                        <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit(); return false;">
                                            Logout
                                        </a>
                                    </form>
                                    </div>
                                </li>
                                @else
								<li>
									<a href="{{ route('login') }}" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill"><i class="isax isax-lock-1 me-1"></i>Login</a>
								</li>
								<li>
									<a href="{{ route('register') }}" class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
										<i class="isax isax-user-tick me-1"></i>Register
									</a>
								</li>
                                @endif
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<!-- /Header -->

            {{ $slot }}

            @if (!Request::is('doctor/*') && !Request::is('patient/*'))
            <!-- Footer Section -->
			<footer class="footer inner-footer footer-info">
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-3 col-md-3">
										<div class="footer-widget footer-menu">
											<h6 class="footer-title">Company</h6>
											<ul>
												<li><a href="about-us.html">About</a></li>
												<li><a href="search.html">Features</a></li>
												<li><a href="javascript:void(0);">Works</a></li>
												<li><a href="javascript:void(0);">Careers</a></li>
												<li><a href="javascript:void(0);">Locations</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-3">
										<div class="footer-widget footer-menu">
											<h6 class="footer-title">Treatments</h6>
											<ul>
												<li><a href="search.html">Dental</a></li>
												<li><a href="search.html">Cardiac</a></li>
												<li><a href="search.html">Spinal Cord</a></li>
												<li><a href="search.html">Hair Growth</a></li>
												<li><a href="search.html">Anemia & Disorder</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-3">
										<div class="footer-widget footer-menu">
											<h6 class="footer-title">Specialities</h6>
											<ul>
												<li><a href="search.html">Transplant</a></li>
												<li><a href="search.html">Cardiologist</a></li>
												<li><a href="search.html">Oncology</a></li>
												<li><a href="search.html">Pediatrics</a></li>
												<li><a href="search.html">Gynacology</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-3">
										<div class="footer-widget footer-menu">
											<h6 class="footer-title">Utilites</h6>
											<ul>
												<li><a href="pricing.html">Pricing</a></li>
												<li><a href="contact-us.html">Contact</a></li>
												<li><a href="contact-us.html">Request A Quote</a></li>
												<li><a href="javascript:void(0);">Premium Membership</a></li>
												<li><a href="javascript:void(0);">Integrations</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7">
								<div class="footer-widget">
									<h6 class="footer-title">Newsletter</h6>
									<p class="mb-2">Subscribe & Stay Updated from the Doccure</p>
									<div class="subscribe-input">
										<form action="#">
											<input type="email" class="form-control" placeholder="Enter Email Address">
											<button type="submit" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center"><i class="isax isax-send-25 me-1"></i>Send</button>
										</form>
									</div>
									<div class="social-icon">
										<h6 class="mb-3">Connect With Us</h6>
										<ul>
											<li>
												<a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
											</li>
											<li>
												<a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
											</li>
											<li>
												<a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
											</li>
											<li>
												<a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
											</li>
											<li>
												<a href="javascript:void(0);"><i class="fa-brands fa-pinterest"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-bg">
						<img src="{{ asset('medicity/assets/img/bg/footer-bg-01.png') }}" alt="img" class="footer-bg-01">
						<img src="{{ asset('medicity/assets/img/bg/footer-bg-02.png') }}" alt="img" class="footer-bg-02">
						<img src="{{ asset('medicity/assets/img/bg/footer-bg-03.png') }}" alt="img" class="footer-bg-03">
						<img src="{{ asset('medicity/assets/img/bg/footer-bg-04.png') }}" alt="img" class="footer-bg-04">
						<img src="{{ asset('medicity/assets/img/bg/footer-bg-05.png') }}" alt="img" class="footer-bg-05">
					</div>
				</div>
				<div class="footer-bottom">
					<div class="container">
						<!-- Copyright -->
						<div class="copyright">
							<div class="copyright-text">
								<p class="mb-0">Copyright © 2025 Medicity. All Rights Reserved</p>
							</div>
							<!-- Copyright Menu -->
							<div class="copyright-menu">
								<ul class="policy-menu">
									<li><a href="javascript:void(0);">Legal Notice</a></li>
									<li><a href="privacy-policy.html">Privacy Policy</a></li>
									<li><a href="javascript:void(0);">Refund Policy</a></li>
								</ul>
							</div>
							<!-- /Copyright Menu -->
							<ul class="payment-method">
								<li><a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/card-01.svg') }}" alt="Img"></a></li>
								<li><a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/card-02.svg') }}" alt="Img"></a></li>
								<li><a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/card-03.svg') }}" alt="Img"></a></li>
								<li><a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/card-04.svg') }}" alt="Img"></a></li>
								<li><a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/card-05.svg') }}" alt="Img"></a></li>
								<li><a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/card-06.svg') }}" alt="Img"></a></li>
							</ul>
						</div>
						<!-- /Copyright -->
					</div>
				</div>
			</footer>
			<!-- /Footer Section -->
            @endif

			<!-- Cursor -->
			<div class="mouse-cursor cursor-outer"></div>
			<div class="mouse-cursor cursor-inner"></div>
			<!-- /Cursor -->
        </div>

        @include('layouts.app.main-scripts')
        @stack('modals')
        @livewireScripts

    </body>
</html>
