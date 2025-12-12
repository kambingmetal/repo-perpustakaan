@php
$currentRoute = Route::currentRouteName();

$navigationRoutes = [
    'home' => [
        'label' => 'Beranda',
        'route' => 'home',
        'routes' => ['home'] // routes that should make this item active
    ],
    'profile' => [
        'label' => 'Profil',
        'route' => '#',
        'routes' => ['profile.sejarah', 'profile.visi-misi', 'profile.struktur', 'profile.tim'],
        'children' => [
            'sejarah' => [
                'label' => 'Sejarah',
                'route' => 'profile.sejarah'
            ],
            'visi-misi' => [
                'label' => 'Visi dan Misi',
                'route' => '#'
            ],
            'struktur' => [
                'label' => 'Struktur Organisasi',
                'route' => '#'
            ],
            'tim' => [
                'label' => 'Tim Perpustakaan',
                'route' => '#'
            ]
        ]
    ],
    'services' => [
        'label' => 'Layanan dan Fasilitas',
        'route' => '#',
        'routes' => ['services.jam-layanan', 'services.jenis-layanan', 'services.fasilitas'],
        'children' => [
            'jam-layanan' => [
                'label' => 'Jam Layanan',
                'route' => '#'
            ],
            'jenis-layanan' => [
                'label' => 'Jenis Layanan',
                'route' => '#'
            ],
            'fasilitas' => [
                'label' => 'Fasilitas',
                'route' => '#'
            ]
        ]
    ],
    'contact' => [
        'label' => 'Hubungi Kami',
        'route' => '#',
        'routes' => ['contact']
    ]
];

// Function to check if menu item is active
function isMenuActive($item, $currentRoute) {
    if (isset($item['routes']) && in_array($currentRoute, $item['routes'])) {
        return true;
    }
    if (isset($item['route']) && $item['route'] === $currentRoute) {
        return true;
    }
    if (isset($item['children'])) {
        foreach ($item['children'] as $child) {
            if (isset($child['route']) && $child['route'] === $currentRoute) {
                return true;
            }
        }
    }
    return false;
}
@endphp

<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner">
                <p><i class="icon-1"></i>Open Hours: Mon - Fri 8.00 am - 6.00 pm</p>
                <ul class="social-links">
                    <li><span>On Social:</span></li>
                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('home') }}"><img src="/assets/images/logo.png" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light clearfix">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                @foreach($navigationRoutes as $key => $item)
                                    @php $isActive = isMenuActive($item, $currentRoute); @endphp
                                    <li class="{{ $isActive ? 'current' : '' }} {{ isset($item['children']) ? 'dropdown' : '' }}">
                                        <a href="{{ $item['route'] !== '#' ? route($item['route']) : '#' }}">{{ $item['label'] }}</a>
                                        @if(isset($item['children']))
                                            <ul>
                                                @foreach($item['children'] as $childKey => $child)
                                                    <li><a href="{{ $child['route'] !== '#' ? route($child['route']) : '#' }}">{{ $child['label'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="menu-right-content">
                    <div class="search-box-outer search-toggler mr_25">
                        <i class="icon-2"></i>
                    </div>
                    <div class="language-picker js-language-picker mr_25" data-trigger-class="btn btn--subtle">
                        <form action="index-2.html" class="language-picker__form">
                            <label for="language-picker-select">Select your language</label>
                            <select name="language-picker-select" id="language-picker-select">
                                <option lang="de" value="deutsch"></option>
                                <option lang="en" value="english" selected></option>
                                <option lang="fr" value="francais"></option>
                                <option lang="it" value="italiano"></option>
                            </select>
                        </form>
                    </div>
                    <div class="btn-box"><a href="index.html">Account</a></div>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="index.html"><img src="/assets/images/logo.png" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="menu-right-content">
                    <div class="search-box-outer search-toggler mr_25">
                        <i class="icon-2"></i>
                    </div>
                    <div class="language-picker js-language-picker mr_25" data-trigger-class="btn btn--subtle">
                        <form action="index-2.html" class="language-picker__form">
                            <label for="language-picker-select">Select your language</label>
                            <select name="language-picker-select" id="language-picker-select">
                                <option lang="de" value="deutsch"></option>
                                <option lang="en" value="english" selected></option>
                                <option lang="fr" value="francais"></option>
                                <option lang="it" value="italiano"></option>
                            </select>
                        </form>
                    </div>
                    <div class="btn-box"><a href="index.html">Account</a></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->