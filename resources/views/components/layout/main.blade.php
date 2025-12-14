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

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

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