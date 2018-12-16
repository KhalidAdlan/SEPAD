<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="rating" content="general">
    <meta name="robots" content="@yield('robots')">
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:type" content="website">
    <meta name="description" property="og:description" content="@yield('description')">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">
    <meta name="twitter:url" content="{{ request()->url() }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('i/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('i/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('i/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ secure_asset('i/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ secure_asset('i/icons/safari-pinned-tab.svg') }}" color="#336699">
    <link rel="shortcut icon" href="{{ secure_asset('i/icons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#336699">
    <meta name="msapplication-config" content="{{ secure_asset('i/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#336699">
    <link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ secure_asset(mix('dist/css/application.css')) }}">
      @hasSection('canonical')<link rel="canonical" href="@yield('canonical')">@endif
    <script src="{{ secure_asset(mix('dist/js/application.js')) }}"></script>
    @if (config('settings.analytics_id') !== null)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('settings.analytics_id') }}"></script>
        <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', '{{ config('settings.analytics_id') }}');</script>
    @endif
</head>
<body>
@include('partials.application.nav')
@yield('content')
@include('partials.application.footer')
@hasSection('scripts')@yield('scripts')@endif
</body>
</html>
