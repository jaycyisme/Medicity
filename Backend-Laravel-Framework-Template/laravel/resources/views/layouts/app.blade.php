<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Trang quản lý của {{ config('app.name', 'Medicity') }}" />
        <title>{{ config('app.name', 'Medicity') }}</title>

        <link rel="icon" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/jsvectormap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" >
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" >
        <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" >
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" >
        <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" >

        <link rel="stylesheet" href="{{ asset('assets/css/rte_theme_default.css') }}" >
        <script src="{{ asset('assets/js/rte.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/all_plugins.js') }}"></script>
        {{-- Uppy Library --}}
        <link href="https://releases.transloadit.com/uppy/v4.9.0/uppy.min.css"  rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>

        @include('layouts.app.navbar')

        <div class="pc-container">
            <div class="pc-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                @include('layouts.app.breadcrumb')
                            </div>
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h2 class="mt-3">{{ $pageHeader }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{ $slot }}
                </div>
            </div>
        </div>

        {{-- <footer class="pc-footer">
            <div class="footer-wrapper container-fluid">
                <div class="row">
                    <div class="col-sm-6 my-1">
                        <p class="m-0">Thiết kế bởi <a href="https://hoanganhgaming.com/" target="_blank">Hoang Anh Gaming Software</a></p>
                    </div>
                </div>
            </div>
        </footer> --}}

        @include('layouts.app.scripts')
        @stack('modals')
        @livewireScripts
    </body>
</html>
