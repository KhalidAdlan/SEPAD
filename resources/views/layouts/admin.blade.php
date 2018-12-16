<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ empty($t) ? (is_array($title = __(Route::getCurrentRoute()->getName())) ? $title['title'] : $title) : $t }} | {{ __('admin.title') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ secure_asset(mix('dist/css/admin.css')) }}">
    <link rel="shortcut icon" href="{{ secure_asset('i/icons/favicon.ico') }}">
    @stack('styles')
</head>
<body>
@if($currentUser = auth()->user())@include('partials.admin.nav')@endif
@if(session('message'))<div class="notification is-info">{{ session('message') }}</div>@endif
@yield('content')
@if($currentUser = auth()->user())@include('partials.admin.breadcrumbs')@endif
<script src="{{ secure_asset(mix('dist/js/admin.js')) }}" type="text/javascript"></script>
<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
@hasSection('scripts')@yield('scripts')@endif
</body>
</html>
