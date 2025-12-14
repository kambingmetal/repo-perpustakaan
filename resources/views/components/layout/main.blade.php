@props([
    'title' => $globalProfile->title ?? 'Perpustakaan',
    'pageTitle' => null,
])

<!DOCTYPE html>
<html lang="en">
<head>
   <x-layout.head />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ $pageTitle ? $pageTitle . ' - ' : '' }}{{ $title }}</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $globalSettingPage->meta_description ?? $globalSettingPage->site_description ?? 'Perpustakaan Digital Terdepan di Indonesia' }}">
    <meta name="keywords" content="{{ $globalSettingPage->meta_keyword ?? 'perpustakaan, digital, buku, koleksi, indonesia' }}">
    <meta name="author" content="{{ $globalProfile->title ?? 'Perpustakaan Digital' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $pageTitle ? $pageTitle . ' - ' : '' }}{{ $title }}">
    <meta property="og:description" content="{{ $globalSettingPage->meta_description ?? $globalSettingPage->site_description ?? 'Perpustakaan Digital Terdepan di Indonesia' }}">
    @if($globalSettingPage->og_image)
        <meta property="og:image" content="{{ Storage::url($globalSettingPage->og_image) }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif
    <meta property="og:site_name" content="{{ $globalProfile->title ?? 'Perpustakaan Digital' }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $pageTitle ? $pageTitle . ' - ' : '' }}{{ $title }}">
    <meta name="twitter:description" content="{{ $globalSettingPage->meta_description ?? $globalSettingPage->site_description ?? 'Perpustakaan Digital Terdepan di Indonesia' }}">
    @if($globalSettingPage->og_image)
        <meta name="twitter:image" content="{{ Storage::url($globalSettingPage->og_image) }}">
    @endif

    <!-- Fav Icon -->
    @if($globalSettingPage->favicon)
        <link rel="icon" href="{{ Storage::url($globalSettingPage->favicon) }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ Storage::url($globalSettingPage->favicon) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('/assets/images/favicon.png') }}" type="image/x-icon">
    @endif

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/elpath.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/odometer.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/feature.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/funfact.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/service.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/clients.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/working.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/team.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/research.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/cta.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/contact.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/page-title.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/history.css')}}" rel="stylesheet">
</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper ltr">
        {{-- <x-layout.preloader /> --}}
        <x-layout.header />
        <x-layout.mobile-menu />

        <main class="main-content alternat-2">
            {{ $slot }}
            <x-layout.home.cta />
        </main>

        <x-layout.footer />
    </div>

    <x-layout.scripts />
</body><!-- End of .page_wrapper -->
</html>