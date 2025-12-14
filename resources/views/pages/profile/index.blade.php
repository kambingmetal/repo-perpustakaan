@php
    use App\Models\Team;
    $teamMembers = Team::orderBy('order', 'asc')->get();
    $banner = $settingPage->banner ?? $globalSettingPage->banner;
@endphp

<x-layout.main pageTitle="Tim">
    <section class="page-title centred">
        @if (!empty($banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Profile Kami</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Profile Kami</li>
                </ul>
            </div>
        </div>
    </section>

    <x-layout.home.profile :profile="$globalProfile" />

</x-layout.main>