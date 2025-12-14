@php
    $banner = $settingPage->banner ?? $globalSettingPage->banner;
@endphp

<x-layout.main pageTitle="Visi & Misi">
    <section class="page-title centred">
        @if (!empty($banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Visi & Misi</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Visi & Misi</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-style-four pt_120 pb_180">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Vision Section -->
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_four">
                        <div class="content-box">
                            <div class="sec-title mb_50">
                                <h2>Visi</h2>
                            </div>
                            <div class="text-box">
                                @if($globalProfile->vision)
                                    <div class="vision-content">
                                        {!! $globalProfile->vision !!}
                                    </div>
                                @else
                                    <p>Visi belum tersedia. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Mission Section -->
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_four">
                        <div class="content-box">
                            <div class="sec-title mb_50">
                                <h2>Misi</h2>
                            </div>
                            <div class="text-box">
                                @if($globalProfile->mission)
                                    <div class="mission-content">
                                        {!! $globalProfile->mission !!}
                                    </div>
                                @else
                                    <p>Misi belum tersedia. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Additional Company Info Section -->
            @if($globalProfile->description)
            <div class="row clearfix mt_70">
                <div class="col-lg-12">
                    <div class="sec-title mb_50 centred">
                        <h2>Tentang {{ $globalProfile->title }}</h2>
                    </div>
                    <div class="text-box centred">
                        <p>{{ $globalProfile->description }}</p>
                    </div>
                </div>
            </div>
            @endif --}}
        </div>
    </section>
</x-layout.main>