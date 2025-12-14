@php
use App\Models\ServiceHour;

$currentRoute = Route::currentRouteName();

$daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
// Get service hours and sort by day of week order
$serviceHours = ServiceHour::all()->sortBy(function($hour) use ($daysOfWeek) {
    return array_search($hour->day, $daysOfWeek);
});

$serviceHourText = 'Jam Buka: Hubungi Kami';

if ($serviceHours->isNotEmpty()) {
    // Group consecutive days with same hours
    $groupedHours = [];
    $currentGroup = null;
    
    foreach ($serviceHours as $hour) {
        if ($hour->is_closed) {
            if ($currentGroup) {
                $groupedHours[] = $currentGroup;
                $currentGroup = null;
            }
            continue;
        }
        
        $timeRange = date('H.i', strtotime($hour->open_time)) . ' - ' . date('H.i', strtotime($hour->close_time));
        
        if (!$currentGroup || $currentGroup['time'] !== $timeRange) {
            if ($currentGroup) {
                $groupedHours[] = $currentGroup;
            }
            $currentGroup = [
                'start_day' => $hour->day,
                'end_day' => $hour->end_day ?: $hour->day,
                'time' => $timeRange
            ];
        } else {
            $currentGroup['end_day'] = $hour->end_day ?: $hour->day;
        }
    }
    
    if ($currentGroup) {
        $groupedHours[] = $currentGroup;
    }
    
    if (!empty($groupedHours)) {
        $firstGroup = $groupedHours[0];
        $dayRange = $firstGroup['start_day'];
        if ($firstGroup['end_day'] && $firstGroup['end_day'] !== $firstGroup['start_day']) {
            $dayRange .= ' - ' . $firstGroup['end_day'];
        }
        $serviceHourText = 'Jam Buka: ' . $dayRange . ' ' . $firstGroup['time'];
    }
}

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
                'route' => 'profile.visi-misi'
            ],
            'struktur' => [
                'label' => 'Struktur Organisasi',
                'route' => 'profile.struktur'
            ],
            'tim' => [
                'label' => 'Tim Perpustakaan',
                'route' => 'profile.tim'
            ]
        ]
    ],
    'layanan' => [
        'label' => 'Layanan dan Fasilitas',
        'route' => '#',
        'routes' => ['layanan.jam-layanan', 'layanan.jenis-layanan', 'layanan.fasilitas'],
        'children' => [
            'jam-layanan' => [
                'label' => 'Jam Layanan',
                'route' => 'layanan.jam-layanan'
            ],
            'jenis-layanan' => [
                'label' => 'Jenis Layanan',
                'route' => 'layanan.jenis-layanan'
            ],
            'fasilitas' => [
                'label' => 'Fasilitas',
                'route' => 'layanan.fasilitas'
            ]
        ]
    ],
    'galleries' => [
        'label' => 'Galeri',
        'route' => 'galleries',
        'routes' => ['galleries']
    ],
    'contact' => [
        'label' => 'Hubungi Kami',
        'route' => 'contact',
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

{{-- Css tambahan --}}
<style>
    .fixed-header .sticky-header{
        background-color: #113281 !important;
    }

    .sticky-header .main-menu .navigation > li > a{
        color: #ffffff !important;
    }

    .sticky-header .main-menu .navigation > li.current > a{
        color: var(--theme-color) !important;
    }

    .main-header .header-lower .outer-box:before {
        background: #ffffff !important;
    }

    .header-top .top-inner:before{
        background: #113281 !important;
    }
</style>

<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner">
                <p><i class="icon-1"></i>{{ $serviceHourText }}</p>
                <ul class="social-links">
                    <li><span>On Social:</span></li>
                    @if($globalProfile->social_media && count($globalProfile->social_media) > 0)
                        @foreach($globalProfile->social_media as $social)
                            <li><a href="{{ $social['url'] }}" target="_blank" title="{{ $social['name'] }}"><i class="{{ $social['icon'] }}"></i></a></li>
                        @endforeach
                    @else
                        {{-- Default social links if none configured --}}
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ route('home') }}">
                            @if($globalProfile->image)
                                <img src="{{ asset('storage/' . $globalProfile->image) }}" alt="{{ $globalProfile->title }}">
                            @else
                                <img src="/assets/images/logo.png" alt="{{ $globalProfile->title }}">
                            @endif
                        </a>
                    </figure>
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
                    {{-- <div class="search-box-outer search-toggler mr_25">
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
                    </div> --}}
                    {{-- <div class="btn-box"><a href="index.html">Account</a></div> --}}
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ route('home') }}">
                            @if($globalProfile->image)
                                <img src="{{ asset('storage/' . $globalProfile->image) }}" alt="{{ $globalProfile->title }}">
                            @else
                                <img src="/assets/images/logo.png" alt="{{ $globalProfile->title }}">
                            @endif
                        </a>
                    </figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="menu-right-content">
                    {{-- <div class="search-box-outer search-toggler mr_25">
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
                    <div class="btn-box"><a href="index.html">Account</a></div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->