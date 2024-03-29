<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KVTPT2F');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name') }}"/>
    @yield('meta')
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="/favicon-128.png" sizes="128x128" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/pages/contacts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/pages/portfolio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/pages/stock.css') }}">
    @stack('styles')
</head>
<body class="d-flex flex-column">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVTPT2F" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('partials.navbar')
    <main class="flex-grow-1">
        @include('elements.alert')
        @yield('content')
    </main>
    @include('partials.footer')
    <script src="{{ asset('bundle/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
